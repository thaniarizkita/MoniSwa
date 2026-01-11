<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenisPelanggaran;
use Illuminate\Http\Request;

class JenisPelanggaranController extends Controller
{
    public function index()
    {
        $jenisPelanggaran = JenisPelanggaran::latest()->paginate(10);
        return view('admin.jenis-pelanggaran.index', compact('jenisPelanggaran'));
    }

    public function create()
    {
        return view('admin.jenis-pelanggaran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggaran' => 'required|string|max:100',
            'poin' => 'required|integer|min:1',
            'kategori' => 'required|in:ringan,sedang,berat',
            'keterangan' => 'nullable|string',
        ]);

        JenisPelanggaran::create($request->all());

        return redirect()->route('admin.jenis-pelanggaran.index')
                         ->with('success', 'Jenis pelanggaran berhasil ditambahkan.');
    }

    public function edit(JenisPelanggaran $jenisPelanggaran)
    {
        return view('admin.jenis-pelanggaran.edit', compact('jenisPelanggaran'));
    }

    public function update(Request $request, JenisPelanggaran $jenisPelanggaran)
    {
        $request->validate([
            'nama_pelanggaran' => 'required|string|max:100',
            'poin' => 'required|integer|min:1',
            'kategori' => 'required|in:ringan,sedang,berat',
            'keterangan' => 'nullable|string',
        ]);

        $jenisPelanggaran->update($request->all());

        return redirect()->route('admin.jenis-pelanggaran.index')
                         ->with('success', 'Jenis pelanggaran berhasil diperbarui.');
    }

    public function destroy(JenisPelanggaran $jenisPelanggaran)
    {
        if ($jenisPelanggaran->pelanggaran()->count() > 0) {
            return back()->with('error', 'Jenis pelanggaran tidak dapat dihapus karena sudah digunakan.');
        }

        $jenisPelanggaran->delete();

        return redirect()->route('admin.jenis-pelanggaran.index')
                         ->with('success', 'Jenis pelanggaran berhasil dihapus.');
    }
}