@extends('layouts.app')

@section('title', 'Edit Wali Murid')
@section('page-title', 'Edit Wali Murid')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-pencil me-2"></i>Form Edit Wali Murid
            </div>
            <div class="card-body">
                <form action="{{ route('admin.wali-murid.update', $waliMurid->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="nama_wali" class="form-label">Nama Wali <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nama_wali') is-invalid @enderror" 
                               id="nama_wali" name="nama_wali" value="{{ old('nama_wali', $waliMurid->nama_wali) }}" required>
                        @error('nama_wali')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="id_siswa" class="form-label">Siswa <span class="text-danger">*</span></label>
                        <select class="form-select @error('id_siswa') is-invalid @enderror" id="id_siswa" name="id_siswa" required>
                            <option value="">-- Pilih Siswa --</option>
                            @foreach($siswa as $s)
                            <option value="{{ $s->id }}" {{ old('id_siswa', $waliMurid->id_siswa) == $s->id ? 'selected' : '' }}>
                                {{ $s->nama_siswa }} - {{ $s->nis }}
                            </option>
                            @endforeach
                        </select>
                        @error('id_siswa')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="hubungan" class="form-label">Hubungan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('hubungan') is-invalid @enderror" 
                               id="hubungan" name="hubungan" value="{{ old('hubungan', $waliMurid->hubungan) }}" required>
                        @error('hubungan')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="no_hp" class="form-label">No. HP <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('no_hp') is-invalid @enderror" 
                               id="no_hp" name="no_hp" value="{{ old('no_hp', $waliMurid->no_hp) }}" required>
                        @error('no_hp')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('alamat') is-invalid @enderror" 
                                  id="alamat" name="alamat" rows="3" required>{{ old('alamat', $waliMurid->alamat) }}</textarea>
                        @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save me-1"></i>Update
                        </button>
                        <a href="{{ route('admin.wali-murid.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left me-1"></i>Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection