<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role' => '1',
            'name' => 'Supervisor',
            'email' => 'sup@mailcom',
            'password' => Hash::make('123456789'),
        ]);

        DB::table('users')->insert([
            'role' => '1',
            'name' => 'User',
            'email' => 'user@mailcom',
            'password' => Hash::make('123456789'),
        ]);
    }
}
