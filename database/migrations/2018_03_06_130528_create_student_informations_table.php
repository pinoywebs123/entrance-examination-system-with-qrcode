<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_informations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('fname');
            $table->string('mname');
            $table->string('lname');
            $table->string('contact');
            $table->string('address');
            $table->string('pbirth');
            $table->string('dob');
            $table->string('age');
            $table->string('sex');
            $table->string('status');
            $table->string('height');
            $table->string('width');
            $table->string('citizenship');
            $table->string('religion');
            $table->string('refered_study_norsu');
            $table->string('brosis');
            $table->string('brosis_year_level');
            $table->string('father_name');
            $table->string('father_occupation');
            $table->string('father_contact');
            $table->string('father_education');
            $table->string('father_address');
            $table->string('mother_name');
            $table->string('mother_occupation');
            $table->string('mother_contact');
            $table->string('mother_education');
            $table->string('mother_address');
            $table->string('my_elementary');
            $table->string('my_elementary_year');
            $table->string('my_highschool');
            $table->string('my_highschool_year');
            $table->string('my_college');
            $table->string('my_college_year');
            $table->text('why_study_norsu');
            $table->text('major_area');
            $table->string('department');
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
        Schema::dropIfExists('student_informations');
    }
}
