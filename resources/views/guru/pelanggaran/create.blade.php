@extends('layouts.app')

@section('title', 'Tambah Pelanggaran')
@section('page-title', 'Tambah Pelanggaran')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-plus-circle me-2"></i>Form Tambah Pelanggaran
            </div>
            <div class="card-body">
                <form action="{{ route('guru.pelanggaran.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="siswa_id" class="form-label">Siswa <span class="text-danger">*</span></label>
                        <select class="form-select @error('siswa_id') is-invalid @enderror" id="siswa_id" name="siswa_id" required>
                            <option value="">-- Pilih Siswa --</option>
                            @foreach($siswa as $s)
                            <option value="{{ $s->id }}" {{ old('siswa_id') == $s->id ? 'selected' : '' }}>
                                {{ $s->nama_siswa }} - {{ $s->kelas->nama_kelas }}
                            </option>
                            @endforeach
                        </select>
                        @error('siswa_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="jenis_pelanggaran_id" class="form-label">Jenis Pelanggaran <span class="text-danger">*</span></label>
                        <select class="form-select @error('jenis_pelanggaran_id') is-invalid @enderror" id="jenis_pelanggaran_id" name="jenis_pelanggaran_id" required>
                            <option value="">-- Pilih Jenis Pelanggaran --</option>
                            @foreach($jenisPelanggaran as $jp)
                            <option value="{{ $jp->id }}" {{ old('jenis_pelanggaran_id') == $jp->id ? 'selected' : '' }}>
                                {{ $jp->nama_pelanggaran }} ({{ $jp->poin }} Poin - {{ ucfirst($jp->kategori) }})
                            </option>
                            @endforeach
                        </select>
                        @error('jenis_pelanggaran_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal <span class="text-danger">*</span></label>
                        <input type="date" class="form-control @error('tanggal') is-invalid @enderror" 
                               id="tanggal" name="tanggal" value="{{ old('tanggal', date('Y-m-d')) }}" required>
                        @error('tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea class="form-control @error('keterangan') is-invalid @enderror" 
                                  id="keterangan" name="keterangan" rows="3" placeholder="Jelaskan detail pelanggaran...">{{ old('keterangan') }}</textarea>
                        @error('keterangan')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                            <option value="belum_ditindak" {{ old('status') == 'belum_ditindak' ? 'selected' : ''}}>Belum Ditindak</option>
<option value="dalam_proses" {{ old('status') == 'dalam_proses' ? 'selected' : '' }}>Dalam Proses</option>
<option value="selesai" {{ old('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
</select>
@error('status')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>
<div class="mb-3">
                    <label for="tindakan" class="form-label">Tindakan</label>
                    <textarea class="form-control @error('tindakan') is-invalid @enderror" 
                              id="tindakan" name="tindakan" rows="3" placeholder="Tindakan yang diambil...">{{ old('tindakan') }}</textarea>
                    @error('tindakan')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i>Simpan
                    </button>
                    <a href="{{ route('guru.pelanggaran.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left me-1"></i>Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>