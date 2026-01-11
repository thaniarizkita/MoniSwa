<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JenisPelanggaran;

class JenisPelanggaranSeeder extends Seeder
{
    public function run(): void
    {
        $pelanggaran = [
            // Pelanggaran Ringan
            ['nama_pelanggaran' => 'Terlambat masuk kelas', 'poin' => 5, 'kategori' => 'ringan', 'keterangan' => 'Datang terlambat tanpa keterangan'],
            ['nama_pelanggaran' => 'Tidak menggunakan seragam lengkap', 'poin' => 10, 'kategori' => 'ringan', 'keterangan' => 'Atribut tidak lengkap'],
            ['nama_pelanggaran' => 'Tidak mengerjakan PR', 'poin' => 5, 'kategori' => 'ringan', 'keterangan' => 'Tidak mengerjakan tugas rumah'],
            ['nama_pelanggaran' => 'Ramai di kelas', 'poin' => 10, 'kategori' => 'ringan', 'keterangan' => 'Mengganggu proses belajar'],
            
            // Pelanggaran Sedang
            ['nama_pelanggaran' => 'Membolos', 'poin' => 25, 'kategori' => 'sedang', 'keterangan' => 'Tidak hadir tanpa izin'],
            ['nama_pelanggaran' => 'Menyontek saat ujian', 'poin' => 30, 'kategori' => 'sedang', 'keterangan' => 'Kecurangan akademik'],
            ['nama_pelanggaran' => 'Keluar kelas tanpa izin', 'poin' => 20, 'kategori' => 'sedang', 'keterangan' => 'Meninggalkan kelas tanpa ijin guru'],
            ['nama_pelanggaran' => 'Merokok di lingkungan sekolah', 'poin' => 50, 'kategori' => 'sedang', 'keterangan' => 'Melanggar aturan kesehatan'],
            
            // Pelanggaran Berat
            ['nama_pelanggaran' => 'Berkelahi', 'poin' => 75, 'kategori' => 'berat', 'keterangan' => 'Tindakan kekerasan'],
            ['nama_pelanggaran' => 'Membawa senjata tajam', 'poin' => 100, 'kategori' => 'berat', 'keterangan' => 'Membahayakan keselamatan'],
            ['nama_pelanggaran' => 'Narkoba', 'poin' => 150, 'kategori' => 'berat', 'keterangan' => 'Terlibat narkoba'],
            ['nama_pelanggaran' => 'Merusak fasilitas sekolah', 'poin' => 60, 'kategori' => 'berat', 'keterangan' => 'Vandalisme'],
        ];

        foreach ($pelanggaran as $p) {
            JenisPelanggaran::create($p);
        }
    }
}