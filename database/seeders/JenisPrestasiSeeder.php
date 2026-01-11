<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JenisPrestasi;

class JenisPrestasiSeeder extends Seeder
{
    public function run(): void
    {
        $prestasi = [
            ['nama_prestasi' => 'Lomba Matematika', 'tingkat' => 'kabupaten', 'keterangan' => 'Olimpiade Matematika'],
            ['nama_prestasi' => 'Lomba Fisika', 'tingkat' => 'provinsi', 'keterangan' => 'Olimpiade Fisika'],
            ['nama_prestasi' => 'Lomba Bahasa Inggris', 'tingkat' => 'nasional', 'keterangan' => 'English Competition'],
            ['nama_prestasi' => 'Lomba Futsal', 'tingkat' => 'kecamatan', 'keterangan' => 'Turnamen Futsal'],
            ['nama_prestasi' => 'Lomba Tahfidz', 'tingkat' => 'kabupaten', 'keterangan' => 'Musabaqah Tahfidz Quran'],
            ['nama_prestasi' => 'Lomba Seni', 'tingkat' => 'sekolah', 'keterangan' => 'Festival Seni Budaya'],
        ];

        foreach ($prestasi as $p) {
            JenisPrestasi::create($p);
        }
    }
}