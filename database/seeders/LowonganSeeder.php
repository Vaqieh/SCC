<?php

namespace Database\Seeders;

use App\Models\Lowongan;
use Illuminate\Database\Seeder;

class LowonganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lowongan::factory()->count(10)->create();
    }
}
