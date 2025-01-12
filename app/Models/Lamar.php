<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lamar extends Model
{
    use HasFactory;
    protected $table = 'lamars';
    protected $guarded = [];

    public function pelamar()
    {
        return $this->belongsTo(KelolaPelamar::class, 'pelamar_id');
    }

    public function lowongan()
    {
        return $this->belongsTo(Lowongan::class, 'lowongan_id');
    }
}
