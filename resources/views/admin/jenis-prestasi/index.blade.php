@extends('layouts.app')

@section('title', 'Jenis Prestasi')
@section('page-title', 'Jenis Prestasi')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span><i class="bi bi-trophy me-2"></i>Daftar Jenis Prestasi</span>
        <a href="{{ route('admin.jenis-prestasi.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i>Tambah Jenis Prestasi
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Prestasi</th>
                        <th>Tingkat</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($jenisPrestasi as $index => $jp)
                    <tr>
                        <td>{{ $jenisPrestasi->firstItem() + $index }}</td>
                        <td><strong>{{ $jp->nama_prestasi }}</strong></td>
                        <td>
                            <span class="badge 
                                @if($jp->tingkat == 'internasional') bg-danger
                                @elseif($jp->tingkat == 'nasional') bg-warning
                                @elseif($jp->tingkat == 'provinsi') bg-info
                                @else bg-success
                                @endif">
                                {{ ucfirst($jp->tingkat) }}
                            </span>
                        </td>
                        <td>{{ $jp->keterangan ?? '-' }}</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('admin.jenis-prestasi.edit', $jp->id) }}" class="btn btn-warning" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.jenis-prestasi.destroy', $jp->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus jenis prestasi ini?')">
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
                        <td colspan="5" class="text-center py-4 text-muted">Belum ada data jenis prestasi</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            {{ $jenisPrestasi->links() }}
        </div>
    </div>
</div>
@endsection