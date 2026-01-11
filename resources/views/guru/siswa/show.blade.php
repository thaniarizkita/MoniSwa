@extends('layouts.app')

@section('title', 'Detail Siswa')
@section('page-title', 'Detail Siswa')

@section('content')
<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-body text-center">
                @if($siswa->foto)
                <img src="{{ asset($siswa->foto) }}" class="rounded-circle mb-3" width="150" height="150" alt="">
                @else
                <div class="rounded-circle bg-primary text-white mb-3 mx-auto d-flex align-items-center justify-content-center" style="width: 150px; height: 150px; font-size: 3rem;">
                    {{ substr($siswa->nama_siswa, 0, 1) }}
                </div>
                @endif
                <h4 class="fw-bold">{{ $siswa->nama_siswa }}</h4>
                <p class="text-muted mb-2">{{ $siswa->nis }}</p>
                <span class="badge bg-info mb-3">{{ $siswa->kelas->nama_kelas }}</span>

                <hr>

                <div class="d-grid gap-2">
                    <a href="{{ route('guru.siswa.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left me-1"></i>Kembali
                    </a>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-body text-center">
                <h6 class="text-muted mb-2">Total Poin Pelanggaran</h6>
                <h2 class="fw-bold text-danger mb-0">{{ $totalPoin }}</h2>
                <small class="text-muted">Poin</small>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card mb-4">
            <div class="card-header">
                <i class="bi bi-person-vcard me-2"></i>Informasi Pribadi
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-borderless table-sm">
                            <tr>
                                <th width="40%">NIS</th>
                                <td>: {{ $siswa->nis }}</td>
                            </tr>
                            <tr>
                                <th>Nama Lengkap</th>
                                <td>: {{ $siswa->nama_siswa }}</td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td>: {{ $siswa->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                            </tr>
                            <tr>
                                <th>Tempat Lahir</th>
                                <td>: {{ $siswa->tempat_lahir }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Lahlanjutkan hingga selesai11 Janir</th>
<td>: {{ $siswa->tanggal_lahir->format('d F Y') }}</td>
</tr>
</table>
</div>
<div class="col-md-6">
<table class="table table-borderless table-sm">
<tr>
<th width="40%">Kelas</th>
<td>: {{ $siswa->kelas->nama_kelas }}</td>
</tr>
<tr>
<th>Agama</th>
<td>: {{ $siswa->agama }}</td>
</tr>
<tr>
<th>No. HP</th>
<td>: {{ $siswa->no_hp ?? '-' }}</td>
</tr>
<tr>
<th>Alamat</th>
<td>: {{ $siswa->alamat }}</td>
</tr>
</table>
</div>
</div>
</div>
</div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="bi bi-trophy me-2"></i>Riwayat Prestasi ({{ $siswa->prestasi->count() }})
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
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($siswa->prestasi as $index => $p)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $p->tanggal->format('d/m/Y') }}</td>
                            <td>{{ $p->jenisPrestasi->nama_prestasi }}</td>
                            <td>{{ $p->nama_kegiatan }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">Belum ada prestasi</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <i class="bi bi-exclamation-triangle me-2"></i>Riwayat Pelanggaran ({{ $siswa->pelanggaran->count() }})
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
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($siswa->pelanggaran as $index => $p)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $p->tanggal->format('d/m/Y') }}</td>
                            <td>{{ $p->jenisPelanggaran->nama_pelanggaran }}</td>
                            <td><span class="badge bg-danger">{{ $p->jenisPelanggaran->poin }}</span></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">Belum ada pelanggaran</td>
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