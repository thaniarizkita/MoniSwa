<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPelanggaran extends Model
{
    use HasFactory;

    protected $table = 'jenis_pelanggaran';

    protected $fillable = [
        'nama_pelanggaran',
        'poin',
        'kategori',
        'keterangan',
    ];

    // Relasi ke Pelanggaran
    public function pelanggaran()
    {
        return $this->hasMany(Pelanggaran::class, 'jenis_pelanggaran_id');
    }
}