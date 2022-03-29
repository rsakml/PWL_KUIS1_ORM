<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaBaruSeeder extends Seeder
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
                'nim' => '2041720224',
                'nama' => 'Dimas Anggara',
		        'tglLahir' => '2002-12-08',
                'kelas' => 'TI 2E',
                'jurusan' => 'Teknologi Informasi',
                'no_handphone' => '085671234567',
		        'email' => 'dimas@gmail.com'
            ],
            [
                'nim' => '2041720225',
                'nama' => 'Kurniawan',
		        'tglLahir' => '2002-11-09',
                'kelas' => 'TI 2E',
                'jurusan' => 'Teknologi Informasi',
                'no_handphone' => '085671234566',
		        'email' => 'kurnia@gmail.com'
            ]
        ]);
    }
}
