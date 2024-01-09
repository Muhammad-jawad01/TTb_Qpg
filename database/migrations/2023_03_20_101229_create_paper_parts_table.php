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
        Schema::create('paper_parts', function (Blueprint $table) {
            $table->id();
            $table->text('name')->nullable;
            $table->unsignedBigInteger('paper_id')->nullable()->index();
            $table->foreign('paper_id')->references('id')->on('papers');
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
        Schema::dropIfExists('paper_parts');
    }
};