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
        Schema::table('stockiests', function (Blueprint $table) {
            $table->unsignedBigInteger('company_id');
			$table->foreign('company_id')->references('id')->on('companies')->default('Null')->after('id');
            $table->unsignedBigInteger('manager_id');
			$table->foreign('manager_id')->references('id')->on('managers')->default('Null')->after('company_id');
            $table->string('name')->after('manager_id');
            $table->string('state')->after('name');
            $table->string('city')->after('state');
            $table->string('area')->after('city');
            $table->string('address')->after('area');
            $table->string('pincode')->after('address');
            $table->enum('status',['Block','Unblock'])->default('Unblock')->after('pincode');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stockiests', function (Blueprint $table) {
            //
        });
    }
};
