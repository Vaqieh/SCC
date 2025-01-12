<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('lamars', function (Blueprint $table) {
        $table->id();
        $table->foreignId('pelamar_id');
        $table->foreignId('lowongan_id')->constrained(); // Foreign key untuk lowongan_id
        $table->date('TanggalLahir');
        $table->string('email');
        $table->string('Alamat');
        $table->enum('JenisKelamin', ['laki-laki', 'perempuan']);
        $table->string('Kompetensi')->nullable();
        $table->string('sertifikat')->nullable();
        $table->string('cv')->nullable();
        $table->string('instansi')->nullable();
        $table->enum('status',['menunggu','diterima','ditolak'])->default('menunggu');
        $table->timestamps(); // Menambahkan kolom created_at dan updated_at
    });
}

public function down(): void
{
    Schema::dropIfExists('lamars');
}

};
