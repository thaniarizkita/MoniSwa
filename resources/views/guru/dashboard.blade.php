@extends('layouts.app')

@section('title', 'Dashboard Guru')
@section('page-title', 'Dashboard Guru')

@section('content')
<div class="row">
    <div class="col-md-3 mb-4">
        <div class="card stats-card border-start border-primary border-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-1">Total Siswa</h6>
                        <h2 class="mb-0 fw-bold">{{ $total_siswa }}</h2>
                    </div>
                    <div class="text-primary">
                        <i class="bi bi-people-fill" style="font-size: 2.5rem; opacity: 0.3;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <div class="card stats-card border-start border-success border-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-1">Prestasi Saya</h6>
                        <h2 class="mb-0 fw-bold">{{ $total_prestasi }}</h2>
                    </div>
                    <div class="text-success">
                        <i class="bi bi-trophy-fill" style="font-size: 2.5rem; opacity: 0.3;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <div class="card stats-card border-start border-danger border-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-1">Pelanggaran Saya</h6>
                        <h2 class="mb-0 fw-bold">{{ $total_pelanggaran }}</h2>
                    </div>
                    <div class="text-danger">
                        <i class="bi bi-exclamation-triangle-fill" style="font-size: 2.5rem; opacity: 0.3;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <div class="card stats-card border-start border-warning border-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-1">Bulan Ini</h6>
                        <h2 class="mb-0 fw-bold">{{ $prestasi_bulan_ini + $pelanggaran_bulan_ini }}</h2>
                    </div>
                    <div class="text-warning">
                        <i class="bi bi-calendar-check-fill" style="font-size: 2.5rem; opacity: 0.3;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span><i class="bi bi-trophy me-2"></i>Prestasi Terbaru</span>
                <a href="{{ route('guru.prestasi.index') }}" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
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

    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span><i class="bi bi-exclamation-triangle me-2"></i>Pelanggaran Terbaru</span>
                <a href="{{ route('guru.pelanggaran.index') }}" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <tbody>
                            @forelse($pelanggaran_terbaru as $pelanggaran)
                            <tr>
                                <td>
                                    <div class="fw-bold">{{ $pelanggaran->siswa->nama_siswa }}</div>
                                    <small class="text-muted">{{ $pelanggaran->jenisPelanggaran->nama_pelanggaran }}</small>
                                    <div>
                                        <small class="badge bg-danger">{{ $pelanggaran->jenisPelanggaran->poin }} Poin</small>
                                        <small class="badge bg-secondary">{{ $pelanggaran->tanggal->format('d M Y') }}</small>
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
</div>
@endsection