<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HobbySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hobby')->insert([
            [
                'nama' => 'Bola Voli',
                'alasan' => 'Menyehatkan tubuh'
            ],
            [
                'nama' => 'Bermain Game',
                'alasan' => 'Bisa merefhresing otak'
            ]
        ]);
    }
}
