<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAerisweathersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aerisweathers', function (Blueprint $table) {
            $table->id();
            $table->string('region');
            $table->datetime('datetime');
            $table->date('date');
            $table->float('minTempC');
            $table->float('maxTempC');
            $table->float('windSpeedKTS');
            $table->float('windDirDEG');
            $table->string('windDir');
            $table->boolean('precipMM')->default(false);
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
        Schema::dropIfExists('aerisweathers');
    }
}
