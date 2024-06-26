<?php

use App\Http\Controllers\API\CharacterController;
use App\Http\Controllers\API\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::controller(RegisterController::class)->group(function() {
    Route::post('register', 'register'); // So this is basically just setting up the route that will match requests
    Route::post('login', 'login');
    Route::post('logout', 'logout');
    Route::middleware('auth:sanctum')->group( function () {
        Route::controller(UserController::class)->group(function(){
        Route::get('user', 'getUser');
        Route::post('user/upload_avatar', 'uploadAvatar');
        Route::delete('user/remove_avatar','removeAvatar');
        Route::post('user/send_verification_email','sendVerificationEmail');
        Route::post('user/change_email', 'changeEmail');
        });
        });
});

Route::controller(CharacterController::class)->group(function() {
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('characters', 'index');
        Route::get('charactersforuser', 'myCharacters');
        Route::post('checkout', 'checkoutCharacter');
        Route::post('checkin', 'checkinCharacter');
        Route::post('create', 'createCharacter');
        Route::delete('delete', 'deleteCharacter');
        Route::put('update', 'updateCharacter');
    });
});
