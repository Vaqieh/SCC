<?php

namespace Database\Factories;

use App\Models\Lowongan;
use App\Models\KelolaPerusahaan;
use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PanggilanTesFactory extends Factory
{
    // Nama model yang akan digunakan oleh factory ini
    protected $model = \App\Models\PanggilanTes::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'lowongan_id' => Lowongan::inRandomOrder()->first()->id, // Ambil lowongan acak
            'perusahaan_id' => KelolaPerusahaan::inRandomOrder()->first()->id, // Ambil perusahaan acak
            'admin_id' => Admin::inRandomOrder()->first()->id, // Ambil admin acak
            'nama' => $this->faker->word(), // Nama panggilan tes
            'tanggal_pt' => $this->faker->date(), // Tanggal panggilan tes
            'status' => $this->faker->randomElement(['dibuka', 'ditutup']), // Status panggilan tes
        ];
    }
}
