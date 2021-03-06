<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
	public function boot()
	{
		Schema::defaultStringLength(191);
	}
    public function up()
    {
        Schema::create('detail_user', function (Blueprint $table) {
            $table->increments('id');
			$table->string('gender');
			$table->string('citizen');
			$table->string('province');
			$table->string('district');
			$table->string('city');
			$table->string('address');
			$table->string('postal_code');
			$table->datetime('birth_days');
			$table->integer('user_id');
			$table->integer('status');
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
        Schema::dropIfExists('detail_user');
    }
}
