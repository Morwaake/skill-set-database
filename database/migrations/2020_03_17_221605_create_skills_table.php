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
            $table->Integer('Programming');
            $table->Integer('Networks');
            $table->Integer('Web-Design');
            $table->Integer('Database');
            $table->Integer('Data Analysis');
            $table->Integer('Cybersecurity');
            $table->Integer('AI and machine learning');
            $table->Integer('Application development');
            $table->Integer('user_id')->unique;
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
