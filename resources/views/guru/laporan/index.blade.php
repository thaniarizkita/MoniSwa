@extends('layouts.app')

@section('title', 'Laporan')
@section('page-title', 'Laporan Prestasi & Pelanggaran')

@section('content')
<div class="row">
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-file-earmark-text me-2"></i>Laporan Per Siswa
            </div>
            <div class="card-body">
                <form action="{{ route('guru.laporan.siswa', ['id' => 0]) }}" method="GET" id="formLaporanSiswa">
                    <div class="mb-3">
                        <label for="siswa_id" class="form-label">Pilih Siswa</label>
                        <select class="form-select" id="siswa_id" name="siswa_id" required>
                            <option value="">-- Pilih Siswa --</option>
                            @foreach($siswa as $s)
                            <option value="{{ $s->id }}">{{ $s->nama_siswa }} ({{ $s->kelas->nama_kelas }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="d-flex gap-2">
                        <button type="button" class="btn btn-primary" onclick="lihatLaporan('siswa')">
                            <i class="bi bi-eye me-1"></i>Lihat Laporan
                        </button>
                        <button type="button" class="btn btn-danger" onclick="cetakLaporan('siswa')">
                            <i class="bi bi-printer me-1"></i>Cetak PDF
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-file-earmark-text me-2"></i>Laporan Per Kelas
            </div>
            <div class="card-body">
                <form action="{{ route('guru.laporan.kelas', ['id' => 0]) }}" method="GET" id="formLaporanKelas">
                    <div class="mb-3">
                        <label for="kelas_id" class="form-label">Pilih Kelas</label>
                        <select class="form-select" id="kelas_id" name="kelas_id" required>
                            <option value="">-- Pilih Kelas --</option>
                            @foreach($kelas as $k)
                            <option value="{{ $k->id }}">{{ $k->nama_kelas }} ({{ $k->siswa_count }} Siswa)</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="d-flex gap-2">
                        <button type="button" class="btn btn-primary" onclick="lihatLaporan('kelas')">
                            <i class="bi bi-eye me-1"></i>Lihat Laporan
                        </button>
                        <button type="button" class="btn btn-danger" onclick="cetakLaporan('kelas')">
                            <i class="bi bi-printer me-1"></i>Cetak PDF
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
function lihatLaporan(type) {
    if (type === 'siswa') {
        const siswaId = document.getElementById('siswa_id').value;
        if (!siswaId) {
            alert('Pilih siswa terlebih dahulu');
            return;
        }
        window.location.href = "{{ route('guru.laporan.siswa', '') }}/" + siswaId;
    } else {
        const kelasId = document.getElementById('kelas_id').value;
        if (!kelasId) {
            alert('Pilih kelas terlebih dahulu');
            return;
        }
        window.location.href = "{{ route('guru.laporan.kelas', '') }}/" + kelasId;
    }
}

function cetakLaporan(type) {
    if (type === 'siswa') {
        const siswaId = document.getElementById('siswa_id').value;
        if (!siswaId) {
            alert('Pilih siswa terlebih dahulu');
            return;
        }
        window.open("{{ route('guru.laporan.cetak-siswa', '') }}/" + siswaId, '_blank');
    } else {
        const kelasId = document.getElementById('kelas_id').value;
        if (!kelasId) {
            alert('Pilih kelas terlebih dahulu');
            return;
        }
        window.open("{{ route('guru.laporan.cetak-kelas', '') }}/" + kelasId, '_blank');
    }
}
</script>
@endpush
@endsection