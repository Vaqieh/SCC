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
        // Mengisi tabel lowongan dengan 10 data dummy
        Lowongan::factory(200)->create();
    }
}
