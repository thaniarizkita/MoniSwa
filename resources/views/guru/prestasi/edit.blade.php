@extends('layouts.app')

@section('title', 'Edit Prestasi')
@section('page-title', 'Edit Prestasi')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-pencil me-2"></i>Form Edit Prestasi
            </div>
            <div class="card-body">
                <form action="{{ route('guru.prestasi.update', $prestasi->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="siswa_id" class="form-label">Siswa <span class="text-danger">*</span></label>
                        <select class="form-select @error('siswa_id') is-invalid @enderror" id="siswa_id" name="siswa_id" required>
                            <option value="">-- Pilih Siswa --</option>
                            @foreach($siswa as $s)
                            <option value="{{ $s->id }}" {{ old('siswa_id', $prestasi->siswa_id) == $s->id ? 'selected' : '' }}>
                                {{ $s->nama_siswa }} - {{ $s->kelas->nama_kelas }}
                            </option>
                            @endforeach
                        </select>
                        @error('siswa_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="jenis_prestasi_id" class="form-label">Jenis Prestasi <span class="text-danger">*</span></label>
                        <select class="form-select @error('jenis_prestasi_id') is-invalid @enderror" id="jenis_prestasi_id" name="jenis_prestasi_id" required>
                            <option value="">-- Pilih Jenis Prestasi --</option>
                            @foreach($jenisPrestasi as $jp)
                            <option value="{{ $jp->id }}" {{ old('jenis_prestasi_id', $prestasi->jenis_prestasi_id) == $jp->id ? 'selected' : '' }}>
                                {{ $jp->nama_prestasi }} ({{ ucfirst($jp->tingkat) }})
                            </option>
                            @endforeach
                        </select>
                        @error('jenis_prestasi_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="nama_kegiatan" class="form-label">Nama Kegiatan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nama_kegiatan') is-invalid @enderror" 
                               id="nama_kegiatan" name="nama_kegiatan" value="{{ old('nama_kegiatan', $prestasi->nama_kegiatan) }}" required>
                        @error('nama_kegiatan')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="peringkat" class="form-label">Peringkat</label>
                        <input type="text" class="form-control @error('peringkat') is-invalid @enderror" 
                               id="peringkat" name="peringkat" value="{{ old('peringkat', $prestasi->peringkat) }}">
                        @error('peringkat')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal <span class="text-danger">*</span></label>
                        <input type="date" class="form-control @error('tanggal') is-invalid @enderror" 
                               id="tanggal" name="tanggal" value="{{ old('tanggal', $prestasi->tanggal->format('Y-m-d')) }}" required>
                        @error('tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea class="form-control @error('keterangan') is-invalid @enderror" 
                                  id="keterangan" name="keterangan" rows="3">{{ old('keterangan', $prestasi->keterangan) }}</textarea>
                        @error('keterangan')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="sertifikat" class="form-label">Upload Sertifikat</label>
                        @if($prestasi->sertifikat)
                        <div class="mb-2">
                            <a href="{{ asset($prestasi->sertifikat) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-file-earmark-pdf"></i> Lihat Sertifikat
                            </a>
                        </div>
                        @endif
                        <input type="file" class="form-control @error('sertifikat') is-invalid @enderror" 
                               id="sertifikat" name="sertifikat" accept=".pdf,.jpg,.jpeg,.png">
                        <small class="text-muted">Kosongkan jika tidak ingin mengubah sertifikat</small>
                        @error('sertifikat')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save me-1"></i>Update
                        </button>
                        <a href="{{ route('guru.prestasi.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left me-1"></i>Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection