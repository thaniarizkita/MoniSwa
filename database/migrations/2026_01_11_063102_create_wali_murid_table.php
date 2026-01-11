<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('wali_murid', function (Blueprint $table) {
            $table->id();
            $table->string('nama_wali', 100);
            $table->foreignId('id_siswa')->constrained('siswa')->onDelete('cascade');
            $table->string('no_hp', 15);
            $table->text('alamat');
            $table->string('hubungan', 20)->default('Orang Tua'); // Orang Tua, Wali, dll
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('wali_murid');
    }
};