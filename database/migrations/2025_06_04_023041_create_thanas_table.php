<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       Schema::create('thanas', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('district_id');
    $table->string('name');
    $table->timestamps();

    $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thanas');
    }
};
