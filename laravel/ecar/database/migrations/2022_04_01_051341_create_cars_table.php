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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
			$table->unsignedBigInteger('cate_id');
			$table->foreign('cate_id')->references('id')->on('cats');
			$table->string('title');
			$table->string('price');
			$table->string('days');
			$table->string('img');
			$table->longText('des');
			$table->enum('advstatus',['Pending','Approved'])->default('Pending');
			$table->enum('status',['Block','Unblock'])->default('Unblock');
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
        Schema::dropIfExists('cars');
    }
};
