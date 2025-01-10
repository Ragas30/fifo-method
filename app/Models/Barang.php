<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barangs';
    protected $primaryKey = 'id';
    protected $fillable = ['nama_barang', 'stok', 'satuan', 'harga_beli', 'harga_jual', 'keterangan'];

    public function  transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }

    public function penjualan()
    {
        return $this->hasMany(Penjualan::class);
    }
}
