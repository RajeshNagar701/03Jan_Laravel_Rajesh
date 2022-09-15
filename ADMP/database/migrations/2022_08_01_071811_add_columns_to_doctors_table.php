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
        Schema::table('doctors', function (Blueprint $table) {
            $table->string('gender')->after('id');
            $table->string('first_name')->after('gender');
            $table->string('last_name')->after('first_name');
            $table->unsignedBigInteger('specialist_id');
			$table->foreign('specialist_id')->references('id')->on('specialists')->after('last_name');
            $table->string('short_tittle')->after('specialist_id');
            $table->string('email')->after('short_tittle');
            $table->string('password')->after('email');
            $table->string('dob')->after('password');
            $table->string('profile_img')->after('dob');
            $table->string('liacence_no')->after('profile_img');
            $table->string('education')->after('liacence_no');
            $table->string('experience')->after('education');
            $table->string('hospital_name')->after('experience');
            $table->string('hospital_img')->after('hospital_name');
            $table->string('dr_mobile')->after('hospital_img');
            $table->string('office_no')->after('dr_mobile');
            $table->string('visit_card')->after('office_no');
            $table->string('about')->after('visit_card');
            $table->unsignedBigInteger('state');
			$table->foreign('state')->references('id')->on('states')->after('about');
            $table->unsignedBigInteger('city');
			$table->foreign('city')->references('id')->on('cities')->after('state');
            $table->unsignedBigInteger('area');
			$table->foreign('area')->references('id')->on('areas')->after('city');
            $table->string('address')->after('city');
            $table->string('pincode')->after('address');
            $table->string('google_map')->after('pincode');
            $table->string('day')->after('google_map');
            $table->string('hospital_morning_to')->default('Null')->after('day');
            $table->string('hospital_morning_from')->default('Null')->after('hospital_morning_to');
            $table->string('hospital_afternoon_to')->default('Null')->after('hospital_morning_from');
            $table->string('hospital_afternoon_from')->default('Null')->after('hospital_afternoon_to');
            $table->string('hospital_evening_to')->default('Null')->after('hospital_afternoon_from');
            $table->string('hospital_evening_from')->default('Null')->after('hospital_evening_to');
            $table->string('consulting_fees')->after('hospital_evening_from');
            $table->string('followup_fees')->after('consulting_fees');
            $table->string('notification')->after('followup_fees');
            $table->enum('doctor_status',['Block','Unblock'])->default('Unblock')->after('notification');
            $table->enum('hospital_status',['Available','Not Available'])->default('Available')->after('doctor_status');
            $table->enum('visitor_status',['Available','Not Available'])->default('Available')->after('hospital_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('doctors', function (Blueprint $table) {
            //
        });
    }
};
