<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KelolaPerusahaan;

class KelolaPerusahaanSeeder extends Seeder
{
    public function run()
    {
        // Menggunakan factory untuk membuat 10 data dummy KelolaPerusahaan
        KelolaPerusahaan::factory()->count(10)->create();
    }
}
