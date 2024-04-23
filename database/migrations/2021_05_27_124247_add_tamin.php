<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTamin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('microstep_stations_values', function (Blueprint $table) {
            $table->double('Ta_min')->nullable()->comment('°C температура воздуха за последние 3 часа')->after('Ta_avr');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('microstep_stations_values', function (Blueprint $table) {
            $table->dropColumn('Ta_min');
        });
    }
}
