@extends('layouts.app')

@section('title', 'Biodata Saya')
@section('page-title', 'Biodata Saya')

@section('content')
<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-body text-center">
                @if($siswa->foto)
                <img src="{{ asset($siswa->foto) }}" class="rounded-circle mb-3" width="150" height="150" alt="">
                @else
                <div class="rounded-circle bg-primary text-white mb-3 mx-auto d-flex align-items-center justify-content-center" style="width: 150px; height: 150px; font-size: 3rem;">
                    {{ substr($siswa->nama_siswa, 0, 1) }}
                </div>
                @endif
                <h4 class="fw-bold">{{ $siswa->nama_siswa }}</h4>
                <p class="text-muted mb-2">{{ $siswa->nis }}</p>
                <span class="badge bg-info mb-3">{{ $siswa->kelas->nama_kelas }}</span>
                
                @if($siswa->status == 'aktif')
                <span class="badge bg-success">Aktif</span>
                @elseif($siswa->status == 'lulus')
                <span class="badge bg-primary">Lulus</span>
                @else
                <span class="badge bg-secondary">Non-Aktif</span>
                @endif
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card mb-4">
            <div class="card-header">
                <i class="bi bi-person-vcard me-2"></i>Informasi Pribadi
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-borderless table-sm">
                            <tr>
                                <th width="40%">NIS</th>
                                <td>: {{ $siswa->nis }}</td>
                            </tr>
                            <tr>
                                <th>Nama Lengkap</th>
                                <td>: {{ $siswa->nama_siswa }}</td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td>: {{ $siswa->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                            </tr>
                            <tr>
                                <th>Tempat Lahir</th>
                                <td>: {{ $siswa->tempat_lahir }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Lahir</th>
                                <td>: {{ $siswa->tanggal_lahir->format('d F Y') }}</td>
                            </tr>
                            <tr>
                                <th>Agama</th>
                                <td>: {{ $siswa->agama }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-borderless table-sm">
                            <tr>
                                <th width="40%">Kelas</th>
                                <td>: {{ $siswa->kelas->nama_kelas }}</td>
                            </tr>
                            <tr>
                                <th>No. HP</th>
                                <td>: {{ $siswa->no_hp ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>: {{ $siswa->email ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>: {{ $siswa->alamat }}</td>
                            </tr>
                            <tr>
                                <th>Nama Ayah</th>
                                <td>: {{ $siswa->nama_ayah }}</td>
                            </tr>
                            <tr>
                                <th>Nama Ibu</th>
                                <td>: {{ $siswa->nama_ibu }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @if($siswa->waliMurid->count() > 0)
        <div class="card">
            <div class="card-header">
                <i class="bi bi-person-hearts me-2"></i>Data Wali Murid
            </div>
            <div class="card-body">
                @foreach($siswa->waliMurid as $wali)
                <div class="border-bottom pb-3 mb-3">
                    <h6 class="fw-bold">{{ $wali->nama_wali }}</h6>
                    <p class="mb-1"><small class="text-muted">Hubungan:</small> {{ $wali->hubungan }}</p>
                    <p class="mb-1"><small class="text-muted">No. HP:</small> {{ $wali->no_hp }}</p>
                    <p class="mb-0"><small class="text-muted">Alamat:</small> {{ $wali->alamat }}</p>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>
@endsection