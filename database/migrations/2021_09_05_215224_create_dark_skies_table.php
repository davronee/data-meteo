<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDarkSkiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dark_skies', function (Blueprint $table) {
            $table->id();
            $table->string('region');
            $table->dateTime('datetime');
            $table->date('date');
            $table->float('temperatureMin');
            $table->float('temperatureMax');
            $table->float('windSpeed');
            $table->boolean('precipIntensityMax')->default(false);
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
        Schema::dropIfExists('dark_skies');
    }
}
