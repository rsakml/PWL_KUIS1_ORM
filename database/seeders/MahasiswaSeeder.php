<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mahasiswa')->insert([
            [
                'nim' => '2041720219',
                'nama' => 'Rossa Akmalia',
                'kelas' => 'TI 2E',
                'jurusan' => 'Teknologi Informasi',
                'no_handphone' => '085671234567'
            ],
            [
                'nim' => '2041720220',
                'nama' => 'Rinda Sari',
                'kelas' => 'TI 2E',
                'jurusan' => 'Teknologi Informasi',
                'no_handphone' => '085671234566'
            ]
        ]);
    }
}