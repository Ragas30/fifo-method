<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksis';
    protected $primaryKey = 'id';
    protected $fillable = ['barang_id', 'jenis', 'jumlah', 'harga_satuan',];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
