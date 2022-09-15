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
        Schema::table('prescriptions', function (Blueprint $table) {
            $table->unsignedBigInteger('appoinment_id');
            $table->foreign('appoinment_id')->references('id')->on('appointments')->after('id');
            $table->unsignedBigInteger('patient_id');
            $table->foreign('patient_id')->references('id')->on('patients')->after('appoinment_id');
            $table->String('medicine_name')->after('patient_id');
            $table->String('medicine_Quantity')->after('medicine_name');
            $table->String('medicine_take_Days')->after('medicine_Quantity');
            $table->String('medicine_take_Time')->after('medicine_take_Days');
            $table->String('medicine_dose')->after('medicine_take_Time');
            $table->enum('status',['Pending','Approved'])->default('Pending')->after('medicine_dose');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prescriptions', function (Blueprint $table) {
            //
        });
    }
};
