<?php

namespace Database\Seeders;


use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder{
    public function run(){
        User::truncate();
        $users = [
            [
                'name' => 'Solomon Berry',
                'email' => 'saberrytwo@gmail.com',
                'email_verified_at' => null,
                'password' => bcrypt('Password!234'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
            ];
        User::insert($users);
    }
}