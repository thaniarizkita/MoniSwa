@extends('layouts.app')

@section('title', 'Data Prestasi')
@section('page-title', 'Data Prestasi')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span><i class="bi bi-trophy me-2"></i>Daftar Prestasi</span>
        <a href="{{ route('guru.prestasi.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i>Tambah Prestasi
        </a>
    </div>
    <div class="card-body">
        <form method="GET" action="{{ route('guru.prestasi.index') }}" class="mb-4">
            <div class="row g-3">
                <div class="col-md-9">
                    <input type="text" name="search" class="form-control" placeholder="Cari siswa..." value="{{ request('search') }}">
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-search me-1"></i>Cari
                    </button>
                </div>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Siswa</th>
                        <th>Kelas</th>
                        <th>Jenis Prestasi</th>
                        <th>Nama Kegiatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($prestasi as $index => $p)
                    <tr>
                        <td>{{ $prestasi->firstItem() + $index }}</td>
                        <td>{{ $p->tanggal->format('d/m/Y') }}</td>
                        <td>{{ $p->siswa->nama_siswa }}</td>
                        <td><span class="badge bg-info">{{ $p->siswa->kelas->nama_kelas }}</span></td>
                        <td>
                            {{ $p->jenisPrestasi->nama_prestasi }}
                            <br><small class="badge bg-success">{{ ucfirst($p->jenisPrestasi->tingkat) }}</small>
                        </td>
                        <td>{{ $p->nama_kegiatan }}</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('guru.prestasi.show', $p->id) }}" class="btn btn-info" title="Detail">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('guru.prestasi.edit', $p->id) }}" class="btn btn-warning" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('guru.prestasi.destroy', $p->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" title="Hapus">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-4 text-muted">Belum ada data prestasi</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $prestasi->links() }}
        </div>
    </div>
</div>
@endsection