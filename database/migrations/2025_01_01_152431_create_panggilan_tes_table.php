<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('panggilan_tes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lowongan_id');
            $table->foreignId('perusahaan_id');
            $table->foreignId('admin_id');
            $table-> string('nama');
            $table->date('tanggal_pt');
            $table->enum('status', ['dibuka','ditutup']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('panggilan_tes');
    }
};
