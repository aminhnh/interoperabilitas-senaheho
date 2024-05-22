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
        Schema::table('kelurahan', function (Blueprint $table) {
            $table->foreign(['id_kecamatan'], 'fk_kecamatan')->references(['id'])->on('kecamatan')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kelurahan', function (Blueprint $table) {
            $table->dropForeign('fk_kecamatan');
        });
    }
};
