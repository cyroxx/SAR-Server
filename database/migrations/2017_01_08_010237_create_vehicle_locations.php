<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehicleLocations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_locations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vehicle_id');
            $table->float('lat', 10, 7);
            $table->float('lon', 10, 7);
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
        Schema::drop('vehicle_locations');
    }
}
