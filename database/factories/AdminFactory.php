<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdminFactory extends Factory
{
    // Nama model yang akan digunakan oleh factory ini
    protected $model = Admin::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'admin_nama' => $this->faker->name(),                       // Nama Admin
            'admin_nohp' => $this->faker->phoneNumber(),                // Nomor HP Admin
            'email' => $this->faker->unique()->safeEmail(),             // Email Admin (unik)
            'login_history' => $this->faker->optional()->dateTimeThisYear(), // Login history (optional)
            'logout_history' => $this->faker->optional()->dateTimeThisYear(), // Logout history (optional)
            'created_at' => now(),                                       // created_at (waktu sekarang)
            'updated_at' => now(),                                       // updated_at (waktu sekarang)
        ];
    }
}
