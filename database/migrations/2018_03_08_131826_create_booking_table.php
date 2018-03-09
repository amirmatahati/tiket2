<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_fight', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name');
			$table->string('email');
			$table->string('form');
			$table->string('to');
			$table->integer('adults');
			$table->integer('children');
			$table->string('travel_class');
			$table->date('date_on');
			$table->string('journey_type');
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
        Schema::dropIfExists('booking_fight');
    }
}
