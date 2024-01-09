<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paper_questions', function (Blueprint $table) {
            $table->id();
                $table->unsignedBigInteger('paper_id')->nullable()->index();
                $table->foreign('paper_id')->references('id')->on('papers');
                $table->unsignedBigInteger('paper_parts_id')->nullable()->index();
                $table->foreign('paper_parts_id')->references('id')->on('paper_parts');
                $table->unsignedBigInteger('question_id')->nullable()->index();
                $table->foreign('question_id')->references('id')->on('questions');
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paper_questions');
    }
};