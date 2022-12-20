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

    //Adds all constrains to all tables
    public function up()
    {
        Schema::table('professional_field_decision', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('user');
            $table->foreign('professional_field_id')->references('id')->on('professional_field');
        });

        Schema::table('general_presentation_decision', function (Blueprint $table) {
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
        Schema::table('professional_field_decision', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['professional_field_id']);
        });

        Schema::table('general_presentation_decision', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['general_presentation_id']);
        });

    }
};
