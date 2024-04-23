<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableAwsStatusAddColumnIsPublished extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('aws_statuses', function (Blueprint $table) {
            $table->tinyInteger('is_published')->after('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('aws_statuses', function (Blueprint $table) {
            $table->dropColumn('is_published');
        });
    }
}
