<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Prestasi;
use App\Models\Pelanggaran;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'total_siswa' => Siswa::count(),
            'total_guru' => Guru::count(),
            'total_kelas' => Kelas::count(),
            'total_prestasi' => Prestasi::count(),
            'total_pelanggaran' => Pelanggaran::count(),
            'prestasi_bulan_ini' => Prestasi::whereMonth('tanggal', now()->month)
                                           ->whereYear('tanggal', now()->year)
                                           ->count(),
            'pelanggaran_bulan_ini' => Pelanggaran::whereMonth('tanggal', now()->month)
                                                  ->whereYear('tanggal', now()->year)
                                                  ->count(),
            'siswa_terbaru' => Siswa::with('kelas')->latest()->take(5)->get(),
            'prestasi_terbaru' => Prestasi::with(['siswa', 'jenisPrestasi'])->latest()->take(5)->get(),
            'pelanggaran_terbaru' => Pelanggaran::with(['siswa', 'jenisPelanggaran'])->latest()->take(5)->get(),
        ];

        return view('admin.dashboard', $data);
    }
}