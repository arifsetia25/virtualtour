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
        Schema::create('koordinates', function (Blueprint $table) {
            $table->id();
            $table->string('koordinat_x', 100);
            $table->string('koordinat_y', 100);
            $table->string('koordinat_z', 100);
            $table->string('tipe');
            $table->string('keterangan', 100);
            $table->unsignedBigInteger('panorama_id');

            $table->foreign('panorama_id')->references('id')->on('panoramas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('koordinates');
    }
};
