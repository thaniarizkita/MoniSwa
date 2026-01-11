<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WaliMurid;
use App\Models\Siswa;
use Illuminate\Http\Request;

class WaliMuridController extends Controller
{
    public function index()
    {
        $waliMurid = WaliMurid::with('siswa')->latest()->paginate(10);
        return view('admin.wali-murid.index', compact('waliMurid'));
    }

    public function create()
    {
        $siswa = Siswa::orderBy('nama_siswa')->get();
        return view('admin.wali-murid.create', compact('siswa'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_wali' => 'required|string|max:100',
            'id_siswa' => 'required|exists:siswa,id',
            'no_hp' => 'required|string|max:15',
            'alamat' => 'required|string',
            'hubungan' => 'required|string|max:20',
        ]);

        WaliMurid::create($request->all());

        return redirect()->route('admin.wali-murid.index')
                         ->with('success', 'Data wali murid berhasil ditambahkan.');
    }

    public function show(WaliMurid $waliMurid)
    {
        $waliMurid->load('siswa.kelas');
        return view('admin.wali-murid.show', compact('waliMurid'));
    }

    public function edit(WaliMurid $waliMurid)
    {
        $siswa = Siswa::orderBy('nama_siswa')->get();
        return view('admin.wali-murid.edit', compact('waliMurid', 'siswa'));
    }

    public function update(Request $request, WaliMurid $waliMurid)
    {
        $request->validate([
            'nama_wali' => 'required|string|max:100',
            'id_siswa' => 'required|exists:siswa,id',
            'no_hp' => 'required|string|max:15',
            'alamat' => 'required|string',
            'hubungan' => 'required|string|max:20',
        ]);

        $waliMurid->update($request->all());

        return redirect()->route('admin.wali-murid.index')
                         ->with('success', 'Data wali murid berhasil diperbarui.');
    }

    public function destroy(WaliMurid $waliMurid)
    {
        $waliMurid->delete();

        return redirect()->route('admin.wali-murid.index')
                         ->with('success', 'Data wali murid berhasil dihapus.');
    }
}