<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PemesananLayanan extends Model
{
    protected $fillable = [
        'id_user', 'id_layanan', 'tanggal', 'alamat', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }
}
