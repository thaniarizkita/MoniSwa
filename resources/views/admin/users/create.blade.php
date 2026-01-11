@extends('layouts.app')

@section('title', 'Tambah Akun')
@section('page-title', 'Tambah Akun Pengguna')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-plus-circle me-2"></i>Form Tambah Akun
            </div>
            <div class="card-body">
                <form action="{{ route('admin.users.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" 
                               id="username" name="username" value="{{ old('username') }}" required>
                        @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" 
                               id="password" name="password" required>
                        <small class="text-muted">Minimal 6 karakter</small>
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="role" class="form-label">Role <span class="text-danger">*</span></label>
                        <select class="form-select @error('role') is-invalid @enderror" id="role" name="role" required>
                            <option value="">-- Pilih Role --</option>
                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="guru" {{ old('role') == 'guru' ? 'selected' : '' }}>Guru</option>
                            <option value="siswa" {{ old('role') == 'siswa' ? 'selected' : '' }}>Siswa</option>
                            <option value="wali" {{ old('role') == 'wali' ? 'selected' : '' }}>Wali Murid</option>
                        </select>
                        @error('role')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3" id="relasi-siswa" style="display: none;">
                        <label for="relasi_id_siswa" class="form-label">Pilih Siswa</label>
                        <select class="form-select" id="relasi_id_siswa" name="relasi_id">
                            <option value="">-- Pilih Siswa --</option>
                            @foreach($siswa as $s)
                            <option value="{{ $s->id }}">{{ $s->nama_siswa }} ({{ $s->nis }})</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3" id="relasi-guru" style="display: none;">
                        <label for="relasi_id_guru" class="form-label">Pilih Guru</label>
                        <select class="form-select" id="relasi_id_guru" name="relasi_id">
                            <option value="">-- Pilih Guru --</option>
                            @foreach($guru as $g)
                            <option value="{{ $g->id }}">{{ $g->nama_guru }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3" id="relasi-wali" style="display: none;">
                        <label for="relasi_id_wali" class="form-label">Pilih Wali Murid</label>
                        <select class="form-select" id="relasi_id_wali" name="relasi_id">
                            <option value="">-- Pilih Wali Murid --</option>
                            @foreach($waliMurid as $w)
                            <option value="{{ $w->id }}">{{ $w->nama_wali }} (Wali dari: {{ $w->siswa->nama_siswa }})</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save me-1"></i>Simpan
                        </button>
                        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left me-1"></i>Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.getElementById('role').addEventListener('change', function() {
    const role = this.value;
    
    document.getElementById('relasi-siswa').style.display = 'none';
    document.getElementById('relasi-guru').style.display = 'none';
    document.getElementById('relasi-wali').style.display = 'none';
    
    document.getElementById('relasi_id_siswa').removeAttribute('name');
    document.getElementById('relasi_id_guru').removeAttribute('name');
    document.getElementById('relasi_id_wali').removeAttribute('name');
    
    if (role === 'siswa') {
        document.getElementById('relasi-siswa').style.display = 'block';
        document.getElementById('relasi_id_siswa').setAttribute('name', 'relasi_id');
    } else if (role === 'guru') {
        document.getElementById('relasi-guru').style.display = 'block';
        document.getElementById('relasi_id_guru').setAttribute('name', 'relasi_id');
    } else if (role === 'wali') {
        document.getElementById('relasi-wali').style.display = 'block';
        document.getElementById('relasi_id_wali').setAttribute('name', 'relasi_id');
    }
});
</script>
@endpush
@endsection