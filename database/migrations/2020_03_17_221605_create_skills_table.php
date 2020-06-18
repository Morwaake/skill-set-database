<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->Integer('Programming')->nullable;
            $table->Integer('Networks')->nullable;
            $table->Integer('Web-Design')->nullable;
            $table->Integer('Database')->nullable;
            $table->Integer('Data Analysis')->nullable;
            $table->Integer('Cybersecurity')->nullable;
            $table->Integer('AI and machine learning')->nullable;
            $table->Integer('Application development')->nullable;
            $table->Integer('user_id');
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
        Schema::dropIfExists('skills');
    }
}
