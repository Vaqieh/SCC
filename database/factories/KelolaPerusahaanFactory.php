<?php

namespace Database\Factories;

use App\Models\KelolaPerusahaan;
use Illuminate\Database\Eloquent\Factories\Factory;

class KelolaPerusahaanFactory extends Factory
{
    // Nama model yang akan digunakan oleh factory ini
    protected $model = KelolaPerusahaan::class;

    public function definition()
    {
        return [
            'p_nama' => $this->faker->company(),                  // Nama Perusahaan
            'email_perusahaan' => $this->faker->unique()->safeEmail(),  // Email perusahaan (unik)
            'foto' => $this->faker->imageUrl(640, 480, 'business', true), // Foto perusahaan (URL gambar acak)
            'jenis_industri' => $this->faker->word(),              // Jenis industri
            'p_tahunBerdiri' => $this->faker->year(),              // Tahun berdiri perusahaan
            'negara' => $this->faker->country(),                   // Negara perusahaan
            'provinsi' => $this->faker->state(),                   // Provinsi perusahaan
            'kabupaten' => $this->faker->city(),                   // Kabupaten perusahaan
            'kota' => $this->faker->city(),                        // Kota perusahaan
            'created_at' => now(),                                  // Timestamp created_at
            'updated_at' => now(),                                  // Timestamp updated_at
        ];
    }
}
