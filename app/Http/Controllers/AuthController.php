<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Tampilkan form login dengan role selector
    public function showLogin()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'role' => 'required|in:admin,guru,siswa,wali', // Validasi role
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            
            // Cek apakah role yang dipilih sesuai dengan role user
            if ($user->role !== $request->role) {
                Auth::logout();
                return back()->withErrors([
                    'role' => 'Role yang Anda pilih tidak sesuai dengan akun ini.',
                ])->withInput();
            }

            $request->session()->regenerate();

            // Redirect berdasarkan role
            switch ($user->role) {
                case 'admin':
                    return redirect()->intended('/admin/dashboard');
                case 'guru':
                    return redirect()->intended('/guru/dashboard');
                case 'siswa':
                    return redirect()->intended('/siswa/dashboard');
                case 'wali':
                    return redirect()->intended('/wali/dashboard');
                default:
                    return redirect('/');
            }
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->withInput();
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}