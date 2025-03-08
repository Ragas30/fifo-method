<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Container\Attributes\DB;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BarangSeeder extends Seeder
{
    public function run()
    {
        Barang::factory()->createMany([
            [
                'kd_barang' => 'BRG001',
                'nama_barang' => 'Baja Ringan',
                'stok' => 10,
                'satuan' => 'pcs',
                'harga_beli' => 10000,
                'harga_jual' => 12000,
                'keterangan' => 'Bahan untuk membuat rumah',
            ],
            [
                'kd_barang' => 'BRG002',
                'nama_barang' => 'Baja Berat',
                'stok' => 5,
                'harga_beli' => 10000,
                'harga_jual' => 12000,
                'satuan' => 'pcs',
                'keterangan' => 'Bahan untuk membuat rumah',
            ],
            [
                'kd_barang' => 'BRG003',
                'nama_barang' => 'Semen',
                'stok' => 5,
                'harga_beli' => 10000,
                'harga_jual' => 12000,
                'satuan' => 'kg',
                'keterangan' => 'Bahan untuk membuat rumah',
            ],
        ]);
    }
}
