<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'harga', 'deskripsi', 'gambar'];

    public function keranjangs()
    {
        return $this->hasMany(Keranjang::class);
    }
}
