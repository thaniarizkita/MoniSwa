@extends('layouts.app')

@section('title', 'Dashboard Wali Murid')
@section('page-title', 'Dashboard Wali Murid')

@section('content')
<div class="alert alert-info mb-4">
    <i class="bi bi-info-circle me-2"></i>
    <strong>Anda adalah wali dari:</strong> {{ $siswa->nama_siswa }} ({{ $siswa->nis }}) - {{ $siswa->kelas->nama_kelas }}
</div>

<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card stats-card border-start border-success border-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-1">Total Prestasi</h6>
                        <h2 class="mb-0 fw-bold">{{ $total_prestasi }}</h2>
                    </div>
                    <div class="text-success">
                        <i class="bi bi-trophy-fill" style="font-size: 2.5rem; opacity: 0.3;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card stats-card border-start border-danger border-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-1">Total Pelanggaran</h6>
                        <h2 class="mb-0 fw-bold">{{ $total_pelanggaran }}</h2>
                    </div>
                    <div class="text-danger">
                        <i class="bi bi-exclamation-triangle-fill" style="font-size: 2.5rem; opacity: 0.3;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card stats-card border-start border-warning border-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-1">Total Poin</h6>
                        <h2 class="mb-0 fw-bold text-danger">{{ $total_poin }}</h2>
                    </div>
                    <div class="text-warning">
                        <i class="bi bi-clipboard-data-fill" style="font-size: 2.5rem; opacity: 0.3;"></i>
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
                <a href="{{ route('wali.prestasi') }}" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <tbody>
                            @forelse($prestasi_terbaru as $prestasi)
                            <tr>
                                <td>
                                    <div class="fw-bold">{{ $prestasi->jenisPrestasi->nama_prestasi }}</div>
                                    <small class="text-muted">{{ $prestasi->nama_kegiatan }}</small>
                                    <div><small class="badge bg-success">{{ $prestasi->tanggal->format('d M Y') }}</small></div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center py-3 text-muted">Belum ada prestasi</td>
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
                <a href="{{ route('wali.pelanggaran') }}" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <tbody>
                            @forelse($pelanggaran_terbaru as $pelanggaran)
                            <tr>
                                <td>
                                    <div class="fw-bold">{{ $pelanggaran->jenisPelanggaran->nama_pelanggaran }}</div>
                                    <small class="text-muted">{{ $pelanggaran->keterangan ?? '-' }}</small>
                                    <div>
                                        <small class="badge bg-danger">{{ $pelanggaran->jenisPelanggaran->poin }} Poin</small>
                                        <small class="badge bg-secondary">{{ $pelanggaran->tanggal->format('d M Y') }}</small>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center py-3 text-muted">Belum ada pelanggaran</td>
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