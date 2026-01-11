@extends('layouts.app')

@section('title', 'Edit Kelas')
@section('page-title', 'Edit Kelas')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-pencil me-2"></i>Form Edit Kelas
            </div>
            <div class="card-body">
                <form action="{{ route('admin.kelas.update', $kela->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="nama_kelas" class="form-label">Nama Kelas <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nama_kelas') is-invalid @enderror" 
                               id="nama_kelas" name="nama_kelas" value="{{ old('nama_kelas', $kela->nama_kelas) }}" required>
                        @error('nama_kelas')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tingkat" class="form-label">Tingkat <span class="text-danger">*</span></label>
                        <select class="form-select @error('tingkat') is-invalid @enderror" id="tingkat" name="tingkat" required>
                            <option value="">-- Pilih Tingkat --</option>
                            <option value="X" {{ old('tingkat', $kela->tingkat) == 'X' ? 'selected' : '' }}>X</option>
                            <option value="XI" {{ old('tingkat', $kela->tingkat) == 'XI' ? 'selected' : '' }}>XI</option>
                            <option value="XII" {{ old('tingkat', $kela->tingkat) == 'XII' ? 'selected' : '' }}>XII</option>
                        </select>
                        @error('tingkat')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="jurusan" class="form-label">Jurusan</label>
                        <input type="text" class="form-control @error('jurusan') is-invalid @enderror" 
                               id="jurusan" name="jurusan" value="{{ old('jurusan', $kela->jurusan) }}">
                        @error('jurusan')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save me-1"></i>Update
                        </button>
                        <a href="{{ route('admin.kelas.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left me-1"></i>Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection