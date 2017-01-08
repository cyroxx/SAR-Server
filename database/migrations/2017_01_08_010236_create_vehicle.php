<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehicle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('title');
            $table->string('tracking_type');
            $table->string('sat_number');
            $table->boolean('public');
            $table->string('api_key');
            $table->boolean('location_alarm_enabled');
            $table->string('location_alarm_recipients');
            $table->string('logo_url');
            $table->float('sog')->nullable();
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
        Schema::drop('vehicles');
    }
}
