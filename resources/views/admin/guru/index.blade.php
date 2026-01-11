@extends('layouts.app')

@section('title', 'Data Guru')
@section('page-title', 'Data Guru')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span><i class="bi bi-person-badge me-2"></i>Daftar Guru</span>
        <a href="{{ route('admin.guru.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i>Tambah Guru
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIP</th>
                        <th>Nama Guru</th>
                        <th>Mata Pelajaran</th>
                        <th>JK</th>
                        <th>No. HP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($guru as $index => $g)
                    <tr>
                        <td>{{ $guru->firstItem() + $index }}</td>
                        <td>{{ $g->nip ?? '-' }}</td>
                        <td><strong>{{ $g->nama_guru }}</strong></td>
                        <td>{{ $g->mapel ?? '-' }}</td>
                        <td>{{ $g->jenis_kelamin }}</td>
                        <td>{{ $g->no_hp ?? '-' }}</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('admin.guru.show', $g->id) }}" class="btn btn-info" title="Detail">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('admin.guru.edit', $g->id) }}" class="btn btn-warning" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.guru.destroy', $g->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus guru ini?')">
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
                        <td colspan="7" class="text-center py-4 text-muted">Belum ada data guru</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            {{ $guru->links() }}
        </div>
    </div>
</div>
@endsection