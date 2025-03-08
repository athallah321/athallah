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
        Schema::create('spd', function (Blueprint $table) {
            $table->id();
            $table->string('no_spd')->unique(); // Nomor SPD
            $table->date('tgl_spd'); // Tanggal SPD
            $table->string('pb_perintah'); // Pejabat pemberi perintah
            $table->string('mata_anggaran'); // Mata anggaran
            $table->date('tgl_berangkat'); // Tanggal berangkat
            $table->date('tgl_kembali'); // Tanggal kembali
            $table->string('asal'); // Kota asal
            $table->string('tujuan'); // Kota tujuan
            $table->text('untuk'); // Keperluan
            $table->text('ket')->nullable(); // Keterangan
            $table->string('instansi'); // Instansi
            $table->unsignedBigInteger('id_pegawai'); // ID Pegawai
            $table->timestamps();

            // Jika ada tabel pegawai, tambahkan foreign key:
            $table->foreign('id_pegawai')->references('id')->on('pegawai')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spd');
    }
};
