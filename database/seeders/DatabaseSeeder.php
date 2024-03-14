<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(5)->create();

        User::create([
            'name' => 'Admin',
            'username' => 'admin@admin',
            'password' => Hash::make('password'),
            'role' => 'administrator',
        ]);

        User::create([
            'name' => 'receptionist',
            'username' => 'saskia@receptionist',
            'password' => Hash::make('password'),
            'role' => 'receptionist',
        ]);

        User::create([
            'name' => 'saskia',
            'username' => 'saskia@kia',
            'password' => Hash::make('password'),
            'role' => 'hotel_guest',
        ]);

    }
}
