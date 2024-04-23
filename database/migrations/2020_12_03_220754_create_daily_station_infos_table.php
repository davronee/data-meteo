<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyStationInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_station_infos', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->date('published_at')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedInteger('region_id');
            $table->unsignedInteger('district_id');
            $table->unsignedBigInteger('station_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('region_id')->references('regionid')->on('uz_regions');
            $table->foreign('district_id')->references('areaid')->on('uz_districts');
            $table->foreign('station_id')->references('id')->on('stations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daily_station_infos');
    }
}
