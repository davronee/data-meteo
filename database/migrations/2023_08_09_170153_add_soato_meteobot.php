<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSoatoMeteobot extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('meteo_bot_stations', function (Blueprint $table) {
            $table->unsignedInteger('region_id')->nullable()->after('stationid');
            $table->unsignedInteger('district_id')->nullable()->after('region_id');
            $table->foreign('region_id')->references('regionid')->on('uz_regions');
            $table->foreign('district_id')->references('areaid')->on('uz_districts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('meteo_bot_stations', function (Blueprint $table) {
            $table->dropForeign(['region_id']);
            $table->dropForeign(['district_id']);
            $table->dropColumn('region_id');
            $table->dropColumn('district_id');
        });
    }
}
