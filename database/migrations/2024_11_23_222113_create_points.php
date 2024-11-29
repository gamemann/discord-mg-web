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
        Schema::create('points', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('uid');
            $table->unsignedBigInteger('sid');
            $table->string('game', 255);
            $table->integer('points')
                ->default(0);
            $table->timestamps();

            $table->foreign('uid')
                ->references('dis_uid')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('sid')
                ->references('sid')
                ->on('servers')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('points');
    }
};
