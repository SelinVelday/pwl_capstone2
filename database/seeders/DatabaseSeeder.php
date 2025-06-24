<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema; // <-- TAMBAHKAN INI

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // 1. Matikan pengecekan foreign key
        Schema::disableForeignKeyConstraints();

        // 2. Panggil semua seeder Anda.
        // Seeder ini akan menjalankan truncate di dalamnya masing-masing.
        $this->call([
            UserSeeder::class,
            EventSeeder::class,
            RegistrationSeeder::class,
        ]);

        // 3. Nyalakan kembali pengecekan foreign key
        Schema::enableForeignKeyConstraints();
    }
}