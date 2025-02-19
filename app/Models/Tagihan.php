<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    use HasFactory;

    protected $fillable = ['santri_id', 'kategori_id', 'jumlah', 'status'];

    public function santri()
    {
        return $this->belongsTo(Santri::class);
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriPembayaran::class, 'kategori_id');
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class);
    }
}
