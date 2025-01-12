<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            AdminSeeder::class,            // Seeder untuk admin
            KelolaPerusahaanSeeder::class, // Seeder untuk perusahaan
            KelolaPelamarSeeder::class,    // Seeder untuk pelamar
            LowonganSeeder::class,         // Seeder untuk lowongan
            LamarSeeder::class,            // Seeder untuk lamaran
            PanggilanTesSeeder::class,     // Seeder untuk panggilan tes
        ]);
    }
}
