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
            // agar user beda beda
            $table->foreignId('user_id')->constrained('users');
            // Kunci asing ke tabel nama_mapel
            $table->foreignId('mapel_id')->constrained('data_mapel');
            // Kunci asing ke tabel nama_guru
            $table->unsignedBigInteger('guru_id')->nullable();
            $table->string('nama_siswa');
            $table->string('keterangan');
            $table->string('bukti');
            $table->enum('status',['diterima','ditolak','menunggu', 'mengajukan ulang'])->default('menunggu');
            $table->timestamps();
            $table->foreign("guru_id")->references("id")->on("nama_gurus")->onDelete("cascade");
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
