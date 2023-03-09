<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeluargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('keluarga')->insert([
            [
                'nik' => '2341',
                'nama' => 'Sabil',
                'agama' => 'Islam',
                'peran' => 'ayah'
            ],
            [
                'nik' => '2342',
                'nama' => 'Shelia',
                'agama' => 'Islam',
                'peran' => 'ibu'
            ],
            [
                'nik' => '2343',
                'nama' => 'Sanji',
                'agama' => 'Islam',
                'peran' => 'anak'
            ]
        ]);
    }
}
