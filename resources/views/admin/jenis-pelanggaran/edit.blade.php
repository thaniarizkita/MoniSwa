@extends('layouts.app')

@section('title', 'Edit Jenis Pelanggaran')
@section('page-title', 'Edit Jenis Pelanggaran')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-pencil me-2"></i>Form Edit Jenis Pelanggaran
            </div>
            <div class="card-body">
                <form action="{{ route('admin.jenis-pelanggaran.update', $jenisPelanggaran->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="nama_pelanggaran" class="form-label">Nama Pelanggaran <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nama_pelanggaran') is-invalid @enderror" 
                               id="nama_pelanggaran" name="nama_pelanggaran" value="{{ old('nama_pelanggaran', $jenisPelanggaran->nama_pelanggaran) }}" required>
                        @error('nama_pelanggaran')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori <span class="text-danger">*</span></label>
                        <select class="form-select @error('kategori') is-invalid @enderror" id="kategori" name="kategori" required>
                            <option value="">-- Pilih Kategori --</option>
                            <option value="ringan" {{ old('kategori', $jenisPelanggaran->kategori) == 'ringan' ? 'selected' : '' }}>Ringan</option>
                            <option value="sedang" {{ old('kategori', $jenisPelanggaran->kategori) == 'sedang' ? 'selected' : '' }}>Sedang</option>
                            <option value="berat" {{ old('kategori', $jenisPelanggaran->kategori) == 'berat' ? 'selected' : '' }}>Berat</option>
                        </select>
                        @error('kategori')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="poin" class="form-label">Poin <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('poin') is-invalid @enderror" 
                               id="poin" name="poin" value="{{ old('poin', $jenisPelanggaran->poin) }}" min="1" required>
                        @error('poin')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea class="form-control @error('keterangan') is-invalid @enderror" 
                                  id="keterangan" name="keterangan" rows="3">{{ old('keterangan', $jenisPelanggaran->keterangan) }}</textarea>
                        @error('keterangan')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save me-1"></i>Update
                        </button>
                        <a href="{{ route('admin.jenis-pelanggaran.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left me-1"></i>Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection