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
        Schema::create('m_toko', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_sap');
            $table->string('nama_toko');
            $table->text('alamat')->nullable();
            $table->string('kota');
            $table->string('nama_pemilik');
            $table->string('no_telp')->nullable();
            $table->string('omset')->nullable();
            $table->smallInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_toko');
    }
};
