<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'layanan_id',  // pastikan ini sesuai nama kolom di database
        'tanggal',     // tambahkan tanggal ke fillable
        'alamat',      // tambahkan alamat ke fillable
        'keterangan',
        'status',
    ];

    // Relasi ke User (foreign key = user_id)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi ke Layanan (foreign key = layanan_id)
    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'layanan_id');
    }
}
