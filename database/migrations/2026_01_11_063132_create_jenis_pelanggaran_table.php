<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jenis_pelanggaran', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pelanggaran', 100);
            $table->integer('poin'); // Bobot poin pelanggaran
            $table->enum('kategori', ['ringan', 'sedang', 'berat'])->default('ringan');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jenis_pelanggaran');
    }
};