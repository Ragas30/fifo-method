<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id';
    protected $fillable = ['barang_id', 'jenis', 'jumlah', 'harga_satuan',];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    public static function boot()
    {
        parent::boot();

        static::created(function ($barang) {
            
        });
    }
}
