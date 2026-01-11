@extends('layouts.app')

@section('title', 'Data Siswa')
@section('page-title', 'Data Siswa')

@section('content')
<div class="card">
    <div class="card-header">
        <i class="bi bi-people me-2"></i>Daftar Siswa
    </div>
    <div class="card-body">
        <form method="GET" action="{{ route('guru.siswa.index') }}" class="mb-4">
            <div class="row g-3">
                <div class="col-md-5">
                    <input type="text" name="search" class="form-control" placeholder="Cari NIS atau Nama..." value="{{ request('search') }}">
                </div>
                <div class="col-md-4">
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
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Prestasi</th>
                        <th>Pelanggaran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($siswa as $index => $s)
                    <tr>
                        <td>{{ $siswa->firstItem() + $index }}</td>
                        <td>{{ $s->nis }}</td>
                        <td><strong>{{ $s->nama_siswa }}</strong></td>
                        <td><span class="badge bg-info">{{ $s->kelas->nama_kelas }}</span></td>
                        <td><span class="badge bg-success">{{ $s->prestasi->count() }}</span></td>
                        <td><span class="badge bg-danger">{{ $s->pelanggaran->count() }}</span></td>
                        <td>
                            <a href="{{ route('guru.siswa.show', $s->id) }}" class="btn btn-sm btn-info">
                                <i class="bi bi-eye"></i> Detail
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-4 text-muted">Belum ada data siswa</td>
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