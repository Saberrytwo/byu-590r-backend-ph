<?php

namespace App\Http\Controllers\API;

use App\Models\Character;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpKernel\Attribute\WithHttpStatus;

class CharacterController extends BaseController
{
    
    public function index() {
        $characters = Character::with(['moves', 'theme'])->get();
        foreach($characters as $character){
            $character->imageURL = $this->getS3Url($character->imageURL);

            if($character->theme && $character->theme->imageURL && $character->theme->imageURL !== null){
                $character->theme->imageURL = $this->getS3Url($character->theme->imageURL);
            }
            
        }
        Log::info($characters);
        return $this->sendResponse($characters, 'Characters');
    }       

    public function createCharacter(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'weightClass' => 'string',
            'originGame' => 'string',
            'releasePack' => 'string',
            'playstyleDescription' => 'string',
        ]);
    
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
            'weightClass' => $validatedData['weightClass'],
            'originGame' => $validatedData['originGame'],
            'releasePack' => $validatedData['releasePack'],
            'playstyleDescription' => $validatedData['playstyleDescription'],
        ]);
        $character->save();
        $character->imageURL = $this->getS3URL($character->imageURL);
    
        // Return success response
        return $this->sendResponse($character, 'character');
    }
    

    public function deleteCharacter(Request $request){
        Log::info($request);
        $character = Character::find($request->characterId);
        $response = Storage::disk('s3')->delete($character->imageURL);
    
        if ($character) {
            $character->delete();
            return $this->sendResponse($request->characterId, 'characterId');
        }
    
        return response()->json(['message' => 'Character not found'], 404);
    }
    
    public function updateCharacter(Request $request) {
        $validatedData = $request->validate([
            'id' => 'required|numeric',
            'name' => 'string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'weightClass' => 'string',
            'originGame' => 'string',
            'releasePack' => 'string',
            'playstyleDescription' => 'string',
        ]);
        $data = $request->all();
        $characterId = $data['id'];
        $character = Character::find($characterId);
    

        if ($character) {
            if ($request->hasFile('image')) {
                Storage::disk('s3')->delete($character->imageURL);

                $extension = $request->file('image')->getClientOriginalExtension();
        
                $image_name = $data['name'] . '_profile' . '.' . $extension;
        
                $path = $request->file('image')->storeAs(
                    'images',
                    $image_name,
                    's3'
                );
        
                Storage::disk('s3')->setVisibility($path, "public");
                $character->imageURL = $path;
            }

            $character->name = $data['name'] ?? $character->name;
            $character->weightClass = $data['weightClass'] ?? $character->weightClass;
            $character->originGame = $data['originGame'] ?? $character->originGame;
            $character->releasePack = $data['releasePack'] ?? $character->releasePack;
            $character->playstyleDescription = $data['playstyleDescription'] ?? $character->playstyleDescription;
    
            $character->save();
            $character->imageURL = $this->getS3URL($character->imageURL);
            Log::info($character);
            return $this->sendResponse($character, 'Characters');
        }
    
        return response()->json(['message' => 'Character not found'], 404);
    }
    
}