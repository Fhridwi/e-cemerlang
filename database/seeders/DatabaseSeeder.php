<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'Bendahara',
            'email' => 'bendahara@example.com',
            'password' => Hash::make('password'),
            'role' => 'bendahara'
        ]);

        User::create([
            'name' => 'Pengasuh',
            'email' => 'pengasuh@example.com',
            'password' => Hash::make('password'),
            'role' => 'pengasuh'
        ]);

        User::create([
            'name' => 'Wali Santri',
            'email' => 'wali@example.com',
            'password' => Hash::make('password'),
            'role' => 'walisantri'
        ]);
    }
}
