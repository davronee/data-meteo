<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHydrometSensorDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hydromet_sensor_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('station_id');
            $table->double('temperature', 10, 2)->nullable();
            $table->double('humidity', 10, 2)->nullable();
            $table->double('wspeed', 10, 2)->nullable();
            $table->double('wdir', 10, 2)->nullable();
            $table->double('pressure', 10, 2)->nullable();
            $table->timestamps();

            $table->foreign('station_id')
                ->references('id')
                ->on('hydromet_stations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hydromet_sensor_data');
    }
}
