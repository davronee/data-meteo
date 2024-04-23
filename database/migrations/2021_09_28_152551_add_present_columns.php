<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPresentColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accuweathers', function (Blueprint $table) {
            $table->float('temp_precent')->comment('prognoz berilayotgan tempraturaning hozirgi vaqtdagi havo harorati bilan nechi foiz togriligi')->default(0);
            $table->float('wind_precent')->comment('prognoz berilayotgan shamol tezligining hozirgi vaqtdagi bilan nechi foiz togriligi')->default(0);
            $table->float('rain_precent')->comment('prognoz berilayotgan yomgirning hozirgi vaqtdagi  bilan nechi foiz togriligi')->default(0);
        });

        Schema::table('aerisweathers', function (Blueprint $table) {
            $table->float('temp_precent')->comment('prognoz berilayotgan tempraturaning hozirgi vaqtdagi havo harorati bilan nechi foiz togriligi')->default(0);
            $table->float('wind_precent')->comment('prognoz berilayotgan shamol tezligining hozirgi vaqtdagi bilan nechi foiz togriligi')->default(0);
            $table->float('rain_precent')->comment('prognoz berilayotgan yomgirning hozirgi vaqtdagi  bilan nechi foiz togriligi')->default(0);
        });


        Schema::table('dark_skies', function (Blueprint $table) {
            $table->float('temp_precent')->comment('prognoz berilayotgan tempraturaning hozirgi vaqtdagi havo harorati bilan nechi foiz togriligi')->default(0);
            $table->float('wind_precent')->comment('prognoz berilayotgan shamol tezligining hozirgi vaqtdagi bilan nechi foiz togriligi')->default(0);
            $table->float('rain_precent')->comment('prognoz berilayotgan yomgirning hozirgi vaqtdagi  bilan nechi foiz togriligi')->default(0);
        });

        Schema::table('open_weather', function (Blueprint $table) {
            $table->float('temp_precent')->comment('prognoz berilayotgan tempraturaning hozirgi vaqtdagi havo harorati bilan nechi foiz togriligi')->default(0);
            $table->float('wind_precent')->comment('prognoz berilayotgan shamol tezligining hozirgi vaqtdagi bilan nechi foiz togriligi')->default(0);
            $table->float('rain_precent')->comment('prognoz berilayotgan yomgirning hozirgi vaqtdagi  bilan nechi foiz togriligi')->default(0);
        });

        Schema::table('uz_hydromets', function (Blueprint $table) {
            $table->float('temp_precent')->comment('prognoz berilayotgan tempraturaning hozirgi vaqtdagi havo harorati bilan nechi foiz togriligi')->default(0);
            $table->float('wind_precent')->comment('prognoz berilayotgan shamol tezligining hozirgi vaqtdagi bilan nechi foiz togriligi')->default(0);
            $table->float('rain_precent')->comment('prognoz berilayotgan yomgirning hozirgi vaqtdagi  bilan nechi foiz togriligi')->default(0);
        });

        Schema::table('weather_bits', function (Blueprint $table) {
            $table->float('temp_precent')->comment('prognoz berilayotgan tempraturaning hozirgi vaqtdagi havo harorati bilan nechi foiz togriligi')->default(0);
            $table->float('wind_precent')->comment('prognoz berilayotgan shamol tezligining hozirgi vaqtdagi bilan nechi foiz togriligi')->default(0);
            $table->float('rain_precent')->comment('prognoz berilayotgan yomgirning hozirgi vaqtdagi  bilan nechi foiz togriligi')->default(0);
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
            $table->dropColumn('temp_precent');
            $table->dropColumn('wind_precent');
            $table->dropColumn('rain_precent');
        });

        Schema::table('aerisweathers', function (Blueprint $table) {
            $table->dropColumn('temp_precent');
            $table->dropColumn('wind_precent');
            $table->dropColumn('rain_precent');
        });

        Schema::table('dark_skies', function (Blueprint $table) {
            $table->dropColumn('temp_precent');
            $table->dropColumn('wind_precent');
            $table->dropColumn('rain_precent');
        });
        Schema::table('open_weather', function (Blueprint $table) {
            $table->dropColumn('temp_precent');
            $table->dropColumn('wind_precent');
            $table->dropColumn('rain_precent');
        });
        Schema::table('uz_hydromets', function (Blueprint $table) {
            $table->dropColumn('temp_precent');
            $table->dropColumn('wind_precent');
            $table->dropColumn('rain_precent');
        });

        Schema::table('weather_bits', function (Blueprint $table) {
            $table->dropColumn('temp_precent');
            $table->dropColumn('wind_precent');
            $table->dropColumn('rain_precent');
        });
    }
}
