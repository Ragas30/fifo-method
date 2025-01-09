<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barangs';
    protected $primaryKey = 'id';
    protected $fillable = ['nama_barang', 'stok', 'keterangan'];
}
