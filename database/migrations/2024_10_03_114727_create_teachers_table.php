<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher', function (Blueprint $table) {
            $table->increments('Teacher_ID');
            $table->string('Teacher_CV');
            $table->integer('Status');
            $table->string('Teach_address');
            $table->string('Teach_name');
            $table->string('Teach_stream');
            $table->string('Teach_email');
            $table->string('password');
            $table->string('Teach_phone');
            $table->string('Teach_nic');
            $table->string('Teach_image');
            $table->string('username')->unique();
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
        Schema::dropIfExists('teacher');
    }
}
