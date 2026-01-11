<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Pelanggaran;
use App\Models\Siswa;
use App\Models\JenisPelanggaran;
use Illuminate\Http\Request;

class PelanggaranController extends Controller
{
    public function index(Request $request)
    {
        $guru_id = auth()->user()->relasi_id;
        
        $query = Pelanggaran::with(['siswa.kelas', 'jenisPelanggaran', 'guru'])
                           ->where('guru_id', $guru_id);

        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereHas('siswa', function($q) use ($search) {
                $q->where('nama_siswa', 'like', "%{$search}%")
                  ->orWhere('nis', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $pelanggaran = $query->latest()->paginate(10);

        return view('guru.pelanggaran.index', compact('pelanggaran'));
    }

    public function create()
    {
        $siswa = Siswa::with('kelas')->where('status', 'aktif')->orderBy('nama_siswa')->get();
        $jenisPelanggaran = JenisPelanggaran::orderBy('nama_pelanggaran')->get();
        
        return view('guru.pelanggaran.create', compact('siswa', 'jenisPelanggaran'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'jenis_pelanggaran_id' => 'required|exists:jenis_pelanggaran,id',
            'tanggal' => 'required|date',
            'keterangan' => 'nullable|string',
            'status' => 'required|in:belum_ditindak,dalam_proses,selesai',
            'tindakan' => 'nullable|string',
        ]);

        $data = $request->all();
        $data['guru_id'] = auth()->user()->relasi_id;

        Pelanggaran::create($data);

        return redirect()->route('guru.pelanggaran.index')
                         ->with('success', 'Data pelanggaran berhasil ditambahkan.');
    }

    public function show(Pelanggaran $pelanggaran)
    {
        $pelanggaran->load(['siswa.kelas', 'jenisPelanggaran', 'guru']);
        return view('guru.pelanggaran.show', compact('pelanggaran'));
    }

    public function edit(Pelanggaran $pelanggaran)
    {
        if ($pelanggaran->guru_id != auth()->user()->relasi_id) {
            abort(403, 'Anda tidak memiliki akses untuk mengedit pelanggaran ini.');
        }

        $siswa = Siswa::with('kelas')->where('status', 'aktif')->orderBy('nama_siswa')->get();
        $jenisPelanggaran = JenisPelanggaran::orderBy('nama_pelanggaran')->get();
        
        return view('guru.pelanggaran.edit', compact('pelanggaran', 'siswa', 'jenisPelanggaran'));
    }

    public function update(Request $request, Pelanggaran $pelanggaran)
    {
        if ($pelanggaran->guru_id != auth()->user()->relasi_id) {
            abort(403, 'Anda tidak memiliki akses untuk mengupdate pelanggaran ini.');
        }

        $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'jenis_pelanggaran_id' => 'required|exists:jenis_pelanggaran,id',
            'tanggal' => 'required|date',
            'keterangan' => 'nullable|string',
            'status' => 'required|in:belum_ditindak,dalam_proses,selesai',
            'tindakan' => 'nullable|string',
        ]);

        $pelanggaran->update($request->all());

        return redirect()->route('guru.pelanggaran.index')
                         ->with('success', 'Data pelanggaran berhasil diperbarui.');
    }

    public function destroy(Pelanggaran $pelanggaran)
    {
        if ($pelanggaran->guru_id != auth()->user()->relasi_id) {
            abort(403, 'Anda tidak memiliki akses untuk menghapus pelanggaran ini.');
        }

        $pelanggaran->delete();

        return redirect()->route('guru.pelanggaran.index')
                         ->with('success', 'Data pelanggaran berhasil dihapus.');
    }
}