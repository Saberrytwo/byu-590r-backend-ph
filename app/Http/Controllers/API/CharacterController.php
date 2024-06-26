<?php

namespace App\Http\Controllers\API;

use App\Models\Character;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Theme;
use App\Http\Controllers\API\UserController;
use App\Models\Move;
use Symfony\Component\HttpKernel\Attribute\WithHttpStatus;

class CharacterController extends BaseController
{
    
    public function index() {
        $characters = Character::with(['moves', 'theme'])->get();
        $moves = Move::all();
        $themes = Theme::all();
        foreach($characters as $character){
            $character->imageURL = $this->getS3Url($character->imageURL);

            if($character->theme && $character->theme->imageURL){
                $character->theme->imageURL = $this->getS3Url($character->theme->imageURL);
            }
        }
        $response = [
            'characters' => $characters,
            'moves' => $moves,
            'themes' => $themes,
        ];
        
        return $this->sendResponse($response, 'Characters and Moves');
    }

    public function checkoutCharacter(Request $request){
        $validatedData = $request->validate([
            'userId' => 'required|int',
            'characterId' => 'required|int'
        ]);
    
        // Find the user and character
        $user = User::findOrFail($validatedData['userId']);
        $character = Character::findOrFail($validatedData['characterId']);
    
        if (!$user->characters()->where('characters.id', $character->id)->exists()) {
            // If not, attach the character to the user
            $user->characters()->syncWithoutDetaching($character->id);
        } else {
            $pivot = $user->characters()->where('characters.id', $character->id)->first()->pivot;
            $pivot->increment('games_played');
            $pivot->save();
        }
        
    
        return response()->json(['message' => 'Character associated with user successfully'], 200);
    }

    public function checkinCharacter(Request $request){
        $validatedData = $request->validate([
            'userId' => 'required|int',
            'characterId' => 'required|int'
        ]);
    
        // Find the user and character
        $user = User::findOrFail($validatedData['userId']);
        $character = Character::findOrFail($validatedData['characterId']);
    
        $pivot = $user->characters()->where('characters.id', $character->id)->first()->pivot;

        if ($pivot['games_played'] > 0) {
            // Decrement games_played
            $pivot->decrement('games_played');
        } else {
            $user->characters()->detach($character->id);
        }
        
        return response()->json(['message' => 'Character detached from user successfully'], 200);
    }
    

    public function myCharacters(Request $request){

        $validatedData = $request->validate([
            'userId' => 'required|int'
        ]);

        $users_with_characters = User::with(['characters' => function ($query) {
            $query->with('moves', 'theme')->withPivot('games_played', 'wins');
        }])->findOrFail($validatedData['userId']);

        foreach($users_with_characters->characters as $character){
            $character->imageURL = $this->getS3Url($character->imageURL);

            if($character->theme && $character->theme->imageURL){
                $character->theme->imageURL = $this->getS3Url($character->theme->imageURL);
            }
        }

        return $this->sendResponse($users_with_characters, 'UserswithCharacters');
    }

    public function createCharacter(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'weightClass' => 'string',
            'originGame' => 'string',
            'releasePack' => 'string',
            'playstyleDescription' => 'string',
            'moves' => 'string',
            'theme' => 'integer'
        ]);
        $validatedData['moves'] = explode(",", $validatedData['moves']);
        // Log::alert($validatedData);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $validatedData['name'].'.'.$image->extension();
            $path = $request->file('image')->storeAs(
                'images/characters',
                $imageName,
                's3'
            );
        } else {
            $path = null; // If no image uploaded
        }
    
        // Create new character
        $character = Character::create([
            'name' => $validatedData['name'],
            'imageURL' => $path,
            'weightClass' => $validatedData['weightClass'] ?? "",
            'originGame' => $validatedData['originGame'] ?? "",
            'releasePack' => $validatedData['releasePack'] ?? "",
            'playstyleDescription' => $validatedData['playstyleDescription'] ?? "",
        ]);
        foreach ($validatedData['moves'] as $moveId) {
            $move = Move::findOrFail($moveId); // Assuming Move is your Move model
            $character->moves()->save($move);
        }
    
        // Attach theme to the character
        $theme = Theme::findOrFail($validatedData['theme'] ?? "");
        $character->theme()->save($theme);
        $character->save();
        $character->imageURL = $this->getS3URL($character->imageURL);
        $character->theme->imageURL = $this->getS3URL($character->theme->imageURL);
    
        Log::alert($character->moves);
        // Return success response
        return $this->sendResponse($character, 'character');
    }
    

    public function deleteCharacter(Request $request){
        $character = Character::find($request->characterId);
        $response = Storage::disk('s3')->delete($character->imageURL);
    
        if ($character) {
            $character->delete();
            return $this->sendResponse($request->characterId, 'characterId');
        }
    
        return response()->json(['message' => 'Character not found'], 404);
    }
    public function updateCharacter(Request $request) {
        Log::alert($request);
        $validatedData = $request->validate([
            'id' => 'required|numeric',
            'name' => 'string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'weightClass' => 'string',
            'originGame' => 'string',
            'releasePack' => 'string',
            'playstyleDescription' => 'string',
            'moves' => 'nullable|string',
            'theme' => 'integer'
        ]);

        $characterId = $validatedData['id'];
        $character = Character::find($characterId);
    
        if ($character) {
            $character->fill([
                'name' => $validatedData['name'] ?? $character->name,
                'weightClass' => $validatedData['weightClass'] ?? $character->weightClass,
                'originGame' => $validatedData['originGame'] ?? $character->originGame,
                'releasePack' => $validatedData['releasePack'] ?? $character->releasePack,
                'playstyleDescription' => $validatedData['playstyleDescription'] ?? $character->playstyleDescription,
            ]);

            if ($request->hasFile('image')) {
                Storage::disk('s3')->delete($character->imageURL);
    
                $extension = $request->file('image')->getClientOriginalExtension();
                $image_name = $validatedData['name'] . '_profile' . '.' . $extension;
                $path = $request->file('image')->storeAs('images', $image_name, 's3');
                Storage::disk('s3')->setVisibility($path, "public");
                $character->imageURL = $path;
            }

            $character->moves()->update(['character_id' => null]);
            foreach (explode(",", $validatedData['moves']) as $moveId) {
                $move = Move::find($moveId);
                if ($move) {
                    $character->moves()->save($move);
                }
            }

            $character->theme()->update(['character_id' => null]);

            $theme = Theme::findOrFail($validatedData['theme']);
            Log::alert($theme);
            if($theme){
                $character->theme()->save($theme);
            }


            $character->save();

            $character = Character::with('moves', 'theme')->find($character->id);
            $character->imageURL = $this->getS3URL($character->imageURL);
            $character->theme->imageURL = $this->getS3URL($character->theme->imageURL);

            return $this->sendResponse($character, 'Characters');
        }
    }
}