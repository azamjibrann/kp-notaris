<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Layanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_layanan',
        'deskripsi',
    ];

    /**
     * Relasi: Satu layanan bisa punya banyak order
     */
    public function orders()
    {
        return $this->hasMany(Order::class, 'layanan_id');
    }
}
