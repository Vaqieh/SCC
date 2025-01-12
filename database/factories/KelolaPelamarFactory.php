<?php

namespace Database\Factories;

use App\Models\KelolaPelamar;
use Illuminate\Database\Eloquent\Factories\Factory;

class KelolaPelamarFactory extends Factory
{
    protected $model = KelolaPelamar::class;

    public function definition()
    {
        return [
            'NamaPelamar' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail, // Menambahkan email yang unik
            'TanggalLahir' => $this->faker->date(),
            'Alamat' => $this->faker->address,
            'JenisKelamin' => $this->faker->randomElement(['laki-laki', 'perempuan']),
            'Kompetensi' => $this->faker->word(),
            'sertifikat' => $this->faker->word(),
            'cv' => 'cv_' . $this->faker->uuid . '.pdf',
            'instansi' => $this->faker->company,
            'foto' => 'foto_' . $this->faker->uuid . '.jpg', // Jika ada foto, buatkan nama file unik
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
