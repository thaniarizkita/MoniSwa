<?php

namespace App\Http\Controllers\Wali;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $wali = auth()->user()->waliMurid;
        $siswa = $wali->siswa;
        $totalPoin = $siswa->totalPoinPelanggaran();
        
        $data = [
            'wali' => $wali,
            'siswa' => $siswa,
            'total_prestasi' => $siswa->prestasi->count(),
            'total_pelanggaran' => $siswa->pelanggaran->count(),
            'total_poin' => $totalPoin,
            'prestasi_terbaru' => $siswa->prestasi()->with('jenisPrestasi')->latest()->take(5)->get(),
            'pelanggaran_terbaru' => $siswa->pelanggaran()->with('jenisPelanggaran')->latest()->take(5)->get(),
        ];

        return view('wali.dashboard', $data);
    }

    public function biodata()
    {
        $siswa = auth()->user()->waliMurid->siswa->load('kelas');
        return view('wali.biodata', compact('siswa'));
    }

    public function prestasi()
    {
        $siswa = auth()->user()->waliMurid->siswa;
        $prestasi = $siswa->prestasi()->with('jenisPrestasi')->latest()->paginate(10);
        
        return view('wali.prestasi', compact('prestasi'));
    }

    public function pelanggaran()
    {
        $siswa = auth()->user()->waliMurid->siswa;
        $pelanggaran = $siswa->pelanggaran()->with('jenisPelanggaran')->latest()->paginate(10);
        $totalPoin = $siswa->totalPoinPelanggaran();
        
        return view('wali.pelanggaran', compact('pelanggaran', 'totalPoin'));
    }
}