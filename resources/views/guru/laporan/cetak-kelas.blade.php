<!DOCTYPE html>
<html>
<head>
    <title>Laporan Kelas - {{ $kelas->nama_kelas }}</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        .header { text-align: center; margin-bottom: 30px; border-bottom: 3px solid #000; padding-bottom: 10px; }
        .header h2 { margin: 5px 0; }
        .header p { margin: 3px 0; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid #000; }
        th, td { padding: 8px; text-align: left; }
        th { background-color: #f0f0f0; }
        .summary { background-color: #f9f9f9; padding: 15px; margin: 20px 0; border: 1px solid #ddd; }
        .summary h4 { margin-top: 0; }
        @media print {
            .no-print { display: none; }
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>SMAS AZZAINIYYAH</h2>
        <p>Laporan Prestasi dan Pelanggaran per Kelas</p>
        <p>Tahun Ajaran 2025/2026</p>
    </div>
    <div class="summary">
    <h4>Kelas: {{ $kelas->nama_kelas }}</h4>
    <table style="border: none; width: 100%;">
        <tr style="border: none;">
            <td style="border: none; width: 33%;"><strong>Total Siswa:</strong> {{ $kelas->siswa->count() }}</td>
            <td style="border: none; width: 33%;"><strong>Total Prestasi:</strong> {{ $kelas->siswa->sum(function($s) { return $s->prestasi->count(); }) }}</td>
            <td style="border: none; width: 33%;"><strong>Total Pelanggaran:</strong> {{ $kelas->siswa->sum(function($s) { return $s->pelanggaran->count(); }) }}</td>
        </tr>
    </table>
</div>
<h3>Daftar Siswa</h3>
<table>
    <thead>
        <tr>
            <th width="30">No</th>
            <th width="80">NIS</th>
            <th>Nama Siswa</th>
            <th width="40">JK</th>
            <th width="70">Prestasi</th>
            <th width="90">Pelanggaran</th>
            <th width="80">Total Poin</th>
        </tr>
    </thead>
    <tbody>
        @foreach($kelas->siswa as $index => $siswa)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $siswa->nis }}</td>
            <td>{{ $siswa->nama_siswa }}</td>
            <td>{{ $siswa->jenis_kelamin }}</td>
            <td style="text-align: center;">{{ $siswa->prestasi->count() }}</td>
            <td style="text-align: center;">{{ $siswa->pelanggaran->count() }}</td>
            <td style="text-align: center;">{{ $siswa->totalPoinPelanggaran() }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<div style="margin-top: 50px;">
    <table style="border: none; width: 100%;">
        <tr>
            <td style="border: none; width: 50%;"></td>
            <td style="border: none; text-align: center;">
                <p>Dicetak pada: {{ now()->format('d F Y, H:i') }}</p>
                <p style="margin-top: 80px;">
                    _______________________<br>
                    Wali Kelas
                </p>
            </td>
        </tr>
    </table>
</div>
<script>
    window.print();
</script>
</body>
</html>