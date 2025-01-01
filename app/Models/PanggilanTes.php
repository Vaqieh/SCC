<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PanggilanTes extends Model
{
    use HasFactory;

    protected $fillable = [
        'lowongan_id', 'perusahaan_id', 'admin_id', 'nama', 'tanggal_pt', 'status'
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

    //Relasi ke Lowongan
    public function lowongan()
    {
        return $this->belongsTo(Lowongan::class, 'lowongan_id');
    }
    
}
