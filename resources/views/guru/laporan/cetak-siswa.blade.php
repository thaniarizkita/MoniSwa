<!DOCTYPE html>
<html>
<head>
    <title>Laporan Siswa - {{ $siswa->nama_siswa }}</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        .header { text-align: center; margin-bottom: 30px; border-bottom: 3px solid #000; padding-bottom: 10px; }
        .header h2 { margin: 5px 0; }
        .header p { margin: 3px 0; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid #000; }
        th, td { padding: 8px; text-align: left; }
        th { background-color: #f0f0f0; }
        .info-box { margin: 20px 0; }
        .info-box table { border: none; }
        .info-box td { border: none; padding: 5px; }
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
        <p>Laporan Prestasi dan Pelanggaran Siswa</p>
        <p>Tahun Ajaran 2024/2025</p>
    </div>

    <div class="info-box">
        <table>
            <tr>
                <td width="150"><strong>NIS</strong></td>
                <td>: {{ $siswa->nis }}</td>
                <td width="150"><strong>Kelas</strong></td>
                <td>: {{ $siswa->kelas->nama_kelas }}</td>
            </tr>
            <tr>
                <td><strong>Nama Siswa</strong></td>
                <td>: {{ $siswa->nama_siswa }}</td>
                <td><strong>Jenis Kelamin</strong></td>
                <td>: {{ $siswa->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
            </tr>
            <tr>
                <td><strong>Tempat, Tgl Lahir</strong></td>
                <td>: {{ $siswa->tempat_lahir }}, {{ $siswa->tanggal_lahir->format('d F Y') }}</td>
                <td><strong>Agama</strong></td>
                <td>: {{ $siswa->agama }}</td>
            </tr>
        </table>
    </div>

    <div class="summary">
        <h4>Ringkasan</h4>
        <p><strong>Total Prestasi:</strong> {{ $siswa->prestasi->count() }}</p>
        <p><strong>Total Pelanggaran:</strong> {{ $siswa->pelanggaran->count() }}</p>
        <p><strong>Total Poin Pelanggaran:</strong> <span style="color: red; font-size: 16px;">{{ $totalPoin }}</span></p>
    </div>

    <h3>Daftar Prestasi</h3>
    <table>
        <thead>
            <tr>
                <th width="30">No</th>
                <th width="80">Tanggal</th>
                <th>Jenis Prestasi</th>
                <th>Nama Kegiatan</th>
                <th width="100">Peringkat</th>
            </tr>
        </thead>
        <tbody>
            @forelse($siswa->prestasi as $index => $p)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $p->tanggal->format('d/m/Y') }}</td>
                <td>{{ $p->jenisPrestasi->nama_prestasi }} ({{ ucfirst($p->jenisPrestasi->tingkat) }})</td>
                <td>{{ $p->nama_kegiatan }}</td>
                <td>{{ $p->peringkat ?? '-' }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align: center;">Belum ada prestasi</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <h3 style="margin-top: 30px;">Daftar Pelanggaran</h3>
    <table>
        <thead>
            <tr>
                <th width="30">No</th>
                <th width="80">Tanggal</th>
                <th>Jenis Pelanggaran</th>
                <th width="60">Poin</th>
                <th width="100">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($siswa->pelanggaran as $index => $p)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $p->tanggal->format('d/m/Y') }}</td>
                <td>{{ $p->jenisPelanggaran->nama_pelanggaran }} ({{ ucfirst($p->jenisPelanggaran->kategori) }})</td>
                <td>{{ $p->jenisPelanggaran->poin }}</td>
                <td>{{ ucfirst(str_replace('_', ' ', $p->status)) }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align: center;">Belum ada pelanggaran</td>
            </tr>
            @endforelse
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
                        Guru/BK
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