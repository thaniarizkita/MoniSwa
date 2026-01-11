<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        $guru = Guru::latest()->paginate(10);
        return view('admin.guru.index', compact('guru'));
    }

    public function create()
    {
        return view('admin.guru.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'nullable|string|max:30|unique:guru,nip',
            'nama_guru' => 'required|string|max:100',
            'mapel' => 'nullable|string|max:50',
            'no_hp' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'nullable|string',
        ]);

        Guru::create($request->all());

        return redirect()->route('admin.guru.index')
                         ->with('success', 'Data guru berhasil ditambahkan.');
    }

    public function show(Guru $guru)
    {
        $guru->load(['prestasi.siswa', 'pelanggaran.siswa']);
        return view('admin.guru.show', compact('guru'));
    }

    public function edit(Guru $guru)
    {
        return view('admin.guru.edit', compact('guru'));
    }

    public function update(Request $request, Guru $guru)
    {
        $request->validate([
            'nip' => 'nullable|string|max:30|unique:guru,nip,' . $guru->id,
            'nama_guru' => 'required|string|max:100',
            'mapel' => 'nullable|string|max:50',
            'no_hp' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'nullable|string',
        ]);

        $guru->update($request->all());

        return redirect()->route('admin.guru.index')
                         ->with('success', 'Data guru berhasil diperbarui.');
    }

    public function destroy(Guru $guru)
    {
        $guru->delete();

        return redirect()->route('admin.guru.index')
                         ->with('success', 'Data guru berhasil dihapus.');
    }
}