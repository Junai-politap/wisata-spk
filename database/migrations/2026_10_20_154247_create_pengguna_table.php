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
        Schema::create('pengguna', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->string('nama_pengguna', 255);
            $table->string('email', 255)->unique();
            $table->string('password', 255);
            $table->string('alamat', 255)->nullable();
            $table->string('no_telp', 255)->nullable();
            $table->string('poto', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengguna');
    }
};
