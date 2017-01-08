<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreateCaseLocations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emergency_case_locations', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('emergency_case_id');
			$table->float('lat', 10, 7);
			$table->float('lon', 10, 7);
			$table->integer('accuracy');
			$table->string('connection_type');
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
        Schema::drop('emergency_case_locations');
    }
}
