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
        Schema::table('visitor_slots', function (Blueprint $table) {
            $table->unsignedBigInteger('doc_id');
			$table->foreign('doc_id')->references('id')->on('doctors')->after('id');
            $table->string('visitor_slot')->after('doc_id');
            $table->string('start_time')->after('visitor_slot');
            $table->string('end_time')->after('start_time');
            $table->string('mr_allowed')->after('end_time');
            $table->string('manager_allowed')->after('mr_allowed');
            $table->string('company_allowed')->after('manager_allowed');
            $table->string('day')->after('company_allowed');
            $table->enum('status',['Enable','Disable'])->default('Disable')->after('day');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('visitor_slots', function (Blueprint $table) {
            //
        });
    }
};
