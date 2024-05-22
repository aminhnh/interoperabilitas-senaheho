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
        Schema::table('kantong_darah', function (Blueprint $table) {
            $table->foreign(['id_golongan_darah'], 'fk_golongan_darah')->references(['id'])->on('golongan_darah')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['id_lembaga'], 'fk_lembaga')->references(['id'])->on('lembaga')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kantong_darah', function (Blueprint $table) {
            $table->dropForeign('fk_golongan_darah');
            $table->dropForeign('fk_lembaga');
        });
    }
};
