<?php

namespace Database\Factories;

use App\Models\Lamar;
use Illuminate\Database\Eloquent\Factories\Factory;

class LamarFactory extends Factory
{
    // Menentukan model yang digunakan oleh factory
    protected $model = Lamar::class;

    /**
     * Tentukan state default untuk model Lamar.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pelamar_id' => \App\Models\KelolaPelamar::inRandomOrder()->first()->id,  // Ambil id pelamar acak
            'lowongan_id' => \App\Models\Lowongan::inRandomOrder()->first()->id,      // Ambil id lowongan acak
            'TanggalLahir' => $this->faker->date(),                                   // Tanggal lahir acak
            'email' => $this->faker->unique()->safeEmail(),                           // Email acak
            'Alamat' => $this->faker->address(),                                      // Alamat acak
            'JenisKelamin' => $this->faker->randomElement(['laki-laki', 'perempuan']), // Jenis kelamin acak
            'Kompetensi' => $this->faker->word(),                                      // Kompetensi acak
            'sertifikat' => $this->faker->word(),                                     // Sertifikat acak
            'cv' => $this->faker->word() . '.pdf',                                     // CV acak
            'instansi' => $this->faker->company(),                                    // Instansi acak
            'status' => $this->faker->randomElement(['dikirim', 'diproses', 'diterima', 'ditolak']),  // Status acak
        ];
    }
}
