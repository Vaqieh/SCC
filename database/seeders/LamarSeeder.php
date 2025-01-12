<?php

namespace Database\Seeders;

use App\Models\Lamar;
use Illuminate\Database\Seeder;

class LamarSeeder extends Seeder
{
    public function run()
    {
        Lamar::factory()->count(10)->create();  // Membuat 10 lamaran secara acak
    }
}
