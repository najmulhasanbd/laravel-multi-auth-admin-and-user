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
        Schema::create('lands', function (Blueprint $table) {
            $table->id();

            $table->string('land_office')->nullable();
            $table->string('mouja')->nullable();

            $table->unsignedBigInteger('district_id')->nullable();
            $table->unsignedBigInteger('thana_id')->nullable();

            $table->string('holding')->nullable();
            $table->string('khatian')->nullable();
            $table->string('owner_name')->nullable();
            $table->string('owner_share')->nullable();

            $table->json('line_no')->nullable(); // Store: ["1", "2", "3"]
            $table->json('land_class')->nullable(); // Store: ["A", "B", "C"]
            $table->json('land_amount')->nullable(); // Store: ["2.5", "4.0", "1.2"]

            $table->string('3YearsUpBokeya')->nullable();
            $table->string('3YearsBokeya')->nullable();
            $table->string('bokeyaAmount')->nullable();
            $table->string('hallDabi')->nullable();
            $table->string('totalDabi')->nullable();
            $table->string('totalCollection')->nullable();
            $table->string('totalDue')->nullable();

            $table->text('comments')->nullable();
            $table->string('session')->nullable();
            $table->string('chalan')->nullable();

            $table->timestamps();

            $table->foreign('district_id')->references('id')->on('districts')->onDelete('set null');
            $table->foreign('thana_id')->references('id')->on('thanas')->onDelete('set null');
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
