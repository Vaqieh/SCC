<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
// use PhpParser\Node\NullableType;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kelola_pelamars', function (Blueprint $table) {
            $table->id();
            $table->string('NamaPelamar');
            $table->string('email');
            $table->date('TanggalLahir');
            $table->string('Alamat');
            $table->enum('JenisKelamin', ['laki-laki','perempuan']);
            $table->string('Kompetensi')->nullable();
            $table->string('sertifikat')->nullable();
            $table->string('cv');
            $table->string('instansi')->nullable();
            $table->string('foto')->nullable();

            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('kelola_pelamars');
    }
};
