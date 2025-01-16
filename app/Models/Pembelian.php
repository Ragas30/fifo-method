<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    protected $table = 'pembelians';
    protected $fillable = ['barang_id', 'jumlah', 'total_harga'];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
