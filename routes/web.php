<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Admin\WaliMuridController;
use App\Http\Controllers\Admin\JenisPrestasiController;
use App\Http\Controllers\Admin\JenisPelanggaranController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Guru\DashboardController as GuruDashboard;
use App\Http\Controllers\Guru\PrestasiController as GuruPrestasi;
use App\Http\Controllers\Guru\PelanggaranController as GuruPelanggaran;
use App\Http\Controllers\Guru\LaporanController as GuruLaporan;
use App\Http\Controllers\Siswa\DashboardController as SiswaDashboard;
use App\Http\Controllers\Wali\DashboardController as WaliDashboard;

// Redirect root ke login
Route::get('/', function () {
    return redirect('/login');
});

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('dashboard');
    
    // Kelas
    Route::resource('kelas', KelasController::class);
    
    // Siswa
    Route::resource('siswa', SiswaController::class);
    
    // Guru
    Route::resource('guru', GuruController::class);
    
    // Wali Murid
    Route::resource('wali-murid', WaliMuridController::class);
    
    // Jenis Prestasi
    Route::resource('jenis-prestasi', JenisPrestasiController::class);
    
    // Jenis Pelanggaran
    Route::resource('jenis-pelanggaran', JenisPelanggaranController::class);
    
    // User Management
    Route::resource('users', UserController::class);
});

// Guru Routes
Route::middleware(['auth', 'role:guru'])->prefix('guru')->name('guru.')->group(function () {
    Route::get('/dashboard', [GuruDashboard::class, 'index'])->name('dashboard');
    
    // Prestasi
    Route::resource('prestasi', GuruPrestasi::class);
    
    // Pelanggaran
    Route::resource('pelanggaran', GuruPelanggaran::class);
    
    // Biodata Siswa (Read Only)
    Route::get('/siswa', [GuruDashboard::class, 'siswa'])->name('siswa.index');
    Route::get('/siswa/{id}', [GuruDashboard::class, 'siswaDetail'])->name('siswa.show');
    
    // Laporan
    Route::get('/laporan', [GuruLaporan::class, 'index'])->name('laporan.index');
    Route::get('/laporan/siswa/{id}', [GuruLaporan::class, 'laporanSiswa'])->name('laporan.siswa');
    Route::get('/laporan/kelas/{id}', [GuruLaporan::class, 'laporanKelas'])->name('laporan.kelas');
    Route::get('/laporan/cetak-siswa/{id}', [GuruLaporan::class, 'cetakSiswa'])->name('laporan.cetak-siswa');
    Route::get('/laporan/cetak-kelas/{id}', [GuruLaporan::class, 'cetakKelas'])->name('laporan.cetak-kelas');
});

// Siswa Routes
Route::middleware(['auth', 'role:siswa'])->prefix('siswa')->name('siswa.')->group(function () {
    Route::get('/dashboard', [SiswaDashboard::class, 'index'])->name('dashboard');
    Route::get('/biodata', [SiswaDashboard::class, 'biodata'])->name('biodata');
    Route::get('/prestasi', [SiswaDashboard::class, 'prestasi'])->name('prestasi');
    Route::get('/pelanggaran', [SiswaDashboard::class, 'pelanggaran'])->name('pelanggaran');
});

// Wali Murid Routes
Route::middleware(['auth', 'role:wali'])->prefix('wali')->name('wali.')->group(function () {
    Route::get('/dashboard', [WaliDashboard::class, 'index'])->name('dashboard');
    Route::get('/biodata-anak', [WaliDashboard::class, 'biodata'])->name('biodata');
    Route::get('/prestasi-anak', [WaliDashboard::class, 'prestasi'])->name('prestasi');
    Route::get('/pelanggaran-anak', [WaliDashboard::class, 'pelanggaran'])->name('pelanggaran');
});