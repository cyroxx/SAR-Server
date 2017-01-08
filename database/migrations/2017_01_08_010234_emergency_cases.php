<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EmergencyCases extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emergency_cases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('boat_status');
            $table->string('boat_condition');
            $table->string('boat_type');
            $table->boolean('other_involved');
            $table->boolean('engine_working');
            $table->string('passenger_count');
            $table->string('women_on_board');
            $table->string('children_on_board');
            $table->string('disabled_on_board');
            $table->text('additional_informations');
            $table->integer('operation_area');
            $table->integer('user_id');
            $table->boolean('archived')->default(false);
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
        Schema::drop('emergency_cases');
    }
}
