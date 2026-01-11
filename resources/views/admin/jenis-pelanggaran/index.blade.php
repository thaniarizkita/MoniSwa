@extends('layouts.app')

@section('title', 'Jenis Pelanggaran')
@section('page-title', 'Jenis Pelanggaran')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span><i class="bi bi-exclamation-triangle me-2"></i>Daftar Jenis Pelanggaran</span>
        <a href="{{ route('admin.jenis-pelanggaran.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i>Tambah Jenis Pelanggaran
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pelanggaran</th>
                        <th>Kategori</th>
                        <th>Poin</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($jenisPelanggaran as $index => $jp)
                    <tr>
                        <td>{{ $jenisPelanggaran->firstItem() + $index }}</td>
                        <td><strong>{{ $jp->nama_pelanggaran }}</strong></td>
                        <td>
                            <span class="badge 
                                @if($jp->kategori == 'berat') bg-danger
                                @elseif($jp->kategori == 'sedang') bg-warning
                                @else bg-info
                                @endif">
                                {{ ucfirst($jp->kategori) }}
                            </span>
                        </td>
                        <td><span class="badge bg-danger">{{ $jp->poin }} Poin</span></td>
                        <td>{{ $jp->keterangan ?? '-' }}</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('admin.jenis-pelanggaran.edit', $jp->id) }}" class="btn btn-warning" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.jenis-pelanggaran.destroy', $jp->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus jenis pelanggaran ini?')">
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
                        <td colspan="6" class="text-center py-4 text-muted">Belum ada data jenis pelanggaran</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            {{ $jenisPelanggaran->links() }}
        </div>
    </div>
</div>
@endsection