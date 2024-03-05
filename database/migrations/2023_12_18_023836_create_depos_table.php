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
        Schema::create('m_depo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_depo');
            $table->string('kode_depo');
            $table->integer('kadepo_id')->unsigned()->nullable();
            // $table->foreign('kadepo_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->smallInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_depo');
    }
};
