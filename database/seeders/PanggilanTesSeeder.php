<?php

namespace Database\Seeders;

use App\Models\PanggilanTes;
use Illuminate\Database\Seeder;

class PanggilanTesSeeder extends Seeder
{
    public function run()
    {
        PanggilanTes::factory()->count(10)->create();  // Membuat 10 panggilan tes secara acak
    }
}
