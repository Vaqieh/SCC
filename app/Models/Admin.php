<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admins';

    // Jika Anda ingin menggunakan guarded, pastikan untuk menetapkan properti ini
    // protected $guarded = [];  // Gunakan ini jika Anda ingin mengijinkan semua kolom terisi

    // Atau gunakan $fillable untuk kolom yang bisa diisi
    protected $fillable = [
        'email', 'admin_nama', 'admin_nohp'
    ];

    // Relasi hasMany ke tabel lowongan
    public function lowongan()
    {
        return $this->hasMany(Lowongan::class);
    }
    // Relasi ke PanggilanTes (Satu Admin bisa memiliki banyak PanggilanTes)
    public function panggilanTes()
    {
        return $this->hasMany(PanggilanTes::class);
    }
}
