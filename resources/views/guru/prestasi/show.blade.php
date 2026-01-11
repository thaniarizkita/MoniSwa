@extends('layouts.app')

@section('title', 'Detail Prestasi')
@section('page-title', 'Detail Prestasi')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span><i class="bi bi-trophy me-2"></i>Detail Prestasi</span>
        <div>
            <a href="{{ route('guru.prestasi.edit', $prestasi->id) }}" class="btn btn-warning btn-sm">
                <i class="bi bi-pencil me-1"></i>Edit
            </a>
            <a href="{{ route('guru.prestasi.index') }}" class="btn btn-secondary btn-sm">
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
                        <td>: {{ $prestasi->siswa->nama_siswa }}</td>
                    </tr>
                    <tr>
                        <th>NIS</th>
                        <td>: {{ $prestasi->siswa->nis }}</td>
                    </tr>
                    <tr>
                        <th>Kelas</th>
                        <td>: {{ $prestasi->siswa->kelas->nama_kelas }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Prestasi</th>
                        <td>: {{ $prestasi->jenisPrestasi->nama_prestasi }}</td>
                    </tr>
                    <tr>
                        <th>Tingkat</th>
                        <td>: <span class="badge bg-success">{{ ucfirst($prestasi->jenisPrestasi->tingkat) }}</span></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <table class="table table-borderless">
                    <tr>
                        <th width="40%">Nama Kegiatan</th>
                        <td>: {{ $prestasi->nama_kegiatan }}</td>
                    </tr>
                    <tr>
                        <th>Peringkat</th>
                        <td>: {{ $prestasi->peringkat ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <td>: {{ $prestasi->tanggal->format('d F Y') }}</td>
                    </tr>
                    <tr>
                        <th>Diinput oleh</th>
                        <td>: {{ $prestasi->guru->nama_guru ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Sertifikat</th>
                        <td>: 
                            @if($prestasi->sertifikat)
                            <a href="{{ asset($prestasi->sertifikat) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-file-earmark-pdf"></i> Lihat Sertifikat
                            </a>
                            @else
                            -
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        
        @if($prestasi->keterangan)
        <hr>
        <div>
            <strong>Keterangan:</strong>
            <p>{{ $prestasi->keterangan }}</p>
        </div>
        @endif
    </div>
</div>
@endsection