<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSensitiveDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensitive_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('region_id')->nullable();
            $table->foreign('region_id')->references('regionid')->on('uz_regions');
            $table->float('temperature')->nullable();
            $table->float('humidity')->nullable();
            $table->float('wind_speed')->nullable();
            $table->float('solar_radiation')->nullable();
            $table->float('pressure')->nullable();
            $table->float('precipitation')->nullable();
            $table->float('cloudiness')->nullable();
            $table->float('air_quality')->nullable();
            $table->float('ultraviolet')->nullable();
            $table->float('magnitude')->nullable();
            $table->year('year')->nullable();
            $table->unsignedInteger('month')->nullable();
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
        Schema::dropIfExists('sensitive_data');
    }
}
