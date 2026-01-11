@extends('layouts.app')

@section('title', 'Data Wali Murid')
@section('page-title', 'Data Wali Murid')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span><i class="bi bi-person-hearts me-2"></i>Daftar Wali Murid</span>
        <a href="{{ route('admin.wali-murid.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i>Tambah Wali Murid
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Wali</th>
                        <th>Siswa</th>
                        <th>Hubungan</th>
                        <th>No. HP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($waliMurid as $index => $wali)
                    <tr>
                        <td>{{ $waliMurid->firstItem() + $index }}</td>
                        <td><strong>{{ $wali->nama_wali }}</strong></td>
                        <td>{{ $wali->siswa->nama_siswa }} ({{ $wali->siswa->nis }})</td>
                        <td>{{ $wali->hubungan }}</td>
                        <td>{{ $wali->no_hp }}</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('admin.wali-murid.show', $wali->id) }}" class="btn btn-info" title="Detail">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('admin.wali-murid.edit', $wali->id) }}" class="btn btn-warning" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.wali-murid.destroy', $wali->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus wali murid ini?')">
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
                        <td colspan="6" class="text-center py-4 text-muted">Belum ada data wali murid</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            {{ $waliMurid->links() }}
        </div>
    </div>
</div>
@endsection