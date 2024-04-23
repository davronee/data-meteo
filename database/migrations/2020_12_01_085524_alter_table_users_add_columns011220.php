<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableUsersAddColumns011220 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('fullname', 255)->nullable()->after('email');
            $table->string('firstname', 150)->nullable()->after('fullname');
            $table->string('lastname', 150)->nullable()->after('firstname');
            $table->string('middlename', 150)->nullable()->after('lastname');

            $table->string('phone', 10)->nullable()->after('middlename');
            $table->string('stir', 9)->nullable()->after('phone');
            $table->string('pinfl', 15)->nullable()->after('stir');

            $table->string('passport', 10)->nullable()->after('pinfl');
            $table->date('passport_expire')->nullable()->after('passport');
            $table->string('passport_address')->nullable()->after('passport_expire');

            $table->unsignedInteger('region_id')->nullable()->after('passport_address');
            $table->unsignedInteger('district_id')->nullable()->after('region_id');
            $table->unsignedBigInteger('station_id')->nullable()->after('district_id');

            // 0 - inactive, 1 - active
            $table->tinyInteger('is_active')->default(1)->after('station_id');
            $table->softDeletes()->after('updated_at');

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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('fullname');
            $table->dropColumn('firstname');
            $table->dropColumn('lastname');
            $table->dropColumn('middlename');
            $table->dropColumn('phone');
            $table->dropColumn('stir');
            $table->dropColumn('pinfl');
            $table->dropColumn('passport');
            $table->dropColumn('passport_expire');
            $table->dropColumn('passport_address');
            $table->dropColumn('region_id');
            $table->dropColumn('district_id');
            $table->dropColumn('station_id');
            $table->dropColumn('is_active');
        });
    }
}
