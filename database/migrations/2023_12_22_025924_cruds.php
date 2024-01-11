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
        Schema::create('cruds', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('iduser'); // Menggunakan tipe data unsignedBigInteger
            $table->text('content');
            $table->string('image');
            $table->timestamps();
        
            $table->foreign('iduser')->references('id')->on('users');
        });
        // Tambahkan kode berikut untuk menambahkan data palsu
        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cruds');
    }
};
