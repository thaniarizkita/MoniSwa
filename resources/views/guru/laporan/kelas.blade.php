@extends('layouts.app')@section('title', 'Laporan Kelas')
@section('page-title', 'Laporan Kelas ' . $kelas->nama_kelas)@section('content')
<div class="card mb-3">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span><i class="bi bi-file-earmark-text me-2"></i>Laporan Kelas: {{ $kelas->nama_kelas }}</span>
        <div>
            <a href="{{ route('guru.laporan.cetak-kelas', $kelas->id) }}" target="_blank" class="btn btn-danger btn-sm">
                <i class="bi bi-printer me-1"></i>Cetak PDF
            </a>
            <a href="{{ route('guru.laporan.index') }}" class="btn btn-secondary btn-sm">
                <i class="bi bi-arrow-left me-1"></i>Kembali
            </a>
        </div>
    </div>
</div><div class="row mb-4">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body text-center">
                <h6 class="text-muted mb-2">Total Siswa</h6>
                <h2 class="fw-bold">{{ $kelas->siswa->count() }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body text-center">
                <h6 class="text-muted mb-2">Total Prestasi</h6>
                <h2 class="fw-bold text-success">{{ $kelas->siswa->sum(function($s) { return $s->prestasi->count(); }) }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body text-center">
                <h6 class="text-muted mb-2">Total Pelanggaran</h6>
                <h2 class="fw-bold text-danger">{{ $kelas->siswa->sum(function($s) { return $s->pelanggaran->count(); }) }}</h2>
            </div>
        </div>
    </div>
</div><div class="card">
    <div class="card-header">
        <i class="bi bi-people me-2"></i>Daftar Siswa
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>JK</th>
                        <th>Prestasi</th>
                        <th>Pelanggaran</th>
                        <th>Total Poin</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kelas->siswa as $index => $siswa)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $siswa->nis }}</td>
                        <td>{{ $siswa->nama_siswa }}</td>
                        <td>{{ $siswa->jenis_kelamin }}</td>
                        <td><span class="badge bg-success">{{ $siswa->prestasi->count() }}</span></td>
                        <td><span class="badge bg-danger">{{ $siswa->pelanggaran->count() }}</span></td>
                        <td><span class="badge bg-danger">{{ $siswa->totalPoinPelanggaran() }}</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection