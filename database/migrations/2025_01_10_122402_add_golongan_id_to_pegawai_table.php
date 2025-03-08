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
        Schema::table('pegawai', function (Blueprint $table) {
            $table->unsignedBigInteger('golongan_id')->nullable()->after('id'); // Menambahkan kolom golongan_id
        $table->foreign('golongan_id')->references('id')->on('golongan')->onDelete('set null'); // Relasi ke tabel golongans
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pegawai', function (Blueprint $table) {
            $table->dropForeign(['golongan_id']); // Hapus foreign key
        $table->dropColumn('golongan_id');   // Hapus kolom
        });
    }
};
