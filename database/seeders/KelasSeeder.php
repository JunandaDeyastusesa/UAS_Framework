<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kelas')->insert([
            [
                'angka_kelas' => '1',
                'nama_kelas' => 'Kelas 1'
            ],
            [
                'angka_kelas' => '2',
                'nama_kelas' => 'Kelas 2'
            ],
            [
                'angka_kelas' => '3',
                'nama_kelas' => 'Kelas 3'
            ],
        ]);
    }
}
