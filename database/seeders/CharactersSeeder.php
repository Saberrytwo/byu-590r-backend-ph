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
                'user_id' => null,
                'moves' => [
                    ['name' => 'Middle Kick', 'buttons' => 'Left/Right A'],
                    ['name' => 'Uppercut', 'buttons' => 'Up A'],
                    ['name' => 'Spinning Low Kick', 'buttons' => 'Down A'],
                    ['name' => 'Sliding', 'buttons' => 'Double Left/Right A'],
                    ['name' => 'Fire Palm Heel', 'buttons' => 'Strong Left/Right A'],
                    ['name' => 'Lead Headbutt', 'buttons' => 'Strong Up A'],
                    ['name' => 'Break Spin', 'buttons' => 'Strong Down A'],
                    ['name' => 'Mario Kick', 'buttons' => 'Air A'],
                    ['name' => 'Meteor Knuckle', 'buttons' => 'Air Right A'],
                    ['name' => 'Drop Knuckle', 'buttons' => 'Air Left A'],
                    ['name' => 'Air Slash', 'buttons' => 'Air Up A'],
                ],
                'theme' => [
                    'title' => 'Mario\'s Victory',
                    'duration' => '3:45',
                    'imageURL' => 'images/themes/mario_victory.jpeg',
                ]
            ],
            [
                'name' => 'R.O.B.',
                'imageURL' => 'images/characters/rob_no_bg.jpeg',
                'weightClass' => 'Medium-Heavy',
                'originGame' => 'Gyromite',
                'releasePack' => 'Base Game',
                'playstyleDescription' => 'Utilizes gyros and beams for ranged attacks.',
                'user_id' => null,
                'moves' => [
                    ['name' => 'Gyro Spin', 'buttons' => 'Left/Right A'],
                    ['name' => 'Gyro Blast', 'buttons' => 'Up A'],
                    ['name' => 'Beam Shot', 'buttons' => 'Down A'],
                    ['name' => 'Beam Whip', 'buttons' => 'Double Left/Right A'],
                    ['name' => 'Robo Tackle', 'buttons' => 'Strong Left/Right A'],
                    ['name' => 'Laser Beam', 'buttons' => 'Strong Up A'],
                    ['name' => 'Rocket Fist', 'buttons' => 'Strong Down A'],
                    ['name' => 'Gyro Charge', 'buttons' => 'Air A'],
                    ['name' => 'Aerial Gyro', 'buttons' => 'Air Right A'],
                    ['name' => 'Air Blast', 'buttons' => 'Air Left A'],
                    ['name' => 'Rocket Jump', 'buttons' => 'Air Up A'],
                ],
                'theme' => [
                    'title' => 'R.O.B. Rave',
                    'duration' => '2:58',
                    'imageURL' => 'images/themes/rob_theme.jpeg',
                ]
            ],
            [
                'name' => 'Pikachu',
                'imageURL' => 'images/characters/pikachu_no_bg.jpeg',
                'weightClass' => 'Light',
                'originGame' => 'Pokémon',
                'releasePack' => 'Base Game',
                'playstyleDescription' => 'Fast and agile fighter with electric attacks.',
                'user_id' => null,
                'moves' => [
                    ['name' => 'Thunder Jolt', 'buttons' => 'Left/Right A'],
                    ['name' => 'Quick Attack', 'buttons' => 'Up A'],
                    ['name' => 'Skull Bash', 'buttons' => 'Down A'],
                    ['name' => 'Thunder', 'buttons' => 'Double Left/Right A'],
                    ['name' => 'Electro Ball', 'buttons' => 'Strong Left/Right A'],
                    ['name' => 'Iron Tail', 'buttons' => 'Strong Up A'],
                    ['name' => 'Volt Tackle', 'buttons' => 'Strong Down A'],
                    ['name' => 'Thunderbolt', 'buttons' => 'Air A'],
                    ['name' => 'Electroweb', 'buttons' => 'Air Right A'],
                    ['name' => 'Quick Attack', 'buttons' => 'Air Left A'],
                    ['name' => 'Thunder', 'buttons' => 'Air Up A'],
                ],
                'theme' => [
                    'title' => 'Pikachu\'s Jukebox',
                    'duration' => '3:10',
                    'imageURL' => 'images/themes/pikachu_theme.jpeg',
                ]
            ],
            [
                'name' => 'Samus',
                'imageURL' => 'images/characters/samus_no_bg.jpeg',
                'weightClass' => 'Heavy',
                'originGame' => 'Metroid',
                'releasePack' => 'Base Game',
                'playstyleDescription' => 'Uses a variety of long-range projectile attacks.',
                'user_id' => null,
                'moves' => [
                    ['name' => 'Charge Shot', 'buttons' => 'Left/Right A'],
                    ['name' => 'Screw Attack', 'buttons' => 'Up A'],
                    ['name' => 'Bomb', 'buttons' => 'Down A'],
                    ['name' => 'Missile', 'buttons' => 'Double Left/Right A'],
                    ['name' => 'Plasma Whip', 'buttons' => 'Strong Left/Right A'],
                    ['name' => 'Boost Ball', 'buttons' => 'Strong Up A'],
                    ['name' => 'Morph Ball Bomb', 'buttons' => 'Strong Down A'],
                    ['name' => 'Grapple Beam', 'buttons' => 'Air A'],
                    ['name' => 'Plasma Blast', 'buttons' => 'Air Right A'],
                    ['name' => 'Screw Attack', 'buttons' => 'Air Left A'],
                    ['name' => 'Space Jump', 'buttons' => 'Air Up A'],
                ],
                'theme' => [
                    'title' => 'Samus\'s Symphony',
                    'duration' => '4:02',
                    'imageURL' => 'images/themes/samus_theme.jpeg',
                ]
            ],
            [
                'name' => 'Donkey Kong',
                'imageURL' => 'images/characters/dk_no_bg.jpeg',
                'weightClass' => 'Heavy',
                'originGame' => 'Donkey Kong',
                'releasePack' => 'Base Game',
                'playstyleDescription' => 'Powerful close-range attacks and throws.',
                'user_id' => null,
                'moves' => [
                    ['name' => 'Giant Punch', 'buttons' => 'Left/Right A'],
                    ['name' => 'Headbutt', 'buttons' => 'Up A'],
                    ['name' => 'Spinning Kong', 'buttons' => 'Down A'],
                    ['name' => 'Hand Slap', 'buttons' => 'Double Left/Right A'],
                    ['name' => 'Backward Kick', 'buttons' => 'Strong Left/Right A'],
                    ['name' => 'Headbutt', 'buttons' => 'Strong Up A'],
                    ['name' => 'Bouncing Kong', 'buttons' => 'Strong Down A'],
                    ['name' => 'Giant Punch', 'buttons' => 'Air A'],
                    ['name' => 'Flying Slam', 'buttons' => 'Air Right A'],
                    ['name' => 'Spinning Kong', 'buttons' => 'Air Left A'],
                    ['name' => 'Ground Pound', 'buttons' => 'Air Up A'],
                ],
                'theme' => [
                    'title' => 'DK Island Swing',
                    'duration' => '3:24',
                    'imageURL' => 'images/themes/dk_theme.jpeg',
                ]
            ],
        ];

        Character::insert($characters);
    }
} 