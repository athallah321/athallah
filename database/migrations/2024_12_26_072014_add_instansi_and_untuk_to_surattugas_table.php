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
        Schema::table('surat_tugas', function (Blueprint $table) {
            $table->string('instansi')->nullable()->after('tempat_tujuan'); // Kolom instansi
            $table->string('untuk')->nullable()->after('instansi'); // Kolom untuk
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('surat_tugas', function (Blueprint $table) {
            $table->dropColumn('instansi');
            $table->dropColumn('untuk');
        });
    }
};
