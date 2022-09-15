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
        Schema::table('diagnosis', function (Blueprint $table) {
            $table->unsignedBigInteger('appoinment_id');
            $table->foreign('appoinment_id')->references('id')->on('appointments')->after('id');
            $table->unsignedBigInteger('patient_id');
            $table->foreign('patient_id')->references('id')->on('patients')->after('appoinment_id');
            $table->String('problems')->after('patient_id');
            $table->String('diagnosis')->after('problems');
            $table->String('care_suggestion')->after('diagnosis');
            $table->String('reports')->after('care_suggestion');
            $table->enum('status',['Pending','Approved'])->default('Pending')->after('reports');
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
        Schema::table('diagnosis', function (Blueprint $table) {
            //
        });
    }
};
