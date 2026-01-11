<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\Kelas;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $kelas = Kelas::withCount('siswa')->orderBy('nama_kelas')->get();
        $siswa = Siswa::with('kelas')->orderBy('nama_siswa')->get();
        
        return view('guru.laporan.index', compact('kelas', 'siswa'));
    }

    public function laporanSiswa($id)
    {
        $siswa = Siswa::with(['kelas', 'prestasi.jenisPrestasi', 'pelanggaran.jenisPelanggaran'])->findOrFail($id);
        $totalPoin = $siswa->totalPoinPelanggaran();
        
        return view('guru.laporan.siswa', compact('siswa', 'totalPoin'));
    }

    public function laporanKelas($id)
    {
        $kelas = Kelas::with(['siswa.prestasi', 'siswa.pelanggaran'])->findOrFail($id);
        
        return view('guru.laporan.kelas', compact('kelas'));
    }

    public function cetakSiswa($id)
    {
        $siswa = Siswa::with(['kelas', 'prestasi.jenisPrestasi', 'pelanggaran.jenisPelanggaran'])->findOrFail($id);
        $totalPoin = $siswa->totalPoinPelanggaran();
        
        return view('guru.laporan.cetak-siswa', compact('siswa', 'totalPoin'));
    }

    public function cetakKelas($id)
    {
        $kelas = Kelas::with(['siswa.prestasi', 'siswa.pelanggaran'])->findOrFail($id);
        
        return view('guru.laporan.cetak-kelas', compact('kelas'));
    }
}