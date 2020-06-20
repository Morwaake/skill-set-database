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
            $table->Integer('Programming')->default(0);
            $table->Integer('Networks')->default(0);
            $table->Integer('Web-Design')->default(0);
            $table->Integer('Database')->default(0);
            $table->Integer('Data Analysis')->default(0);
            $table->Integer('Cybersecurity')->default(0);
            $table->Integer('AI and machine learning')->default(0);
            $table->Integer('Application development')->default(0);
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
