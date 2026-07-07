<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tindakan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produksi_id')
                  ->constrained('produksi')
                  ->onDelete('cascade');
            $table->text('tindakan');
            $table->date('tanggal');
            $table->string('pic');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tindakan');
    }
};