<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Hapus data lama jika ada, untuk menghindari duplikat email
        User::truncate();

        // --- Akun dengan Peran Spesifik ---
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@papilaya.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'is_active' => true,
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Finance User',
            'email' => 'finance@papilaya.com',
            'password' => Hash::make('password'),
            'role' => 'finance',
            'is_active' => true,
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Committee User',
            'email' => 'committee@papilaya.com',
            'password' => Hash::make('password'),
            'role' => 'committee',
            'is_active' => true,
            'email_verified_at' => now(),
        ]);

        // --- Akun Member ---
        User::create([
            'name' => 'Budi Member',
            'email' => 'budi@papilaya.com',
            'password' => Hash::make('password'),
            'role' => 'member',
            'is_active' => true,
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Siti Member',
            'email' => 'siti@papilaya.com',
            'password' => Hash::make('password'),
            'role' => 'member',
            'is_active' => true,
            'email_verified_at' => now(),
        ]);
        
        User::create([
            'name' => 'Charlie Member',
            'email' => 'charlie@papilaya.com',
            'password' => Hash::make('password'),
            'role' => 'member',
            'is_active' => true,
            'email_verified_at' => now(),
        ]);
    }
}