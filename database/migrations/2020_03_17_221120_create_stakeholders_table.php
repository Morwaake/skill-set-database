<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStakeholdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stakeholders', function (Blueprint $table) {
            $table->id();
            $table->string('s_name')->unique;
            $table->string('email')->unique;
            $table->integer('number')->unique;
            $table->string('address');
            $table->string('city');
            $table->string('location');
            $table->boolean('status');
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
        Schema::dropIfExists('stakeholders');
    }
}
