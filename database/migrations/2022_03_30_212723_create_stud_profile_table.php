<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stud_profile', function (Blueprint $table) {
            $table->id();
            $table->string('stud_id')->nullable();
            $table->string('stud_num')->nullable();
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('course')->nullable();
            $table->string('name')->nullable();
            $table->string('school_name')->nullable();
            $table->string('yr_lvl')->nullable();
            $table->string('section')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_num')->nullable();
            $table->string('parent_num')->nullable();
            $table->string('address')->nullable();
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
        Schema::dropIfExists('stud_profile');
    }
}
