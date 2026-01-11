@extends('layouts.app')

@section('title', 'Detail Guru')
@section('page-title', 'Detail Guru')

@section('content')
<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-info-circle me-2"></i>Informasi Guru
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <th width="40%">NIP</th>
                        <td>: {{ $guru->nip ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>: {{ $guru->nama_guru }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>: {{ $guru->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                    </tr>
                    <tr>
                        <th>Mata Pelajaran</th>
                        <td>: {{ $guru->mapel ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>No. HP</th>
                        <td>: {{ $guru->no_hp ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>: {{ $guru->email ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>: {{ $guru->alamat ?? '-' }}</td>
                    </tr>
                </table>
                <div class="d-flex gap-2 mt-3">
                    <a href="{{ route('admin.guru.edit', $guru->id) }}" class="btn btn-warning btn-sm">
                        <i class="bi bi-pencil me-1"></i>Edit
                    </a>
                    <a href="{{ route('admin.guru.index') }}" class="btn btn-secondary btn-sm">
                        <i class="bi bi-arrow-left me-1"></i>Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card mb-4">
            <div class="card-header">
                <i class="bi bi-trophy me-2"></i>Prestasi yang Diinput ({{ $guru->prestasi->count() }})
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Siswa</th>
                                <th>Jenis Prestasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($guru->prestasi()->latest()->take(10)->get() as $index => $p)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $p->tanggal->format('d/m/Y') }}</td>
                                <td>{{ $p->siswa->nama_siswa }}</td>
                                <td>{{ $p->jenisPrestasi->nama_prestasi }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">Belum ada data</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <i class="bi bi-exclamation-triangle me-2"></i>Pelanggaran yang Diinput ({{ $guru->pelanggaran->count() }})
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Siswa</th>
                                <th>Jenis Pelanggaran</th>
                                <th>Poin</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($guru->pelanggaran()->latest()->take(10)->get() as $index => $p)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $p->tanggal->format('d/m/Y') }}</td>
                                <td>{{ $p->siswa->nama_siswa }}</td>
                                <td>{{ $p->jenisPelanggaran->nama_pelanggaran }}</td>
                                <td><span class="badge bg-danger">{{ $p->jenisPelanggaran->poin }}</span></td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">Belum ada data</td>
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