<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaskapaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maskapai', function (Blueprint $table) {
            $table->increments('id');
			$table->time('time_go');
			$table->time('transit');
			$table->string('durasi');
			$table->integer('id_pesawat');
			$table->integer('price');
			$table->integer('id_fasilita');
			$table->integer('go_away');
			$table->integer('tujuan');
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
        Schema::dropIfExists('maskapai');
    }
}
