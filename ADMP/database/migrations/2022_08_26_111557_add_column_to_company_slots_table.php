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
        Schema::table('company_slots', function (Blueprint $table) {
            $table->unsignedBigInteger('doc_id');
			$table->foreign('doc_id')->references('id')->on('doctors')->after('id');
            $table->string('cday')->after('doc_id');
            $table->string('cslot_morning_to')->default('null')->after('cday');
            $table->string('cslot_morning_from')->default('null')->after('cslot_morning_to');
            $table->string('cslot_afternoon_to')->default('null')->after('cslot_morning_from');
            $table->string('cslot_afternoon_from')->default('null')->after('cslot_afternoon_to');
            $table->string('cslot_evening_to')->default('null')->after('cslot_afternoon_from');
            $table->string('cslot_evening_from')->default('null')->after('cslot_evening_to');
            $table->string('cno_slots')->after('cslot_evening_from');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('company_slots', function (Blueprint $table) {
            //
        });
    }
};
