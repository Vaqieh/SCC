<?php

namespace Database\Factories;

use App\Models\KelolaPerusahaan;
use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lowongan>
 */
class LowonganFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'perusahaan_id' => KelolaPerusahaan::inRandomOrder()->first()->id, // Ambil perusahaan acak
            'admin_id' => Admin::inRandomOrder()->first()->id, // Ambil admin acak
            'nama_lowongan' => $this->faker->jobTitle, // Nama lowongan acak
            'status_lowongan' => $this->faker->randomElement(['menunggu', 'ditolak', 'dibuka']), // Status acak
            'tanggal_buat' => $this->faker->date, // Tanggal pembuatan lowongan
            'tanggal_berakhir' => $this->faker->date, // Tanggal berakhir lowongan
            'tanggal_verifikasi' => $this->faker->date, // Tanggal verifikasi
            'pendidikan' => $this->faker->randomElement(['SMA', 'D3', 'S1', 'S2']), // Pendidikan acak
            'pengalaman_kerja' => $this->faker->numberBetween(0, 10) . ' tahun', // Pengalaman kerja acak
            'umur' => $this->faker->numberBetween(18, 40), // Umur acak
            'gambar_lowongan' => $this->faker->imageUrl(640, 480, 'business'), // Gambar lowongan acak
            'detail' => $this->faker->paragraph, // Detail lowongan acak
        ];
    }
}
