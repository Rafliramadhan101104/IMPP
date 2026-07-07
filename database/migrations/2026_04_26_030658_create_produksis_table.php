<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produksi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('line_id');
            $table->date('tanggal');
            $table->string('masalah', 255);
            $table->string('tindakan', 255)->nullable();
            $table->string('status', 50)->default('Open');
            $table->string('pic', 100)->nullable();
            $table->timestamps();

            $table->foreign('line_id')->references('id')->on('lokasi_line')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produksi');
    }
};