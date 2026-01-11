@extends('layouts.app')

@section('title', 'Dashboard Admin')
@section('page-title', 'Dashboard Admin')

@section('content')
<div class="row">
    <!-- Stats Cards -->
    <div class="col-md-4 mb-4">
        <div class="card stats-card border-start border-primary border-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-1">Total Siswa</h6>
                        <h2 class="mb-0 fw-bold">{{ $total_siswa }}</h2>
                    </div>
                    <div class="text-primary">
                        <i class="bi bi-people-fill" style="font-size: 3rem; opacity: 0.3;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card stats-card border-start border-success border-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-1">Total Guru</h6>
                        <h2 class="mb-0 fw-bold">{{ $total_guru }}</h2>
                    </div>
                    <div class="text-success">
                        <i class="bi bi-person-badge-fill" style="font-size: 3rem; opacity: 0.3;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card stats-card border-start border-info border-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-1">Total Kelas</h6>
                        <h2 class="mb-0 fw-bold">{{ $total_kelas }}</h2>
                    </div>
                    <div class="text-info">
                        <i class="bi bi-door-open-fill" style="font-size: 3rem; opacity: 0.3;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 mb-4">
        <div class="card stats-card border-start border-warning border-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-1">Prestasi Bulan Ini</h6>
                        <h2 class="mb-0 fw-bold">{{ $prestasi_bulan_ini }}</h2>
                        <small class="text-muted">Total: {{ $total_prestasi }}</small>
                    </div>
                    <div class="text-warning">
                        <i class="bi bi-trophy-fill" style="font-size: 3rem; opacity: 0.3;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 mb-4">
        <div class="card stats-card border-start border-danger border-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-1">Pelanggaran Bulan Ini</h6>
                        <h2 class="mb-0 fw-bold">{{ $pelanggaran_bulan_ini }}</h2>
                        <small class="text-muted">Total: {{ $total_pelanggaran }}</small>
                    </div>
                    <div class="text-danger">
                        <i class="bi bi-exclamation-triangle-fill" style="font-size: 3rem; opacity: 0.3;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Siswa Terbaru -->
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span><i class="bi bi-person-plus me-2"></i>Siswa Terbaru</span>
                <a href="{{ route('admin.siswa.index') }}" class="btn btn-
                sm btn-outline-primary">Lihat Semua</a>
</div>
<div class="card-body p-0">
<div class="table-responsive">
<table class="table table-hover mb-0">
<tbody>
@forelse($siswa_terbaru as $siswa)
<tr>
<td>
<div class="d-flex align-items-center">
@if($siswa->foto)
<img src="{{ asset($siswa->foto) }}" class="rounded-circle me-2" width="40" height="40" alt="">
@else
<div class="rounded-circle bg-primary text-white me-2 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
{{ substr($siswa->nama_siswa, 0, 1) }}
</div>
@endif
<div>
<div class="fw-bold">{{ $siswa->nama_siswa }}</div>
<small class="text-muted">{{ $siswa->nis }} - {{ $siswa->kelas->nama_kelas }}</small>
</div>
</div>
</td>
</tr>
@empty
<tr>
<td class="text-center py-3 text-muted">Belum ada data</td>
</tr>
@endforelse
</tbody>
</table>
</div>
</div>
</div>
</div>
<!-- Prestasi Terbaru -->
<div class="col-md-6 mb-4">
    <div class="card">
        <div class="card-header">
            <i class="bi bi-trophy me-2"></i>Prestasi Terbaru
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <tbody>
                        @forelse($prestasi_terbaru as $prestasi)
                        <tr>
                            <td>
                                <div class="fw-bold">{{ $prestasi->siswa->nama_siswa }}</div>
                                <small class="text-muted">{{ $prestasi->jenisPrestasi->nama_prestasi }}</small>
                                <div><small class="badge bg-success">{{ $prestasi->tanggal->format('d M Y') }}</small></div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td class="text-center py-3 text-muted">Belum ada data</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
@endsection