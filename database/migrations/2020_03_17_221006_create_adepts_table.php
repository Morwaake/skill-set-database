<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdeptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adepts', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('place_worked')->nullable();
            $table->date('year_started_working')->nullable();
            $table->date('year_ended_working')->nullable();
            $table->string('languages');
            $table->integer('Phone')->unique;
            $table->string('address');
            $table->string('city');
            $table->string('email')->unique;
            $table->date('date_of_birth');
            $table->integer('user_id')->unique;
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
        Schema::dropIfExists('adepts');
    }
}
