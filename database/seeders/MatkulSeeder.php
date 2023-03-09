<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatkulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('matkul')->insert([
            [
                'nama_matkul' => 'Pemrograman Web Lanjut',
                'sks' => 3
            ],
            [
                'nama_matkul' => 'Proyek 1',
                'sks' => 6
            ],
            [
                'nama_matkul' => 'Analisis Dan Desain Berorientasi Objek',
                'sks' => 2
            ],
            [
                'nama_matkul' => 'Manajemen Proyek',
                'sks' => 6
            ],
        ]);
    }
}
