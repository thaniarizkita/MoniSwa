<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\WaliMurid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with(['siswa', 'guru', 'waliMurid'])->latest()->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $siswa = Siswa::doesntHave('user')->orderBy('nama_siswa')->get();
        $guru = Guru::doesntHave('user')->orderBy('nama_guru')->get();
        $waliMurid = WaliMurid::doesntHave('user')->orderBy('nama_wali')->get();
        
        return view('admin.users.create', compact('siswa', 'guru', 'waliMurid'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6',
            'role' => 'required|in:admin,guru,siswa,wali',
            'relasi_id' => 'nullable|integer',
        ]);

        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'relasi_id' => $request->relasi_id,
        ]);

        return redirect()->route('admin.users.index')
                         ->with('success', 'Akun pengguna berhasil ditambahkan.');
    }

    public function edit(User $user)
    {
        $siswa = Siswa::doesntHave('user')->orWhere('id', $user->relasi_id)->orderBy('nama_siswa')->get();
        $guru = Guru::doesntHave('user')->orWhere('id', $user->relasi_id)->orderBy('nama_guru')->get();
        $waliMurid = WaliMurid::doesntHave('user')->orWhere('id', $user->relasi_id)->orderBy('nama_wali')->get();
        
        return view('admin.users.edit', compact('user', 'siswa', 'guru', 'waliMurid'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'password' => 'nullable|string|min:6',
            'role' => 'required|in:admin,guru,siswa,wali',
            'relasi_id' => 'nullable|integer',
        ]);

        $data = [
            'username' => $request->username,
            'role' => $request->role,
            'relasi_id' => $request->relasi_id,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('admin.users.index')
                         ->with('success', 'Akun pengguna berhasil diperbarui.');
    }

    public function destroy(User $user)
    {
        if ($user->role == 'admin' && User::where('role', 'admin')->count() <= 1) {
            return back()->with('error', 'Tidak dapat menghapus admin terakhir.');
        }

        $user->delete();

        return redirect()->route('admin.users.index')
                         ->with('success', 'Akun pengguna berhasil dihapus.');
    }
}