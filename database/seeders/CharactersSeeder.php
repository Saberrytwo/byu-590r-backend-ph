<?php

namespace Database\Seeders;

use App\Models\Character;
use App\Models\Move;
use App\Models\Theme;
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
                'user_id' => null,
            ],
            [
                'name' => 'R.O.B.',
                'imageURL' => 'images/characters/rob_no_bg.jpeg',
                'weightClass' => 'Medium-Heavy',
                'originGame' => 'Gyromite',
                'releasePack' => 'Base Game',
                'playstyleDescription' => 'Utilizes gyros and beams for ranged attacks.',
                'user_id' => null,
            ],
            [
                'name' => 'Pikachu',
                'imageURL' => 'images/characters/pikachu_no_bg.jpeg',
                'weightClass' => 'Light',
                'originGame' => 'Pokémon',
                'releasePack' => 'Base Game',
                'playstyleDescription' => 'Fast and agile fighter with electric attacks.',
                'user_id' => null,
            ],
            [
                'name' => 'Samus',
                'imageURL' => 'images/characters/samus_no_bg.jpeg',
                'weightClass' => 'Heavy',
                'originGame' => 'Metroid',
                'releasePack' => 'Base Game',
                'playstyleDescription' => 'Uses a variety of long-range projectile attacks.',
                'user_id' => null,
            ],
            [
                'name' => 'Donkey Kong',
                'imageURL' => 'images/characters/dk_no_bg.jpeg',
                'weightClass' => 'Heavy',
                'originGame' => 'Donkey Kong',
                'releasePack' => 'Base Game',
                'playstyleDescription' => 'Powerful close-range attacks and throws.',
                'user_id' => null,
            ],
        ];

        $moves = [
            ['character_id' => 1, 'name' => 'Middle Kick', 'buttons' => 'Left/Right A'],
            ['character_id' => 1, 'name' => 'Uppercut', 'buttons' => 'Up A'],
            ['character_id' => 1, 'name' => 'Spinning Low Kick', 'buttons' => 'Down A'],
            ['character_id' => 1, 'name' => 'Sliding', 'buttons' => 'Double Left/Right A'],
            ['character_id' => 1, 'name' => 'Fire Palm Heel', 'buttons' => 'Strong Left/Right A'],
            ['character_id' => 1, 'name' => 'Lead Headbutt', 'buttons' => 'Strong Up A'],
            ['character_id' => 1, 'name' => 'Break Spin', 'buttons' => 'Strong Down A'],
            ['character_id' => 1, 'name' => 'Mario Kick', 'buttons' => 'Air A'],
            ['character_id' => 1, 'name' => 'Meteor Knuckle', 'buttons' => 'Air Right A'],
            ['character_id' => 1, 'name' => 'Drop Knuckle', 'buttons' => 'Air Left A'],
            ['character_id' => 1, 'name' => 'Air Slash', 'buttons' => 'Air Up A'],
            ['character_id' => 2, 'name' => 'Gyro Spin', 'buttons' => 'Left/Right A'],
            ['character_id' => 2, 'name' => 'Gyro Blast', 'buttons' => 'Up A'],
            ['character_id' => 2, 'name' => 'Beam Shot', 'buttons' => 'Down A'],
            ['character_id' => 2, 'name' => 'Beam Whip', 'buttons' => 'Double Left/Right A'],
            ['character_id' => 2, 'name' => 'Robo Tackle', 'buttons' => 'Strong Left/Right A'],
            ['character_id' => 2, 'name' => 'Laser Beam', 'buttons' => 'Strong Up A'],
            ['character_id' => 2, 'name' => 'Rocket Fist', 'buttons' => 'Strong Down A'],
            ['character_id' => 2, 'name' => 'Gyro Charge', 'buttons' => 'Air A'],
            ['character_id' => 2, 'name' => 'Aerial Gyro', 'buttons' => 'Air Right A'],
            ['character_id' => 2, 'name' => 'Air Blast', 'buttons' => 'Air Left A'],
            ['character_id' => 2, 'name' => 'Rocket Jump', 'buttons' => 'Air Up A'],
            ['character_id' => 3, 'name' => 'Thunder Jolt', 'buttons' => 'Left/Right A'],
            ['character_id' => 3, 'name' => 'Quick Attack', 'buttons' => 'Up A'],
            ['character_id' => 3, 'name' => 'Skull Bash', 'buttons' => 'Down A'],
            ['character_id' => 3, 'name' => 'Thunder', 'buttons' => 'Double Left/Right A'],
            ['character_id' => 3, 'name' => 'Electro Ball', 'buttons' => 'Strong Left/Right A'],
            ['character_id' => 3, 'name' => 'Iron Tail', 'buttons' => 'Strong Up A'],
            ['character_id' => 3, 'name' => 'Volt Tackle', 'buttons' => 'Strong Down A'],
            ['character_id' => 3, 'name' => 'Thunderbolt', 'buttons' => 'Air A'],
            ['character_id' => 3, 'name' => 'Electroweb', 'buttons' => 'Air Right A'],
            ['character_id' => 3, 'name' => 'Quick Attack', 'buttons' => 'Air Left A'],
            ['character_id' => 3, 'name' => 'Thunder', 'buttons' => 'Air Up A'],
            ['character_id' => 4, 'name' => 'Charge Shot', 'buttons' => 'Left/Right A'],
            ['character_id' => 4, 'name' => 'Screw Attack', 'buttons' => 'Up A'],
            ['character_id' => 4, 'name' => 'Bomb', 'buttons' => 'Down A'],
            ['character_id' => 4, 'name' => 'Missile', 'buttons' => 'Double Left/Right A'],
            ['character_id' => 4, 'name' => 'Plasma Whip', 'buttons' => 'Strong Left/Right A'],
            ['character_id' => 4, 'name' => 'Boost Ball', 'buttons' => 'Strong Up A'],
            ['character_id' => 4, 'name' => 'Morph Ball Bomb', 'buttons' => 'Strong Down A'],
            ['character_id' => 4, 'name' => 'Grapple Beam', 'buttons' => 'Air A'],
            ['character_id' => 4, 'name' => 'Plasma Blast', 'buttons' => 'Air Right A'],
            ['character_id' => 4, 'name' => 'Screw Attack', 'buttons' => 'Air Left A'],
            ['character_id' => 4, 'name' => 'Space Jump', 'buttons' => 'Air Up A'],
            ['character_id' => 5, 'name' => 'Giant Punch', 'buttons' => 'Left/Right A'],
            ['character_id' => 5, 'name' => 'Headbutt', 'buttons' => 'Up A'],
            ['character_id' => 5, 'name' => 'Spinning Kong', 'buttons' => 'Down A'],
            ['character_id' => 5, 'name' => 'Hand Slap', 'buttons' => 'Double Left/Right A'],
            ['character_id' => 5, 'name' => 'Backward Kick', 'buttons' => 'Strong Left/Right A'],
            ['character_id' => 5, 'name' => 'Headbutt', 'buttons' => 'Strong Up A'],
            ['character_id' => 5, 'name' => 'Bouncing Kong', 'buttons' => 'Strong Down A'],
            ['character_id' => 5, 'name' => 'Giant Punch', 'buttons' => 'Air A'],
            ['character_id' => 5, 'name' => 'Flying Slam', 'buttons' => 'Air Right A'],
            ['character_id' => 5, 'name' => 'Spinning Kong', 'buttons' => 'Air Left A'],
            ['character_id' => 5, 'name' => 'Ground Pound', 'buttons' => 'Air Up A'],
        ];

        $themes = [
            [
                'character_id' => 1,
                'title' => 'Mario\'s Victory',
                'duration' => '3:45',
                'imageURL' => 'images/themes/mario_victory.jpeg',
            ],
            [
                'character_id' => 2,
                'title' => 'R.O.B. Rave',
                'duration' => '2:58',
                'imageURL' => 'images/themes/rob_theme.jpeg',
            ],
            [
                'character_id' => 3,
                'title' => 'Pikachu\'s Jukebox',
                'duration' => '3:10',
                'imageURL' => 'images/themes/pikachu_theme.jpeg',
            ],
            [
                'character_id' => 4,
                'title' => 'Samus\'s Symphony',
                'duration' => '4:02',
                'imageURL' => 'images/themes/samus_theme.jpeg',
            ],
            [
                'character_id' => 5,
                'title' => 'DK Island Swing',
                'duration' => '3:24',
                'imageURL' => 'images/themes/dk_theme.jpeg',
            ]
        ];

        Character::insert($characters);
        Move::insert($moves);
        Theme::insert($themes);
    }
} 