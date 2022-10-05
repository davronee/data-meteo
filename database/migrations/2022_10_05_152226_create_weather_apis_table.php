<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeatherApisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weather_apis', function (Blueprint $table) {
            $table->id();
            $table->string('region')->nullable();
            $table->dateTime('datetime')->nullable();
            $table->date('date')->nullable();
            $table->float('temp_min')->nullable();
            $table->float('temp_max')->nullable();
            $table->string('dayOfWeek')->nullable();
            $table->integer('precipChance')->nullable();
            $table->string('precipType')->nullable();
            $table->integer('relativeHumidity')->nullable();
            $table->integer('windDirection')->nullable();
            $table->string('windDirectionCardinal')->nullable();
            $table->integer('windSpeed')->nullable();
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
        Schema::dropIfExists('weather_apis');
    }
}
