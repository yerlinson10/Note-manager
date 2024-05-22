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
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user_creator');
            $table->unsignedBigInteger('id_category')->nullable();
            $table->string('title');
            $table->text('content');
            $table->string('tags')->nullable();
            $table->timestamps();
            $table->foreign('id_user_creator')->references('id')->on('users');
            $table->foreign('id_category')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
