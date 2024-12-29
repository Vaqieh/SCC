<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lowongan extends Model
{
    use HasFactory;

    protected $guard=[];

    // Relasi ke Perusahaan
    public function perusahaan()
    {
        return $this->belongsTo(KelolaPerusahaan::class);  // pastikan menggunakan 'perusahaan_id' di sini
    }

    // Relasi ke Admin
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
