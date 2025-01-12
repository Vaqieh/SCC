<?php

namespace Database\Seeders;

use App\Models\KelolaPelamar;
use Illuminate\Database\Seeder;

class KelolaPelamarSeeder extends Seeder
{
    public function run()
    {
        KelolaPelamar::factory()->count(10)->create();  // Membuat 10 pelamar secara acak
    }
}
