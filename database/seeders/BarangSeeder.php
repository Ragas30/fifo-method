<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BarangSeeder extends Seeder
{
    public function run()
    {
        DB::table('barangs')->insert([
            [
                'nama_barang' => 'Semen',
                'stok' => 200,
                'keterangan' => 'Semen kualitas tinggi untuk bangunan',
            ],
            [
                'nama_barang' => 'Pasir',
                'stok' => 500,
                'keterangan' => 'Pasir urug untuk konstruksi',
            ],
            [
                'nama_barang' => 'Batu Bata',
                'stok' => 1000,
                'keterangan' => 'Batu bata merah untuk dinding',
            ],
            [
                'nama_barang' => 'Besi Beton',
                'stok' => 300,
                'keterangan' => 'Besi beton untuk struktur bangunan',
            ],
            [
                'nama_barang' => 'Paku',
                'stok' => 1500,
                'keterangan' => 'Paku untuk sambungan kayu',
            ],
            [
                'nama_barang' => 'Sirtu',
                'stok' => 400,
                'keterangan' => 'Sirtu untuk pondasi dan urugan',
            ],
            [
                'nama_barang' => 'Cat Tembok',
                'stok' => 250,
                'keterangan' => 'Cat tembok berkualitas untuk finishing',
            ],
        ]);
    }
}
