<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KelolaPelamar;

class KelolaPelamarSeeder extends Seeder
{
    public function run()
    {
        // Membuat 10 data dummy pelamar
        KelolaPelamar::factory()->count(50)->create();
    }
}
