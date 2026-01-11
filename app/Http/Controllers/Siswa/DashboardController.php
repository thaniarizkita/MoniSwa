<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $siswa = auth()->user()->siswa;
        $totalPoin = $siswa->totalPoinPelanggaran();
        
        $data = [
            'siswa' => $siswa,
            'total_prestasi' => $siswa->prestasi->count(),
            'total_pelanggaran' => $siswa->pelanggaran->count(),
            'total_poin' => $totalPoin,
            'prestasi_terbaru' => $siswa->prestasi()->with('jenisPrestasi')->latest()->take(5)->get(),
            'pelanggaran_terbaru' => $siswa->pelanggaran()->with('jenisPelanggaran')->latest()->take(5)->get(),
        ];

        return view('siswa.dashboard', $data);
    }

    public function biodata()
    {
        $siswa = auth()->user()->siswa->load(['kelas', 'waliMurid']);
        return view('siswa.biodata', compact('siswa'));
    }

    public function prestasi()
    {
        $siswa = auth()->user()->siswa;
        $prestasi = $siswa->prestasi()->with('jenisPrestasi')->latest()->paginate(10);
        
        return view('siswa.prestasi', compact('prestasi'));
    }

    public function pelanggaran()
    {
        $siswa = auth()->user()->siswa;
        $pelanggaran = $siswa->pelanggaran()->with('jenisPelanggaran')->latest()->paginate(10);
        $totalPoin = $siswa->totalPoinPelanggaran();
        
        return view('siswa.pelanggaran', compact('pelanggaran', 'totalPoin'));
    }
}