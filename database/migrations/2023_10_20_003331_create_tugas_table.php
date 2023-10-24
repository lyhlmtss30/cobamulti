<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tugas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_siswa');
            $table->string('keterangan');
            $table->string('bukti');
            $table->timestamps();

            // Kunci asing ke tabel nama_mapel
            $table->foreignId('mapel_id')->constrained('data_mapel');

            // Kunci asing ke tabel nama_guru
            $table->foreignId('guru_id')->constrained('nama_gurus');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tugas');
    }
};
