<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';

    protected $fillable = [
        'nis',
        'nama_siswa',
        'id_kelas',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'alamat',
        'no_hp',
        'email',
        'nama_ayah',
        'nama_ibu',
        'foto',
        'status',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    // Relasi ke Kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    // Relasi ke Prestasi
    public function prestasi()
    {
        return $this->hasMany(Prestasi::class, 'siswa_id');
    }

    // Relasi ke Pelanggaran
    public function pelanggaran()
    {
        return $this->hasMany(Pelanggaran::class, 'siswa_id');
    }

    // Relasi ke Wali Murid
    public function waliMurid()
    {
        return $this->hasMany(WaliMurid::class, 'id_siswa');
    }

    // Relasi ke User
    public function user()
    {
        return $this->hasOne(User::class, 'relasi_id')->where('role', 'siswa');
    }

    // Method untuk menghitung total poin pelanggaran
    public function totalPoinPelanggaran()
    {
        return $this->pelanggaran()
            ->join('jenis_pelanggaran', 'pelanggaran.jenis_pelanggaran_id', '=', 'jenis_pelanggaran.id')
            ->sum('jenis_pelanggaran.poin');
    }
}