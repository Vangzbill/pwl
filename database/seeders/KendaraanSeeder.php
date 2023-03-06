<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kendaraan')->insert([
            [
                'nopol' => 'N 63 WE',
                'merk' => 'Honda',
                'jenis' => 'CIVIC',
                'tahun_buat' => 2018,
                'warna' => 'merah'
            ],
            [
                'nopol' => 'AG 1227 TE',
                'merk' => 'Honda',
                'jenis' => 'City',
                'tahun_buat' => 2017,
                'warna' => 'hitam'
            ],
            [
                'nopol' => 'B 3 GO',
                'merk' => 'Yamaha',
                'jenis' => 'Vixion',
                'tahun_buat' => 2018,
                'warna' => 'biru'
            ]
        ]);
    }
}
