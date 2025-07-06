<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // database/migrations/xxxx_xx_xx_create_barangs_table.php
public function up()
{
    Schema::create('barangs', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->integer('harga');
        $table->string('gambar')->nullable();
        $table->text('deskripsi')->nullable();
        $table->timestamps();
    });
}


    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
