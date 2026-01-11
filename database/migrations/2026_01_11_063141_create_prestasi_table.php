<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prestasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('siswa')->onDelete('cascade');
            $table->foreignId('jenis_prestasi_id')->constrained('jenis_prestasi')->onDelete('cascade');
            $table->foreignId('guru_id')->nullable()->constrained('guru')->onDelete('set null'); // Guru yang input
            $table->string('nama_kegiatan', 200); // Nama lomba/kegiatan
            $table->string('peringkat', 50)->nullable(); // Juara 1, 2, 3, dll
            $table->text('keterangan')->nullable();
            $table->date('tanggal');
            $table->string('sertifikat')->nullable(); // Path file sertifikat
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prestasi');
    }
};