@extends('layouts.app')

@section('title', 'Data Pelanggaran')
@section('page-title', 'Data Pelanggaran')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span><i class="bi bi-exclamation-triangle me-2"></i>Daftar Pelanggaran</span>
        <a href="{{ route('guru.pelanggaran.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i>Tambah Pelanggaran
        </a>
    </div>
    <div class="card-body">
        <form method="GET" action="{{ route('guru.pelanggaran.index') }}" class="mb-4">
            <div class="row g-3">
                <div class="col-md-6">
                    <input type="text" name="search" class="form-control" placeholder="Cari siswa..." value="{{ request('search') }}">
                </div>
                <div class="col-md-3">
                    <select name="status" class="form-select">
                        <option value="">-- Semua Status --</option>
                        <option value="belum_ditindak" {{ request('status') == 'belum_ditindak' ? 'selected' : '' }}>Belum Ditindak</option>
                        <option value="dalam_proses" {{ request('status') == 'dalam_proses' ? 'selected' : '' }}>Dalam Proses</option>
                        <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-search me-1"></i>Filter
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
                        <th>Jenis Pelanggaran</th>
                        <th>Poin</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pelanggaran as $index => $p)
                    <tr>
                        <td>{{ $pelanggaran->firstItem() + $index }}</td>
                        <td>{{ $p->tanggal->format('d/m/Y') }}</td>
                        <td>{{ $p->siswa->nama_siswa }}</td>
                        <td><span class="badge bg-info">{{ $p->siswa->kelas->nama_kelas }}</span></td>
                        <td>
                            {{ $p->jenisPelanggaran->nama_pelanggaran }}
                            <br><small class="badge bg-warning">{{ ucfirst($p->jenisPelanggaran->kategori) }}</small>
                        </td>
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
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('guru.pelanggaran.show', $p->id) }}" class="btn btn-info" title="Detail">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('guru.pelanggaran.edit', $p->id) }}" class="btn btn-warning" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('guru.pelanggaran.destroy', $p->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
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
                        <td colspan="8" class="text-center py-4 text-muted">Belum ada data pelanggaran</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $pelanggaran->links() }}
        </div>
    </div>
</div>
@endsection