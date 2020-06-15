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
            $table->string('first_name')->unique;
            $table->string('last_name');
            $table->integer('Phone');
            $table->string('address');
            $table->string('city');
            $table->string('email');
            $table->date('date_of_birth');
            $table->string('user_id');
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
