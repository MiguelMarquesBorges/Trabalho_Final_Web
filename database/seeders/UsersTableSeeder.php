<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'username'  =>  'user1@email.com',
                'password'  =>  Hash::make('abc123456'),
                'created_at'    => now(),
            ],
            [
                'username'  =>  'user2@email.com',
                'password'  =>  Hash::make('abc123456'),
                'created_at'    => now(), 
            ],
            [
                'username'  =>  'user3@email.com',
                'password'  =>  Hash::make('abc123456'),
                'created_at'    => now(),
            ]
        ]);
    }
}
