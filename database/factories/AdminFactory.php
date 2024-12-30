<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AdminFactory extends Factory
{
    // Nama model yang akan digunakan oleh factory ini
    protected $model = Admin::class;

    public function definition()
    {
        return [
            'admin_nama' => $this->faker->name(),                 // Nama Admin
            'admin_nohp' => $this->faker->phoneNumber(),          // Nomor HP Admin
            'password_admin' => bcrypt('password'),               // Password Admin (gunakan bcrypt)
            'email' => $this->faker->unique()->safeEmail(),      // Email Admin (unik)
            'login_history' => $this->faker->dateTimeThisYear(), // Login history
            'logout_history' => $this->faker->dateTimeThisYear(),// Logout history
        ];
    }
}
