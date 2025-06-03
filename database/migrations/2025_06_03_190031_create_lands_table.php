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
        Schema::create('lands', function (Blueprint $table) {
            $table->id();
            $table->string('land')->nullable();
            $table->string('mouja')->nullable();
            $table->string('thana')->nullable();
            $table->string('district')->nullable();
            $table->string('holding')->nullable();
            $table->string('khatian')->nullable();
            $table->string('owner_name')->nullable();
            $table->string('owner_share')->nullable();
            $table->string('session')->nullable();
            $table->string('chalan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lands');
    }
};
