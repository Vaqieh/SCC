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
        Schema::create('kelola_perusahaans', function (Blueprint $table) {
            $table->id();
            $table->string('p_nama');
            $table->string('email_perusahaan');
            $table->string('foto')->nullable();
            $table->string('jenis_industri');
            $table->string('p_tahunBerdiri');
            $table->string('negara');
            $table->string('provinsi');
            $table->string('kabupaten');
            $table->string('kota');
            $table->timestamps();
        });

    }
    public function down(): void
    {
        Schema::dropIfExists('kelola_perusahaans');
    }
};
