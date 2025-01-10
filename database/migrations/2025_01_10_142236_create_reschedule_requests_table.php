<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRescheduleRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reschedule_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('teacher_id'); 
            $table->string('subject_name'); 
            $table->string('teacher_name');
            $table->date('reschedule_date');
            $table->time('reschedule_time');
            $table->text('note'); 
            $table->string('status')->default('pending'); 
            $table->text('teacher_reply')->nullable(); 
            $table->string('link')->nullable(); 
            $table->timestamp('reply_date')->nullable(); 
            $table->timestamps();
    
            $table->foreign('class_id')->references('Class_ID')->on('class_detail')->onDelete('cascade');
            $table->foreign('teacher_id')->references('Teacher_ID')->on('teacher')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reschedule_requests');
    }
}
