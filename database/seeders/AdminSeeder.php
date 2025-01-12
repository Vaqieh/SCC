<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    public function run()
    {
        // Menggunakan factory untuk membuat 10 data dummy Admin
        Admin::factory()->count(5)->create();
    }
}
