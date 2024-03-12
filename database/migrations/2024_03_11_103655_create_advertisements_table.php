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
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
            $table->string('type')->default('category');
            $table->string('slug',191)->unique();
            $table->string('header_top')->nullable();
            $table->string('body_top')->nullable();
            $table->string('body_middle')->nullable();
            $table->string('body_bottom')->nullable();
            $table->string('sidebar_one')->nullable();
            $table->string('sidebar_two')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advertisements');
    }
};
