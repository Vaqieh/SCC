<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Admin extends Model
{
    use HasFactory;
    protected $fillable = [
        'admin_id',
        'admin_nama',
        'admin_nohp',
        'password_admin',
        'email',
        'login_history',
        'logout_history',
        'password_admin',
    ];

    // Relasi hasMany ke tabel lowongan
    public function lowongans()
    {
        return $this->hasMany(Lowongan::class, 'admin_id');
    }
}
