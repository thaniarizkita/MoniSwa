<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->string('nis', 20)->unique();
            $table->string('nama_siswa', 100);
            $table->foreignId('id_kelas')->constrained('kelas')->onDelete('cascade');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('tempat_lahir', 50);
            $table->date('tanggal_lahir');
            $table->string('agama', 20);
            $table->text('alamat');
            $table->string('no_hp', 15)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('nama_ayah', 100);
            $table->string('nama_ibu', 100);
            $table->string('foto')->nullable(); // path foto
            $table->enum('status', ['aktif', 'nonaktif', 'lulus'])->default('aktif');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};