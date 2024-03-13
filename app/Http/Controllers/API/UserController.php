<?php

namespace App\Http\Controllers\API;

use App\Mail\VerifyEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class UserController extends BaseController
{
    
    public function getUser() {
        $authUser = Auth::user();
        $user = User::findOrFail($authUser->id);
        $user->avatar = $this->getS3Url($user->avatar);
        return $this->sendResponse($user, 'User');
        }

    public function uploadAvatar(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        if ($request->hasFile('image')) { 
            $authUser  = Auth::user();
            $user = User::findOrFail($authUser->id);
            if($user->avatar){
                $this->removeAvatar();
            }

            $extension = $request->file('image')->getClientOriginalExtension();
    
            $image_name = 'avatar_' . auth()->id() . '_' . time() . '.' . $extension;
    
            $path = $request->file('image')->storeAs(
                'images',
                $image_name,
                's3'
            );
    
            Storage::disk('s3')->setVisibility($path, "public");

            if(!$path){
                return $this->sendError($path, 'User profile avatar failed to upload!');
            }
    
            $user->avatar = $path;
            $user->save();
            $success['avatar'] = null;
            if(isset($user->avatar)){
                $success['avatar'] = $this->getS3Url($path);
            }
    
            // Get the full S3 URL for the uploaded avatar
            $avatarUrl = $this->getS3Url($path);
    
            // Return the response with the avatar URL
            $response = [
                'avatar' => $avatarUrl,
            ];
    
        return $this->sendResponse($response, 'User profile avatar uploaded successfully!');
        }
    
        // Handle the case when there is no 'image' file in the request
        return $this->sendError('No image file found in the request.');
    }
    public function removeAvatar(){
        $authUser = Auth::user();
        $user = User::findOrFail($authUser->id);
        $img_path = $user->avatar;
        $user->avatar = null;
        $user->save();

        $response = Storage::disk('s3')->delete($img_path);

        $response = [
            'avatar' => null,
        ]; 

        return $this->sendResponse($response,'User profile avatar successfully deleted!');
    }
        
}