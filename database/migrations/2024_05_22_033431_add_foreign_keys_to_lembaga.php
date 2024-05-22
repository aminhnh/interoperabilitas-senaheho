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
        Schema::table('lembaga', function (Blueprint $table) {
            $table->foreign(['id_role'], 'fk_role')->references(['id'])->on('role')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['id_kelurahan'], 'fk_kelurahan')->references(['id'])->on('kelurahan')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lembaga', function (Blueprint $table) {
            $table->dropForeign('fk_role');
            $table->dropForeign('fk_kelurahan');
        });
    }
};
