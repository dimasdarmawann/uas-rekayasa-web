<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $this->call(UserSeeder::class);

        DB::table('kegiatans')->insert([
            [
                'nama_kegiatan' => 'Basket',
                'hari'          => 'Senin',
                'waktu'         => '15:00',
                'pembina'       => 'Budi Santoso, S.Pd',
                'gambar'        => null,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'nama_kegiatan' => 'Futsal',
                'hari'          => 'Selasa',
                'waktu'         => '15:30',
                'pembina'       => 'Ahmad Fauzi, S.Pd',
                'gambar'        => null,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'nama_kegiatan' => 'English Club',
                'hari'          => 'Rabu',
                'waktu'         => '14:00',
                'pembina'       => 'Sari Dewi, S.S',
                'gambar'        => null,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'nama_kegiatan' => 'PMR',
                'hari'          => 'Kamis',
                'waktu'         => '14:30',
                'pembina'       => 'Rina Wahyuni, S.Kep',
                'gambar'        => null,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'nama_kegiatan' => 'Pramuka',
                'hari'          => 'Jumat',
                'waktu'         => '14:00',
                'pembina'       => 'Hendra Wijaya, S.Pd',
                'gambar'        => null,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'nama_kegiatan' => 'Seni Musik',
                'hari'          => 'Sabtu',
                'waktu'         => '09:00',
                'pembina'       => 'Dewi Lestari, S.Sn',
                'gambar'        => null,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
        ]);
    }
}
