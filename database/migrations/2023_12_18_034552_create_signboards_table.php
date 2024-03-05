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
        Schema::create('signboards', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('toko_id')->unsigned()->nullable();
            // $table->foreign('toko_id')->references('id')->on('m_toko')->onDelete('CASCADE');
            $table->integer('kadepo_id')->unsigned()->nullable();
            // $table->foreign('kadepo_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->integer('sales_id')->unsigned()->nullable();
            // $table->foreign('sales_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->string('shop_size');
            $table->string('pajak_reklame');
            $table->date('tanggal_pengajuan');
            $table->integer('jenis_pengajuan')->nullable();
            $table->integer('konsep_branding')->nullable();
            $table->integer('design')->nullable();
            $table->integer('sisi')->nullable();
            $table->integer('panjang')->nullable();
            $table->integer('lebar')->nullable();
            $table->text('pengiriman')->nullable();
            $table->text('alamat')->nullable();
            $table->string('upload_file');
            $table->string('upload_foto');
            $table->smallInteger('approve');
            $table->string('catatan');
            $table->date('tanggal_approve');
            $table->integer('created_by')->unsigned()->nullable();
            // $table->foreign('created_by')->references('id')->on('users')->onDelete('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('signboards');
    }
};
