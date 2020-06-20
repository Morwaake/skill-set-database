<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendingSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pending__skills', function (Blueprint $table) {
            $table->id();
            $table->Integer('Programming')->default(0);
            $table->Integer('Networks')->default(0);
            $table->Integer('Web_Design')->default(0);
            $table->Integer('Database')->default(0);
            $table->Integer('Data_Analysis')->default(0);
            $table->Integer('Cybersecurity')->default(0);
            $table->Integer('AI_and_machine_learning')->default(0);
            $table->Integer('Application_development')->default(0);
            $table->Integer('user_id')->unique();
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
        Schema::dropIfExists('pending__skills');
    }
}
