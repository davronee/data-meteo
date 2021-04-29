<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAwsStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aws_statuses', function (Blueprint $table) {
            $table->date('date');
            $table->unsignedBigInteger('aws_id')->nullable();
            $table->foreign('aws_id')->references('id')->on('aws');
            // 1-soz, 0-nosoz, -1-noaniq
            $table->tinyInteger('status');
            $table->timestamps();

            $table->unique(['date', 'aws_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aws_statuses');
    }
}
