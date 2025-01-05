<?php

// database/factories/PanggilanTesFactory.php

namespace Database\Factories;

use App\Models\Lowongan;
use App\Models\KelolaPerusahaan;
use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PanggilanTes>
 */
class PanggilanTesFactory extends Factory
{
    public function definition(): array
    {
        return [
            'lowongan_id' => Lowongan::factory(), // Menggunakan factory Lowongan
            'perusahaan_id' => KelolaPerusahaan::factory(), // Menggunakan factory Perusahaan
            'admin_id' => Admin::factory(), // Menggunakan factory Admin
            'nama' => $this->faker->company,
            'tanggal_pt' => $this->faker->date(),
            'status' => $this->faker->randomElement(['dibuka', 'ditutup']),
        ];
    }
}

