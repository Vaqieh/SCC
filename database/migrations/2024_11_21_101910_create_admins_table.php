<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('admin_nama');
            $table->string('admin_nohp');
            $table->string('email');
            
            // Membuat kolom untuk login_history dan logout_history
            $table->timestamp('login_history')->nullable();
            $table->timestamp('logout_history')->nullable();
            
            // Membuat kolom created_at dan updated_at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
