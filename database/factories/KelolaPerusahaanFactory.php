<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\KelolaPerusahaan>
 */
class KelolaPerusahaanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'p_nama' => fake()->company(),
            'email_perusahaan' => fake()->companyEmail(),
            'jenis_industri' => fake()->word(),
            'p_tahunBerdiri' => fake()->year(),
            'negara' => fake()->country(), // Gunakan country() untuk mendapatkan nama negara
            'provinsi' => fake()->state(),
            'kabupaten' => fake()->city(),
            'kota' => fake()->city(),
        ];
    }
}
