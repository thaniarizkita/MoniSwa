@extends('layouts.app')

@section('title', 'Data Siswa')
@section('page-title', 'Data Siswa')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span><i class="bi bi-people me-2"></i>Daftar Siswa</span>
        <a href="{{ route('admin.siswa.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i>Tambah Siswa
        </a>
    </div>
    <div class="card-body">
        <!-- Filter & Search -->
        <form method="GET" action="{{ route('admin.siswa.index') }}" class="mb-4">
            <div class="row g-3">
                <div class="col-md-4">
                    <input type="text" name="search" class="form-control" placeholder="Cari NIS atau Nama..." value="{{ request('search') }}">
                </div>
                <div class="col-md-3">
                    <select name="kelas" class="form-select">
                        <option value="">-- Semua Kelas --</option>
                        @foreach($kelas as $k)
                        <option value="{{ $k->id }}" {{ request('kelas') == $k->id ? 'selected' : '' }}>
                            {{ $k->nama_kelas }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="status" class="form-select">
                        <option value="">-- Semua Status --</option>
                        <option value="aktif" {{ request('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="nonaktif" {{ request('status') == 'nonaktif' ? 'selected' : '' }}>Non-Aktif</option>
                        <option value="lulus" {{ request('status') == 'lulus' ? 'selected' : '' }}>Lulus</option>
                    </select>
                </div>
                <div class="col-md-2">
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
                        <th>Foto</th>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>JK</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($siswa as $index => $s)
                    <tr>
                        <td>{{ $siswa->firstItem() + $index }}</td>
                        <td>
                            @if($s->foto)
                            <img src="{{ asset($s->foto) }}" class="rounded-circle" width="40" height="40" alt="">
                            @else
                            <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                {{ substr($s->nama_siswa, 0, 1) }}
                            </div>
                            @endif
                        </td>
                        <td>{{ $s->nis }}</td>
                        <td><strong>{{ $s->nama_siswa }}</strong></td>
                        <td><span class="badge bg-info">{{ $s->kelas->nama_kelas }}</span></td>
                        <td>{{ $s->jenis_kelamin }}</td>
                        <td>
                            @if($s->status == 'aktif')
                            <span class="badge bg-success">Aktif</span>
                            @elseif($s->status == 'lulus')
                            <span class="badge bg-primary">Lulus</span>
                            @else
                            <span class="badge bg-secondary">Non-Aktif</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('admin.siswa.show', $s->id) }}" class="btn btn-info" title="Detail">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('admin.siswa.edit', $s->id) }}" class="btn btn-warning" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.siswa.destroy', $s->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus siswa ini?')">
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
                        <td colspan="8" class="text-center py-4 text-muted">Belum ada data siswa</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $siswa->links() }}
        </div>
    </div>
</div>
@endsection