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
        Schema::table('spd', function (Blueprint $table) {
            $table->string('jns_transportasi')->nullable()->after('instansi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('spd', function (Blueprint $table) {
            $table->dropColumn('jns_transportasi');
        });
    }
};
