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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();

            $table->string('jabatan');
            $table->string('phone_number')->nullable();
            $table->string('address')->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('user_id')->unique();
            $table->unsignedBigInteger('cabang_id')->nullable();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('cabang_id')->references('id')->on('branches');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
