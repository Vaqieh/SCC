<?php

namespace Database\Factories;

use App\Models\KelolaPerusahaan;
use App\Models\Admin;
use App\Models\Lowongan;
use Illuminate\Database\Eloquent\Factories\Factory;

class LowonganFactory extends Factory
{
    // Nama model yang akan digunakan oleh factory ini
    protected $model = Lowongan::class;

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
            'status_lowongan' => $this->faker->randomElement(['menunggu', 'diterima', 'ditolak']), // Status acak
            'tanggal_buat' => $this->faker->date, // Tanggal pembuatan lowongan
            'tanggal_berakhir' => $this->faker->date, // Tanggal berakhir lowongan
            'tanggal_verifikasi' => $this->faker->optional()->date, // Tanggal verifikasi (optional)
            'pendidikan' => $this->faker->randomElement(['SMA', 'D3', 'S1', 'S2']), // Pendidikan acak
            'pengalaman_kerja' => $this->faker->numberBetween(0, 10) . ' tahun', // Pengalaman kerja acak
            'umur' => $this->faker->numberBetween(18, 40), // Umur acak
            'gambar_lowongan' => $this->faker->imageUrl(640, 480, 'business'), // Gambar lowongan acak
            'file' => $this->faker->word . '.pdf', // Nama file lowongan
            'detail' => $this->faker->paragraph, // Detail lowongan acak
            'kuota' => $this->faker->optional()->numberBetween(1, 10), // Kuota pelamar yang dibutuhkan (optional)
        ];
    }
}
