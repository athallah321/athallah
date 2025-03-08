<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratTugasPegawaiTable extends Migration
{
    public function up()
    {
        Schema::create('surat_tugas_pegawai', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('surat_tugas_id');
            $table->unsignedBigInteger('pegawai_id');
            $table->timestamps();

            // Foreign key ke tabel surat_tugas
            $table->foreign('surat_tugas_id')->references('id')->on('surat_tugas')->onDelete('cascade');
            // Foreign key ke tabel pegawai
            $table->foreign('pegawai_id')->references('id')->on('pegawai')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('surat_tugas_pegawai');
    }
}
