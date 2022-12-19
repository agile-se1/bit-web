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
        Schema::create('professional_field_decision', function (Blueprint $table) {
            $table->bigInteger('user_id');
            $table->bigInteger('professional_field_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('user');
            $table->foreign('professional_field_id')->references('id')->on('professional_field');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('professional_field_decision');
    }
};
