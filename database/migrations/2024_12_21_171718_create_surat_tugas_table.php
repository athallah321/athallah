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
        Schema::create('surat_tugas', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('no_surat')->unique(); // Nomor surat tugas
            $table->date('tgl_surat'); // Tanggal surat dibuat
            $table->string('tempat_berangkat'); // Tempat berangkat
            $table->string('tempat_tujuan'); // Tempat tujuan
            $table->date('tgl_berangkat'); // Tanggal berangkat
            $table->date('tgl_kembali'); // Tanggal kembali
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_tugas');
    }
};
