<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pelanggan')->insert([
            [
            'nama' => 'Dea Nada',
            'alamat' => 'Jember',
            'email' => 'deanada@gmail.com',
            'foto' => 'p1.png'
            ],
            [
            'nama' => 'Sezha Dwi',
            'alamat' => 'Mojokerto',
            'email' => 'sezha@gmail.com',
            'foto' => 'p2.png'
            ],
            [
            'nama' => 'Lisa Ayu',
            'alamat' => 'Mojokerto',
            'email' => 'lisaAyu@gmail.com',
            'foto' => 'p3.png'
            ],
            [
            'nama' => 'Dina P.',
            'alamat' => 'Jogja',
            'email' => 'din@gmail.com',
            'foto' => 'p4.png'
            ],
            [
            'nama' => 'Zahra Nisva',
            'alamat' => 'Jogja',
            'email' => 'Zahra@gmail.com',
            'foto' => 'p5.png'
            ],
            [
            'nama' => 'Daffa R',
            'alamat' => 'Jombang',
            'email' => 'Daff@gmail.com',
            'foto' => 'p6.png'
            ],
            [
            'nama' => 'Puspita Rahma',
            'alamat' => 'Mojokerto',
            'email' => 'Puspita@gmail.com',
            'foto' => 'p7.png'
            ],
            [
            'nama' => 'Izzatur',
            'alamat' => 'Mojokerto',
            'email' => 'Izz@gmail.com',
            'foto' => 'p8.png'
            ],
            [
            'nama' => 'Fifi',
            'alamat' => 'Jogja',
            'email' => 'fif@gmail.com',
            'foto' => 'p9.png'
            ],
            [
            'nama' => 'Faizal N.',
            'alamat' => 'Jogja',
            'email' => 'faizal@gmail.com',
            'foto' => 'p10.png'
            ]
        ]);
    }
}