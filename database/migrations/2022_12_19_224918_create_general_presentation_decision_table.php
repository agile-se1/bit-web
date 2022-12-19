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
        Schema::create('general_presentation_decision', function (Blueprint $table) {
            $table->bigInteger('user_id');
            $table->bigInteger('general_presentation_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('user');
            $table->foreign('general_presentation_id')->references('id')->on('general_presentation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('general_presentation_decision');
    }
};
