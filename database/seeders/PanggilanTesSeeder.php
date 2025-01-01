<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PanggilanTesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Menambahkan data dummy
        for ($i = 0; $i < 10; $i++) {
            DB::table('panggilan_tes')->insert([
                'lowongan_id' => $faker->numberBetween(1, 10),  // Anggap ada 10 lowongan
                'perusahaan_id' => $faker->numberBetween(1, 5),  // Anggap ada 5 perusahaan
                'admin_id' => $faker->numberBetween(1, 3),       // Anggap ada 3 admin
                'nama' => $faker->name(),
                'tanggal_pt' => $faker->date(),
                'status' => $faker->randomElement(['dibuka', 'ditutup']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
