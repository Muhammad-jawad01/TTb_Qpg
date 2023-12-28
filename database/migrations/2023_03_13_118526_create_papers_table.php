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
        Schema::create('papers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable;
            $table->string('part')->nullable;
            $table->unsignedBigInteger('class_id')->nullable()->index();
            $table->foreign('class_id')->references('id')->on('class_levels');
            $table->unsignedBigInteger('subject_id')->nullable()->index();
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->unsignedBigInteger('term_id')->nullable()->index();
            $table->foreign('term_id')->references('id')->on('terms');
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
        Schema::dropIfExists('papers');
    }
};
