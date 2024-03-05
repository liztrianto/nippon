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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nik')->unique()->nullable();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('password');
            $table->string('jabatan')->nullable();
            $table->integer('depo_id')->unsigned()->nullable();
            $table->integer('dept_id')->unsigned()->nullable();
            $table->integer('atasan_id')->unsigned()->nullable();
            $table->string('image')->nullable();
            $table->smallInteger('active')->default(1);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
