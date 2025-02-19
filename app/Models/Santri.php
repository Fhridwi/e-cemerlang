<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'nis', 'kelas', 'user_id'];

    public function waliSantri()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tagihans()
    {
        return $this->hasMany(Tagihan::class);
    }
}
