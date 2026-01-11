<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pelanggaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('siswa')->onDelete('cascade');
            $table->foreignId('jenis_pelanggaran_id')->constrained('jenis_pelanggaran')->onDelete('cascade');
            $table->foreignId('guru_id')->nullable()->constrained('guru')->onDelete('set null'); // Guru yang input
            $table->text('keterangan')->nullable();
            $table->date('tanggal');
            $table->enum('status', ['belum_ditindak', 'dalam_proses', 'selesai'])->default('belum_ditindak');
            $table->text('tindakan')->nullable(); // Tindakan yang diambil
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pelanggaran');
    }
};