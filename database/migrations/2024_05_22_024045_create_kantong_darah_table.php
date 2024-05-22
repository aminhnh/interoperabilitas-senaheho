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
        Schema::create('kantong_darah', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_golongan_darah')->index('fk_golongan_darah');
            $table->unsignedBigInteger('id_lembaga')->index('fk_lembaga');
            $table->date('tanggal_donor')->nullable(false);
            $table->date('tanggal_kadaluarsa')->nullable(false);
            $table->integer('jumlah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kantong_darah');
    }
};
