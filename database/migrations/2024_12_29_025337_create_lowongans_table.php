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
        Schema::create('lowongans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('perusahaan_id')->constrained('kelola_perusahaans')->onDelete('cascade');
            $table->foreignId('admin_id')->constrained()->onDelete('cascade');
            $table->string('nama_lowongan');
            $table->string('status_lowongan'); // Status: 'menunggu', 'ditolak', 'dibuka'
            $table->date('tanggal_buat');
            $table->date('tanggal_berakhir');
            $table->date('tanggal_verifikasi');
            $table->string('pendidikan');
            $table->string('pengalaman_kerja');
            $table->integer('umur');
            $table->string('gambar_lowongan');
            $table->text('detail');
            $table->timestamps();
        });
    }
    


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lowongans');
    }
};
