<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelolaPerusahaan extends Model
{
    use HasFactory;

    protected $guarded = [];

   

    // Relasi ke Lowongan
    public function lowongans()
    {
        return $this->hasMany(Lowongan::class);

    }
    // Relasi ke PanggilanTes (Satu Perusahaan bisa memiliki banyak PanggilanTes)
    public function panggilanTes()
    {
        return $this->hasMany(PanggilanTes::class);
    }
}
