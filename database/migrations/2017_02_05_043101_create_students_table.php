<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
             $table->increments('id');
             $table->string('lrn')->unique()->nullable();
             $table->string('registration_code')->nullable();
             $table->string('first_name');
             $table->string('middle_name')->nullable();
             $table->string('last_name');
             $table->string('gender');
             $table->date('birthdate');
             $table->string('status');
             $table->string('grade_level');
             $table->string('form137')->nullable();
             $table->string('birth_certificate')->nullable();
             $table->string('id_picture')->nullable();
             $table->string('guardian_name');
             $table->string('address');
             $table->string('mobile_number')->nullable();
             $table->string('tel_number')->nullable();
             $table->double('general_average', 15, 2);
             $table->string('last_school_attended')->nullable();
             $table->string('year_graduated')->nullable();
             $table->integer('enrolled')->nullable()->default(1);
             $table->timestamps();
             $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('students');
    }
}
