<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_detail', function (Blueprint $table) {
            $table->increments('Class_ID');
            $table->integer('Teacher_ID');
            $table->integer('Class_stream');
            $table->string('Class_date');
            $table->string('Class_image');
            $table->string('Class_type');
            $table->string('Class_time');
            $table->integer('price');
            $table->integer('status');    
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
        Schema::dropIfExists('class_detail');
    }
}
