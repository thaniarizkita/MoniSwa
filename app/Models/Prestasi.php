<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;

    protected $table = 'prestasi';

    protected $fillable = [
        'siswa_id',
        'jenis_prestasi_id',
        'guru_id',
        'nama_kegiatan',
        'peringkat',
        'keterangan',
        'tanggal',
        'sertifikat',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    // Relasi ke Siswa
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

    // Relasi ke Jenis Prestasi
    public function jenisPrestasi()
    {
        return $this->belongsTo(JenisPrestasi::class, 'jenis_prestasi_id');
    }

    // Relasi ke Guru
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }
}