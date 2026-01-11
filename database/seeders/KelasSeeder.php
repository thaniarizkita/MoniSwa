<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kelas;

class KelasSeeder extends Seeder
{
    public function run(): void
    {
        $kelas = [
            ['nama_kelas' => 'X IPA 1', 'tingkat' => 'X', 'jurusan' => 'IPA'],
            ['nama_kelas' => 'X IPA 2', 'tingkat' => 'X', 'jurusan' => 'IPA'],
            ['nama_kelas' => 'X IPS 1', 'tingkat' => 'X', 'jurusan' => 'IPS'],
            ['nama_kelas' => 'XI IPA 1', 'tingkat' => 'XI', 'jurusan' => 'IPA'],
            ['nama_kelas' => 'XI IPA 2', 'tingkat' => 'XI', 'jurusan' => 'IPA'],
            ['nama_kelas' => 'XI IPS 1', 'tingkat' => 'XI', 'jurusan' => 'IPS'],
            ['nama_kelas' => 'XII IPA 1', 'tingkat' => 'XII', 'jurusan' => 'IPA'],
            ['nama_kelas' => 'XII IPA 2', 'tingkat' => 'XII', 'jurusan' => 'IPA'],
            ['nama_kelas' => 'XII IPS 1', 'tingkat' => 'XII', 'jurusan' => 'IPS'],
        ];

        foreach ($kelas as $k) {
            Kelas::create($k);
        }
    }
}