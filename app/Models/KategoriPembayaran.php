<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPembayaran extends Model
{
    use HasFactory;

    protected $fillable = ['nama_kategori', 'nominal'];

    public function tagihans()
    {
        return $this->hasMany(Tagihan::class, 'kategori_id');
    }
}
