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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->text('question')->nullable;
            $table->string('type')->nullable;
            $table->unsignedBigInteger('class_id')->nullable()->index();
            $table->foreign('class_id')->references('id')->on('class_levels');
            $table->unsignedBigInteger('subject_id')->nullable()->index();
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->unsignedBigInteger('chapter_id')->nullable()->index();
            $table->foreign('chapter_id')->references('id')->on('chapters');
            $table->unsignedBigInteger('term_id')->nullable()->index();
            $table->foreign('term_id')->references('id')->on('terms');
         
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};