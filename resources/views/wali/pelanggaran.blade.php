@extends('layouts.app')

@section('title', 'Pelanggaran Anak')
@section('page-title', 'Pelanggaran Anak')

@section('content')
<div class="card mb-4">
    <div class="card-body text-center">
        <h6 class="text-muted mb-2">Total Poin Pelanggaran</h6>
        <h2 class="fw-bold text-danger mb-0">{{ $totalPoin }}</h2>
        <small class="text-muted">Poin</small>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <i class="bi bi-exclamation-triangle me-2"></i>Daftar Pelanggaran
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Jenis Pelanggaran</th>
                        <th>Kategori</th>
                        <th>Poin</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pelanggaran as $index => $p)
                    <tr>
                        <td>{{ $pelanggaran->firstItem() + $index }}</td>
                        <td>{{ $p->tanggal->format('d/m/Y') }}</td>
                        <td>{{ $p->jenisPelanggaran->nama_pelanggaran }}</td>
                        <td><span class="badge bg-warning">{{ ucfirst($p->jenisPelanggaran->kategori) }}</span></td>
                        <td><span class="badge bg-danger">{{ $p->jenisPelanggaran->poin }}</span></td>
<td>{{ $p->keterangan ?? '-' }}</td>
<td>
@if($p->status == 'selesai')
<span class="badge bg-success">Selesai</span>
@elseif($p->status == 'dalam_proses')
<span class="badge bg-warning">Proses</span>
@else
<span class="badge bg-secondary">Belum</span>
@endif
</td>
</tr>
@empty
<tr>
<td colspan="7" class="text-center py-4 text-muted">Belum ada pelanggaran</td>
</tr>
@endforelse
</tbody>
</table>
</div>    <div class="mt-3">
        {{ $pelanggaran->links() }}
    </div>
</div>
</div>
@endsection