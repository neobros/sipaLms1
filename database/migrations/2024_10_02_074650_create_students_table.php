<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student', function (Blueprint $table) {
            $table->increments('stu_ID');
            $table->string('Stu_email')->unique();
            $table->string('Stu_image')->nullable();
            $table->string('Stu_name');
            $table->string('Subj_stream');
            $table->string('username');
            $table->string('Stu_contactnumber');
            $table->string('parent_email')->nullable();
            $table->string('password');       
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
        Schema::dropIfExists('student');
    }
}
