@extends('layouts.app')

@section('title', 'Laporan Siswa')
@section('page-title', 'Laporan Siswa')

@section('content')
<div class="card mb-3">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span><i class="bi bi-file-earmark-person me-2"></i>Laporan: {{ $siswa->nama_siswa }}</span>
        <div>
            <a href="{{ route('guru.laporan.cetak-siswa', $siswa->id) }}" target="_blank" class="btn btn-danger btn-sm">
                <i class="bi bi-printer me-1"></i>Cetak PDF
            </a>
            <a href="{{ route('guru.laporan.index') }}" class="btn btn-secondary btn-sm">
                <i class="bi bi-arrow-left me-1"></i>Kembali
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-body text-center">
                @if($siswa->foto)
                <img src="{{ asset($siswa->foto) }}" class="rounded-circle mb-3" width="120" height="120" alt="">
                @else
                <div class="rounded-circle bg-primary text-white mb-3 mx-auto d-flex align-items-center justify-content-center" style="width: 120px; height: 120px; font-size: 2.5rem;">
                    {{ substr($siswa->nama_siswa, 0, 1) }}
                </div>
                @endif
                <h5 class="fw-bold">{{ $siswa->nama_siswa }}</h5>
                <p class="text-muted mb-2">{{ $siswa->nis }}</p>
                <span class="badge bg-info">{{ $siswa->kelas->nama_kelas }}</span>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-body">
                <h6 class="mb-3">Ringkasan</h6>
                <div class="d-flex justify-content-between mb-2">
                    <span>Total Prestasi:</span>
                    <strong class="text-success">{{ $siswa->prestasi->count() }}</strong>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span>Total Pelanggaran:</span>
                    <strong class="text-danger">{{ $siswa->pelanggaran->count() }}</strong>
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                    <span>Total Poin Pelanggaran:</span>
                    <strong class="text-danger fs-4">{{ $totalPoin }}</strong>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card mb-4">
            <div class="card-header">
                <i class="bi bi-trophy me-2"></i>Daftar Prestasi
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Jenis Prestasi</th>
                                <th>Nama Kegiatan</th>
                                <th>Peringkat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($siswa->prestasi as $index => $p)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $p->tanggal->format('d/m/Y') }}</td>
                                <td>{{ $p->jenisPrestasi->nama_prestasi }}</td>
                                <td>{{ $p->nama_kegiatan }}</td>
                                <td>{{ $p->peringkat ?? '-' }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">Belum ada prestasi</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <i class="bi bi-exclamation-triangle me-2"></i>Daftar Pelanggaran
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Jenis Pelanggaran</th>
                                <th>Poin</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($siswa->pelanggaran as $index => $p)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $p->tanggal->format('d/m/Y') }}</td>
                                <td>{{ $p->jenisPelanggaran->nama_pelanggaran }}</td>
                                <td><span class="badge bg-danger">{{ $p->jenisPelanggaran->poin }}</span></td>
                                <td>
                                    @if($p->status == 'selesai')
                                    <span class="badge bg-success">Selesai</span>
                                    @elseif($p->status == 'dalam_proses')
                                    <span class="badge bg-warning">Proses</span>
                                    @else
                                    <span class="badge bg-secondary">Belum</span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">Belum ada pelanggaran</td>
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