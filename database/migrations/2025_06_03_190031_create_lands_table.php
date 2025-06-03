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
            $table->string('land_office')->nullable();
            $table->string('mouja')->nullable();
            $table->string('thana')->nullable();
            $table->string('district')->nullable();
            $table->string('holding')->nullable();
            $table->string('khatian')->nullable();
            $table->string('owner_name')->nullable();
            $table->string('owner_share')->nullable();
            $table->string('line_no')->nullable();
            $table->string('land_class')->nullable();
            $table->string('land_amount')->nullable();
            $table->string('3YearsUpBokeya')->nullable();
            $table->string('3YearsBokeya')->nullable();
            $table->string('bokeyaAmount')->nullable();
            $table->string('hallDabi')->nullable();
            $table->string('totalDabi')->nullable();
            $table->string('totalCollection')->nullable();
            $table->string('totalDue')->nullable();
            $table->string('comments')->nullable();
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
