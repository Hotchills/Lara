<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLarasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laras', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('room');
            $table->string('link');
            $table->string('adress');
            $table->string('location');
            $table->string('duration');
            $table->string('servername');
            $table->string('info1');
            $table->string('info2');
            $table->string('info3');
            $table->timestamp('time');
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
        Schema::dropIfExists('laras');
    }
}
