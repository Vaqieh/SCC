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
            $table->foreignId('admin_id')->nullable()->constrained()->onDelete('cascade')->change();
            $table->string('nama_lowongan');
            $table->enum('status_lowongan',['menunggu','diterima','ditolak'])->default('menunggu'); // Status: 'menunggu', 'ditolak', 'dibuka'
            $table->date('tanggal_buat');
            $table->date('tanggal_berakhir');
            $table->date('tanggal_verifikasi')->nullable();
            $table->string('pendidikan');
            $table->string('pengalaman_kerja');
            $table->integer('umur');
            $table->string('gambar_lowongan');
            $table->string('file');
            $table->text('detail')->nullable();
            $table->text('kuota')->nullable();
            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lowongans', function (Blueprint $table) {
            // Mengembalikan kolom admin_id menjadi tidak nullable
            $table->foreignId('admin_id')->nullable(false)->constrained()->onDelete('cascade')->change();
        });
    }
};
