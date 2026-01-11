@extends('layouts.app')

@section('title', 'Detail Pelanggaran')
@section('page-title', 'Detail Pelanggaran')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span><i class="bi bi-exclamation-triangle me-2"></i>Detail Pelanggaran</span>
        <div>
            <a href="{{ route('guru.pelanggaran.edit', $pelanggaran->id) }}" class="btn btn-warning btn-sm">
                <i class="bi bi-pencil me-1"></i>Edit
            </a>
            <a href="{{ route('guru.pelanggaran.index') }}" class="btn btn-secondary btn-sm">
                <i class="bi bi-arrow-left me-1"></i>Kembali
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <table class="table table-borderless">
                    <tr>
                        <th width="40%">Siswa</th>
                        <td>: {{ $pelanggaran->siswa->nama_siswa }}</td>
                    </tr>
                    <tr>
                        <th>NIS</th>
                        <td>: {{ $pelanggaran->siswa->nis }}</td>
                    </tr>
                    <tr>
                        <th>Kelas</th>
                        <td>: {{ $pelanggaran->siswa->kelas->nama_kelas }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Pelanggaran</th>
                        <td>: {{ $pelanggaran->jenisPelanggaran->nama_pelanggaran }}</td>
                    </tr>
                    <tr>
                        <th>Kategori</th>
                        <td>: <span class="badge bg-warning">{{ ucfirst($pelanggaran->jenisPelanggaran->kategori) }}</span></td>
                    </tr>
                    <tr>
                        <th>Poin</th>
                        <td>: <span class="badge bg-danger">{{ $pelanggaran->jenisPelanggaran->poin }}</span></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <table class="table table-borderless">
                    <tr>
                        <th width="40%">Tanggal</th>
                        <td>: {{ $pelanggaran->tanggal->format('d F Y') }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>: 
                            @if($pelanggaran->status == 'selesai')
                            <span class="badge bg-success">Selesai</span>
                            @elseif($pelanggaran->status == 'dalam_proses')
                            <span class="badge bg-warning">Dalam Proses</span>
                            @else
                            <span class="badge bg-secondary">Belum Ditindak</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Diinput oleh</th>
                        <td>: {{ $pelanggaran->guru->nama_guru ?? '-' }}</td>
                    </tr>
                </table>
            </div>
        </div>
        
        <hr>
        
        <div class="mb-3">
            <strong>Keterangan:</strong>
            <p>{{ $pelanggaran->keterangan ?? '-' }}</p>
        </div>
        
        @if($pelanggaran->tindakan)
        <div>
            <strong>Tindakan yang Diambil:</strong>
            <p>{{ $pelanggaran->tindakan }}</p>
        </div>
        @endif
    </div>
</div>
@endsection