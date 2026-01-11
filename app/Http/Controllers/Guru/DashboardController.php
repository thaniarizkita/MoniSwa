<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\Prestasi;
use App\Models\Pelanggaran;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $guru_id = auth()->user()->relasi_id;
        
        $data = [
            'total_siswa' => Siswa::count(),
            'total_prestasi' => Prestasi::where('guru_id', $guru_id)->count(),
            'total_pelanggaran' => Pelanggaran::where('guru_id', $guru_id)->count(),
            'prestasi_bulan_ini' => Prestasi::where('guru_id', $guru_id)
                                           ->whereMonth('tanggal', now()->month)
                                           ->whereYear('tanggal', now()->year)
                                           ->count(),
            'pelanggaran_bulan_ini' => Pelanggaran::where('guru_id', $guru_id)
                                                  ->whereMonth('tanggal', now()->month)
                                                  ->whereYear('tanggal', now()->year)
                                                  ->count(),
            'prestasi_terbaru' => Prestasi::where('guru_id', $guru_id)
                                         ->with(['siswa', 'jenisPrestasi'])
                                         ->latest()
                                         ->take(5)
                                         ->get(),
            'pelanggaran_terbaru' => Pelanggaran::where('guru_id', $guru_id)
                                                ->with(['siswa', 'jenisPelanggaran'])
                                                ->latest()
                                                ->take(5)
                                                ->get(),
        ];

        return view('guru.dashboard', $data);
    }

    public function siswa(Request $request)
    {
        $query = Siswa::with('kelas');

        if ($request->filled('kelas')) {
            $query->where('id_kelas', $request->kelas);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama_siswa', 'like', "%{$search}%")
                  ->orWhere('nis', 'like', "%{$search}%");
            });
        }

        $siswa = $query->latest()->paginate(10);
        $kelas = \App\Models\Kelas::orderBy('nama_kelas')->get();

        return view('guru.siswa.index', compact('siswa', 'kelas'));
    }

    public function siswaDetail($id)
    {
        $siswa = Siswa::with(['kelas', 'prestasi.jenisPrestasi', 'pelanggaran.jenisPelanggaran'])->findOrFail($id);
        $totalPoin = $siswa->totalPoinPelanggaran();
        
        return view('guru.siswa.show', compact('siswa', 'totalPoin'));
    }
}