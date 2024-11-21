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
        Schema::create('perusahaans', function (Blueprint $table) {
            $table->id();
            $table->string('p_nama');
            $table->string('email_perusahaan');
            $table->string('jenis_industri');
            $table->string('p_password');
            $table->string('p_tahunBerdiri');
            $table->string('p_alamat');
            $table->string('tanggal_verfikasi');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('perusahaans');
    }
};
