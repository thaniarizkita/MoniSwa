@extends('layouts.app')

@section('title', 'Detail Kelas')
@section('page-title', 'Detail Kelas ' . $kela->nama_kelas)

@section('content')
<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-info-circle me-2"></i>Informasi Kelas
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <th width="40%">Nama Kelas</th>
                        <td>: {{ $kela->nama_kelas }}</td>
                    </tr>
                    <tr>
                        <th>Tingkat</th>
                        <td>: <span class="badge bg-info">{{ $kela->tingkat }}</span></td>
                    </tr>
                    <tr>
                        <th>Jurusan</th>
                        <td>: {{ $kela->jurusan ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah Siswa</th>
                        <td>: <strong>{{ $kela->siswa->count() }} Siswa</strong></td>
                    </tr>
                </table>
                <div class="d-flex gap-2 mt-3">
                    <a href="{{ route('admin.kelas.edit', $kela->id) }}" class="btn btn-warning btn-sm">
                        <i class="bi bi-pencil me-1"></i>Edit
                    </a>
                    <a href="{{ route('admin.kelas.index') }}" class="btn btn-secondary btn-sm">
                        <i class="bi bi-arrow-left me-1"></i>Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-8 mb-4">
        <div class="card">
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
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($kela->siswa as $index => $siswa)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $siswa->nis }}</td>
                                <td>
                                    <a href="{{ route('admin.siswa.show', $siswa->id) }}" class="text-decoration-none">
                                        {{ $siswa->nama_siswa }}
                                    </a>
                                </td>
                                <td>{{ $siswa->jenis_kelamin }}</td>
                                <td>
                                    <span class="badge bg-success">{{ $siswa->prestasi->count() }}</span>
                                </td>
                                <td>
                                    <span class="badge bg-danger">{{ $siswa->pelanggaran->count() }}</span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center py-3 text-muted">Belum ada siswa di kelas ini</td>
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