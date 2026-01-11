<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Prestasi;
use App\Models\Siswa;
use App\Models\JenisPrestasi;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    public function index(Request $request)
    {
        $guru_id = auth()->user()->relasi_id;
        
        $query = Prestasi::with(['siswa.kelas', 'jenisPrestasi', 'guru'])
                        ->where('guru_id', $guru_id);

        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereHas('siswa', function($q) use ($search) {
                $q->where('nama_siswa', 'like', "%{$search}%")
                  ->orWhere('nis', 'like', "%{$search}%");
            });
        }

        $prestasi = $query->latest()->paginate(10);

        return view('guru.prestasi.index', compact('prestasi'));
    }

    public function create()
    {
        $siswa = Siswa::with('kelas')->where('status', 'aktif')->orderBy('nama_siswa')->get();
        $jenisPrestasi = JenisPrestasi::orderBy('nama_prestasi')->get();
        
        return view('guru.prestasi.create', compact('siswa', 'jenisPrestasi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'jenis_prestasi_id' => 'required|exists:jenis_prestasi,id',
            'nama_kegiatan' => 'required|string|max:200',
            'peringkat' => 'nullable|string|max:50',
            'tanggal' => 'required|date',
            'keterangan' => 'nullable|string',
            'sertifikat' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        $data = $request->all();
        $data['guru_id'] = auth()->user()->relasi_id;

        if ($request->hasFile('sertifikat')) {
            $file = $request->file('sertifikat');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/sertifikat'), $filename);
            $data['sertifikat'] = 'uploads/sertifikat/' . $filename;
        }

        Prestasi::create($data);

        return redirect()->route('guru.prestasi.index')
                         ->with('success', 'Data prestasi berhasil ditambahkan.');
    }

    public function show(Prestasi $prestasi)
    {
        $prestasi->load(['siswa.kelas', 'jenisPrestasi', 'guru']);
        return view('guru.prestasi.show', compact('prestasi'));
    }

    public function edit(Prestasi $prestasi)
    {
        if ($prestasi->guru_id != auth()->user()->relasi_id) {
            abort(403, 'Anda tidak memiliki akses untuk mengedit prestasi ini.');
        }

        $siswa = Siswa::with('kelas')->where('status', 'aktif')->orderBy('nama_siswa')->get();
        $jenisPrestasi = JenisPrestasi::orderBy('nama_prestasi')->get();
        
        return view('guru.prestasi.edit', compact('prestasi', 'siswa', 'jenisPrestasi'));
    }

    public function update(Request $request, Prestasi $prestasi)
    {
        if ($prestasi->guru_id != auth()->user()->relasi_id) {
            abort(403, 'Anda tidak memiliki akses untuk mengupdate prestasi ini.');
        }

        $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'jenis_prestasi_id' => 'required|exists:jenis_prestasi,id',
            'nama_kegiatan' => 'required|string|max:200',
            'peringkat' => 'nullable|string|max:50',
            'tanggal' => 'required|date',
            'keterangan' => 'nullable|string',
            'sertifikat' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        $data = $request->all();

        if ($request->hasFile('sertifikat')) {
            if ($prestasi->sertifikat && file_exists(public_path($prestasi->sertifikat))) {
                unlink(public_path($prestasi->sertifikat));
            }

            $file = $request->file('sertifikat');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/sertifikat'), $filename);
            $data['sertifikat'] = 'uploads/sertifikat/' . $filename;
        }

        $prestasi->update($data);

        return redirect()->route('guru.prestasi.index')
                         ->with('success', 'Data prestasi berhasil diperbarui.');
    }

    public function destroy(Prestasi $prestasi)
    {
        if ($prestasi->guru_id != auth()->user()->relasi_id) {
            abort(403, 'Anda tidak memiliki akses untuk menghapus prestasi ini.');
        }

        if ($prestasi->sertifikat && file_exists(public_path($prestasi->sertifikat))) {
            unlink(public_path($prestasi->sertifikat));
        }

        $prestasi->delete();

        return redirect()->route('guru.prestasi.index')
                         ->with('success', 'Data prestasi berhasil dihapus.');
    }
}