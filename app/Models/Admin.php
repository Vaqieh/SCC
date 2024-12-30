<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Admin extends Model
{
    use HasFactory;
    protected $guard=[];

    // Relasi hasMany ke tabel lowongan
    public function lowongans()
    {
        return $this->hasMany(Lowongan::class);
    }
}