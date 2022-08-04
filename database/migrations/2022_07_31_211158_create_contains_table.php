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
        Schema::create('contains', function (Blueprint $table) {
            $table->unsignedBigInteger('id_scheda');
            $table->unsignedBigInteger('id_exercise');
            $table->string('ripetizioni');
            $table->timestamps();

            $table->foreign('id_scheda')->references('id_scheda')->on('plans');
            $table->foreign('id_exercise')->references('id_exercise')->on('exercises');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contains');
    }
};
