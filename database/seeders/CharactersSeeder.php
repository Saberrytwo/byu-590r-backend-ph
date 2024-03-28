<?php

namespace Database\Seeders;

use App\Models\Character;
use Illuminate\Database\Seeder;

class CharactersSeeder extends Seeder{
    public function run(){
        $characters = [
            [
                'name' => 'Mario',
                'imageURL' => 'images/characters/mario_no_bg.jpeg',
                'weightClass' => 'Medium',
                'originGame' => 'Super Mario Bros',
                'releasePack' => 'Base Game',
                'playstyleDescription' => 'All-around fighter with versatile moves.',
                'user_id' => null
            ],
            [
                'name' => 'R.O.B.',
                'imageURL' => 'images/characters/rob_no_bg.jpeg',
                'weightClass' => 'Medium-Heavy',
                'originGame' => 'Gyromite',
                'releasePack' => 'Base Game',
                'playstyleDescription' => 'Utilizes gyros and beams for ranged attacks.',
                'user_id' => null
            ],
            [
                'name' => 'Pikachu',
                'imageURL' => 'images/characters/pikachu_no_bg.jpeg',
                'weightClass' => 'Light',
                'originGame' => 'Pokémon',
                'releasePack' => 'Base Game',
                'playstyleDescription' => 'Fast and agile fighter with electric attacks.',
                'user_id' => null
            ],
            [
                'name' => 'Samus',
                'imageURL' => 'images/characters/samus_no_bg.jpeg',
                'weightClass' => 'Heavy',
                'originGame' => 'Metroid',
                'releasePack' => 'Base Game',
                'playstyleDescription' => 'Uses a variety of long-range projectile attacks.',
                'user_id' => null
            ],
            [
                'name' => 'Donkey Kong',
                'imageURL' => 'images/characters/dk_no_bg.jpeg',
                'weightClass' => 'Heavy',
                'originGame' => 'Donkey Kong',
                'releasePack' => 'Base Game',
                'playstyleDescription' => 'Powerful close-range attacks and throws.',
                'user_id' => null
            ],
        ];

        Character::insert($characters);
    }
} 