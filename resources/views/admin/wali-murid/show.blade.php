@extends('layouts.app')

@section('title', 'Detail Wali Murid')
@section('page-title', 'Detail Wali Murid')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-info-circle me-2"></i>Informasi Wali Murid
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <th width="40%">Nama Wali</th>
                        <td>: {{ $waliMurid->nama_wali }}</td>
                    </tr>
                    <tr>
                        <th>Hubungan</th>
                        <td>: {{ $waliMurid->hubungan }}</td>
                    </tr>
                    <tr>
                        <th>No. HP</th>
                        <td>: {{ $waliMurid->no_hp }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>: {{ $waliMurid->alamat }}</td>
                    </tr>
                </table>
                <div class="d-flex gap-2 mt-3">
                    <a href="{{ route('admin.wali-murid.edit', $waliMurid->id) }}" class="btn btn-warning btn-sm">
                        <i class="bi bi-pencil me-1"></i>Edit
                    </a>
                    <a href="{{ route('admin.wali-murid.index') }}" class="btn btn-secondary btn-sm">
                        <i class="bi bi-arrow-left me-1"></i>Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-person me-2"></i>Informasi Siswa
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <th width="40%">NIS</th>
                        <td>: {{ $waliMurid->siswa->nis }}</td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>: {{ $waliMurid->siswa->nama_siswa }}</td>
                    </tr>
                    <tr>
                        <th>Kelas</th>
                        <td>: {{ $waliMurid->siswa->kelas->nama_kelas }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>: 
                            @if($waliMurid->siswa->status == 'aktif')
                            <span class="badge bg-success">Aktif</span>
                            @elseif($waliMurid->siswa->status == 'lulus')
                            <span class="badge bg-primary">Lulus</span>
                            @else
                            <span class="badge bg-secondary">Non-Aktif</span>
                            @endif
                        </td>
                    </tr>
                </table>
                <a href="{{ route('admin.siswa.show', $waliMurid->siswa->id) }}" class="btn btn-info btn-sm">
                    <i class="bi bi-eye me-1"></i>Lihat Detail Siswa
                </a>
            </div>
        </div>
    </div>
</div>
@endsection