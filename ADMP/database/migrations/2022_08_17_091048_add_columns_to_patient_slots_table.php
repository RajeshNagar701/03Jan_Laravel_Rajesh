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
        Schema::table('patient_slots', function (Blueprint $table) {
            $table->unsignedBigInteger('doc_id');
			$table->foreign('doc_id')->references('id')->on('doctors')->after('id');
            $table->string('day')->after('doc_id');
            $table->string('slot_timing')->after('day');
            $table->string('time')->after('slot_timing');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patient_slots', function (Blueprint $table) {
            //
        });
    }
};
