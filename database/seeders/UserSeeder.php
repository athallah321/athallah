<?php

namespace Database\Seeders;

use Illuminate\Support\Str; // Import Str Helper
use App\Models\User; // Import Model User
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();
        User::create([
            'name' => 'Adit',
            'level' => 'admin',
            'username' => 'admin',
            'password' => bcrypt('123456'),
            'remember_token' =>Str::random(60),
        ]);
    }
}


