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
        Schema::table('appointments', function (Blueprint $table) {
            $table->unsignedBigInteger('doc_id');
			$table->foreign('doc_id')->references('id')->on('doctors')->after('id');
            $table->unsignedBigInteger('patient_id');
			$table->foreign('patient_id')->references('id')->on('patients')->after('doc_id');
            $table->string('report_img')->after('patient_id');
            $table->string('date')->after('report_img');
            $table->string('comment')->after('date');
            $table->string('time')->after('comment');
            $table->enum('appointment_status',['Approved','Pending'])->default('Pending')->after('comment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('appointments', function (Blueprint $table) {
            //
        });
    }
};
