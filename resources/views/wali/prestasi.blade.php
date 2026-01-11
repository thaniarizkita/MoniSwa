@extends('layouts.app')

@section('title', 'Prestasi Anak')
@section('page-title', 'Prestasi Anak')

@section('content')
<div class="card">
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
                        <th>Tingkat</th>
                        <th>Nama Kegiatan</th>
                        <th>Peringkat</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($prestasi as $index => $p)
                    <tr>
                        <td>{{ $prestasi->firstItem() + $index }}</td>
                        <td>{{ $p->tanggal->format('d/m/Y') }}</td>
                        <td>{{ $p->jenisPrestasi->nama_prestasi }}</td>
                        <td><span class="badge bg-success">{{ ucfirst($p->jenisPrestasi->tingkat) }}</span></td>
                        <td>{{ $p->nama_kegiatan }}</td>
                        <td>{{ $p->peringkat ?? '-' }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-muted">Belum ada prestasi</td>
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