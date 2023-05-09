<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class nilai_khs extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nilai_khs')->insert([
            [
                'mhs_id' => '7',
                'matkul_id' => '7',
                'nilai' => 'A'
            ],
            [
                'mhs_id' => '7',
                'matkul_id' => '8',
                'nilai' => 'A'
            ],
            [
                'mhs_id' => '7',
                'matkul_id' => '9',
                'nilai' => 'B+'
            ],
            [
                'mhs_id' => '10',
                'matkul_id' => '7',
                'nilai' => 'B+'
            ],
            [
                'mhs_id' => '10',
                'matkul_id' => '8',
                'nilai' => 'A'
            ],
            [
                'mhs_id' => '10',
                'matkul_id' => '9',
                'nilai' => 'B+'
            ]

        ]);
    }
}
