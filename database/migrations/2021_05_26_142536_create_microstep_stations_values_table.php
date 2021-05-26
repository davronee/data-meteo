<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMicrostepStationsValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('microstep_stations_values', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('station_id');
            $table->foreign('station_id')->references('id')->on('microstep_stations');
            $table->dateTime('datetime')->nullable()->comment('datetime');
            $table->double('Ta')->nullable()->comment('°C температура воздуха за измеряемый период');
            $table->double('R')->nullable()->comment('% s влажность');
            $table->double('Td')->nullable()->comment('°C точка росы');
            $table->double('Ta_avr')->nullable()->comment('°C температура воздуха за последние 3 часа');
            $table->double('Ta_max')->nullable()->comment('°C температура воздуха за последние 3 час');
            $table->double('P')->nullable()->comment('mB s Измеренное давление');
            $table->double('P_sl')->nullable()->comment('mB Давление, приведенное к уровню моря');
            $table->double('a')->nullable()->comment('барическая тенденция');
            $table->double('ff_avr')->nullable()->comment('m/s скорость ветра средняя');
            $table->double('ff_gust')->nullable()->comment('m/s	скорость ветра в порыве (максимальная)');
            $table->double('dd_avr')->nullable()->comment('°C направление ветра');
            $table->double('Ts5')->nullable()->comment('°C температура почвы на глубине 5см');
            $table->double('Ts10')->nullable()->comment('°C');
            $table->double('Ts20')->nullable()->comment('°C');
            $table->double('Ts30')->nullable()->comment('°C');
            $table->double('Ts50')->nullable()->comment('°C');
            $table->double('Ts100')->nullable()->comment('°C');
            $table->double('Hsnow')->nullable()->comment('cm высота снежного покрова');
            $table->double('RR')->nullable()->comment('mm кол-во осадков за измеряемый период (5мин – 60мин)');
            $table->double('RR_12')->nullable()->comment('mm RR_12 mm кол-во осадков за последние 12 часов');
            $table->double('RR_24')->nullable()->comment('mm RR_12 mm RR_24 mm	кол-во осадков за последние 24 часа');
            $table->double('soil_moisture')->nullable()->comment('V% влажность почвы на глубине 15 см.');
            $table->double('battery')->nullable()->comment('battery');
            $table->double('altitude')->nullable()->comment('a.s.l. высота станции');
            $table->double('Ta_12h_avr')->nullable()->comment('°C температура воздуха за последние 12 часов');
            $table->double('Ta_12h_min')->nullable()->comment('°C температура воздуха за последние 12 часов');
            $table->double('Ta_12h_max')->nullable()->comment('°C температура воздуха за последние 12 часов');
            $table->double('ff_gust_12h')->nullable()->comment('m/s сскорость ветра в порыве (максимальная) за последние 12 часов');
            $table->double('ff_gust_3h')->nullable()->comment('m/s скорость ветра в порыве (максимальная) за последние 3 часа');
            $table->double('ff_gust_1h')->nullable()->comment('m/s ff_gust_1h m/s	скорость ветра в порыве (максимальная) за последние 1 час');
            $table->double('SunRad')->nullable()->comment('w/mсолнечная радиация Вт/кв.м.');
            $table->string('path')->nullable();
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
        Schema::dropIfExists('microstep_stations_values');
    }
}
