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
            $table->foreignId('lowongan_id')->constrained('lowongans')->onDelete('cascade');
            $table->foreignId('perusahaan_id')->constrained('kelola_perusahaans')->onDelete('cascade');
            $table->foreignId('admin_id')->nullable()->constrained()->onDelete('cascade')->change();
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
