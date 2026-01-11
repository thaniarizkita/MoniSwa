<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenisPrestasi;
use Illuminate\Http\Request;

class JenisPrestasiController extends Controller
{
    public function index()
    {
        $jenisPrestasi = JenisPrestasi::latest()->paginate(10);
        return view('admin.jenis-prestasi.index', compact('jenisPrestasi'));
    }

    public function create()
    {
        return view('admin.jenis-prestasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_prestasi' => 'required|string|max:100',
            'tingkat' => 'required|in:sekolah,kecamatan,kabupaten,provinsi,nasional,internasional',
            'keterangan' => 'nullable|string',
        ]);

        JenisPrestasi::create($request->all());

        return redirect()->route('admin.jenis-prestasi.index')
                         ->with('success', 'Jenis prestasi berhasil ditambahkan.');
    }

    public function edit(JenisPrestasi $jenisPrestasi)
    {
        return view('admin.jenis-prestasi.edit', compact('jenisPrestasi'));
    }

    public function update(Request $request, JenisPrestasi $jenisPrestasi)
    {
        $request->validate([
            'nama_prestasi' => 'required|string|max:100',
            'tingkat' => 'required|in:sekolah,kecamatan,kabupaten,provinsi,nasional,internasional',
            'keterangan' => 'nullable|string',
        ]);

        $jenisPrestasi->update($request->all());

        return redirect()->route('admin.jenis-prestasi.index')
                         ->with('success', 'Jenis prestasi berhasil diperbarui.');
    }

    public function destroy(JenisPrestasi $jenisPrestasi)
    {
        if ($jenisPrestasi->prestasi()->count() > 0) {
            return back()->with('error', 'Jenis prestasi tidak dapat dihapus karena sudah digunakan.');
        }

        $jenisPrestasi->delete();

        return redirect()->route('admin.jenis-prestasi.index')
                         ->with('success', 'Jenis prestasi berhasil dihapus.');
    }
}