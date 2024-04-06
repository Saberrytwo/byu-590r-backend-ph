<?php

namespace App\Console\Commands;

use App\Mail\CharactersPlayedList;
use App\Models\Character;
use App\Models\Checkout;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class AutoCharactersPlayed extends Command
{
/**
* The name and signature of the console command.
*
* @var string
*/
protected $signature = 'auto:characters-played {--email=}';

/**
* The console command description.
*
* @var string
*/
protected $description = 'Returns a list of all character-user relationships, and the games played/won with that character';

/**
* Execute the console command.
*
* @return int
*/
public function handle()
{
    $sendToEmail = $this->option('email');
    
    if (!$sendToEmail) {
        return Command::FAILURE;
    }
    
    // Retrieve all characters with users and their respective relationships
    $characterUserRelationships = Character::whereHas('users', function ($query) {
        $query->where('games_played', '>', 0);
    })->with('users')->get();
    error_log($characterUserRelationships);

    if ($characterUserRelationships->count() > 0) {
        // Send the list of characters with users who have played games to the specified email
        Mail::to($sendToEmail)->send(new CharactersPlayedList($characterUserRelationships));
    }

    return Command::SUCCESS;
}
 
}