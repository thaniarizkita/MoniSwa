@extends('layouts.app')

@section('title', 'Tambah Jenis Prestasi')
@section('page-title', 'Tambah Jenis Prestasi')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-plus-circle me-2"></i>Form Tambah Jenis Prestasi
            </div>
            <div class="card-body">
                <form action="{{ route('admin.jenis-prestasi.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="nama_prestasi" class="form-label">Nama Prestasi <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nama_prestasi') is-invalid @enderror" 
                               id="nama_prestasi" name="nama_prestasi" value="{{ old('nama_prestasi') }}" 
                               placeholder="Contoh: Lomba Matematika" required>
                        @error('nama_prestasi')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tingkat" class="form-label">Tingkat <span class="text-danger">*</span></label>
                        <select class="form-select @error('tingkat') is-invalid @enderror" id="tingkat" name="tingkat" required>
                            <option value="">-- Pilih Tingkat --</option>
                            <option value="sekolah" {{ old('tingkat') == 'sekolah' ? 'selected' : '' }}>Sekolah</option>
                            <option value="kecamatan" {{ old('tingkat') == 'kecamatan' ? 'selected' : '' }}>Kecamatan</option>
                            <option value="kabupaten" {{ old('tingkat') == 'kabupaten' ? 'selected' : '' }}>Kabupaten</option>
                            <option value="provinsi" {{ old('tingkat') == 'provinsi' ? 'selected' : '' }}>Provinsi</option>
                            <option value="nasional" {{ old('tingkat') == 'nasional' ? 'selected' : '' }}>Nasional</option>
                            <option value="internasional" {{ old('tingkat') == 'internasional' ? 'selected' : '' }}>Internasional</option>
                        </select>
                        @error('tingkat')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea class="form-control @error('keterangan') is-invalid @enderror" 
                                  id="keterangan" name="keterangan" rows="3">{{ old('keterangan') }}</textarea>
                        @error('keterangan')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save me-1"></i>Simpan
                        </button>
                        <a href="{{ route('admin.jenis-prestasi.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left me-1"></i>Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection