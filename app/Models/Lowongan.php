<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lowongan extends Model
{
    use HasFactory;
    // Menentukan kolom-kolom yang bisa diisi
    protected $fillable = [
        'admin_id', 'perusahaan_id', 'nama_lowongan', 'status_lowongan', 'tanggal_buat',
        'tanggal_berakhir', 'tanggal_verifikasi', 'pendidikan', 'pengalaman_kerja',
        'umur', 'gambar_lowongan', 'detail', 'file',
    ];
    
    // Relasi ke Perusahaan
    public function perusahaan()
    {
        return $this->belongsTo(KelolaPerusahaan::class, 'perusahaan_id');
    }

    // Relasi ke Admin
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
    // Relasi ke PanggilanTes (Satu Lowongan bisa memiliki banyak PanggilanTes)
    public function panggilanTes()
    {
        return $this->hasMany(PanggilanTes::class);
    }
}
