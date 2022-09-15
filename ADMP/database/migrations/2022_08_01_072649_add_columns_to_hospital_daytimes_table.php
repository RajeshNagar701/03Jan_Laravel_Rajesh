<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hospital_daytimes', function (Blueprint $table) {
            $table->unsignedBigInteger('doctor_id');
			$table->foreign('doctor_id')->references('id')->on('doctors')->after('id');
            $table->string('day')->after('doctor_id');
            $table->string('morning_time')->after('day');
            $table->string('evening_time')->after('morning_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hospital_daytimes', function (Blueprint $table) {
            //
        });
    }
};
