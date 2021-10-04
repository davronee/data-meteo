<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFaktik extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accuweathers', function (Blueprint $table) {
            $table->float('factik')->comment('faktik')->default(0);
        });

        Schema::table('aerisweathers', function (Blueprint $table) {
            $table->float('factik')->comment('faktik')->default(0);
        });


        Schema::table('dark_skies', function (Blueprint $table) {
            $table->float('factik')->comment('faktik')->default(0);
        });

        Schema::table('open_weather', function (Blueprint $table) {
            $table->float('factik')->comment('faktik')->default(0);
        });

        Schema::table('uz_hydromets', function (Blueprint $table) {
            $table->float('factik')->comment('faktik')->default(0);
        });

        Schema::table('weather_bits', function (Blueprint $table) {
            $table->float('factik')->comment('faktik')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('accuweathers', function (Blueprint $table) {
            $table->dropColumn('factik');
        });

        Schema::table('aerisweathers', function (Blueprint $table) {
            $table->dropColumn('factik');

        });

        Schema::table('dark_skies', function (Blueprint $table) {
            $table->dropColumn('factik');

        });
        Schema::table('open_weather', function (Blueprint $table) {
            $table->dropColumn('factik');

        });
        Schema::table('uz_hydromets', function (Blueprint $table) {
            $table->dropColumn('factik');

        });

        Schema::table('weather_bits', function (Blueprint $table) {
            $table->dropColumn('factik');

        });
    }
}
