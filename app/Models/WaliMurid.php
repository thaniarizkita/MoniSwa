<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaliMurid extends Model
{
    use HasFactory;

    protected $table = 'wali_murid';

    protected $fillable = [
        'nama_wali',
        'id_siswa',
        'no_hp',
        'alamat',
        'hubungan',
    ];

    // Relasi ke Siswa
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }

    // Relasi ke User
    public function user()
    {
        return $this->hasOne(User::class, 'relasi_id')->where('role', 'wali');
    }
}