<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_questions', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('quiz_id'); // Foreign key for the quiz
            $table->string('question'); // The question text
            $table->string('option1'); // Option 1
            $table->string('option2'); // Option 2
            $table->string('option3'); // Option 3
            $table->string('option4'); // Option 4
            $table->unsignedTinyInteger('correct_option'); // Correct option (1-4)
            $table->timestamps();

            $table->foreign('quiz_id')->references('id')->on('quizzes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quiz_questions');
    }
}
