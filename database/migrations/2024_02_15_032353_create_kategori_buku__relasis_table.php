<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategori_buku__relasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('buku_id')->constrained('bukus');
            $table->foreignId('kategori_id')->constrained('kategori_bukus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kategori_buku__relasis');
    }
};
