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
        Schema::table('drspecialities', function (Blueprint $table) {
            $table->unsignedBigInteger('doctor_id');
			$table->foreign('doctor_id')->references('id')->on('doctors')->after('id');
            $table->string('title')->after('doctor_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('drspecialities', function (Blueprint $table) {
            //
        });
    }
};
