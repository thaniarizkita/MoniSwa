<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'guru';

    protected $fillable = [
        'nip',
        'nama_guru',
        'mapel',
        'no_hp',
        'email',
        'jenis_kelamin',
        'alamat',
    ];

    // Relasi ke Prestasi
    public function prestasi()
    {
        return $this->hasMany(Prestasi::class, 'guru_id');
    }

    // Relasi ke Pelanggaran
    public function pelanggaran()
    {
        return $this->hasMany(Pelanggaran::class, 'guru_id');
    }

    // Relasi ke User
    public function user()
    {
        return $this->hasOne(User::class, 'relasi_id')->where('role', 'guru');
    }
}