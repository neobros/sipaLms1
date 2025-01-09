<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Payment;
use App\Models\Quiz;
use App\Models\QuizQuestion;
use Illuminate\Support\Facades\Auth;

class SelfEvaluationController extends Controller
{
    
    public function selfEvaluation()
    {
        $studentId = Auth::guard('student')->user()->stu_ID;

        $paidReservations = Payment::where('stu_ID', $studentId)->pluck('Reservation_ID');

        // $quizzes = Quiz::whereIn('class_id', $paidReservations)->get();

        $quizzes = DB::table('quizzes')
            ->join('class_detail', 'quizzes.class_id', '=', 'class_detail.Class_ID') 
            ->join('subject', 'class_detail.Class_stream', '=', 'subject.subj_ID') 
            ->join('teacher', 'class_detail.Teacher_ID', '=', 'teacher.teacher_ID') 
            ->select(
                'quizzes.*',
                'subject.subj_name as subject_name',
                'subject.subj_stream as subject_stream',
                'teacher.Teach_name as teacher_name'
            )
            ->whereIn('quizzes.class_id', $paidReservations)
            ->get();

        $SubjectList = DB::table('subject')->select('subj_stream')
        ->distinct()->get();

        return view('student.selfEvaluation')->with([
            'Quizzes' => $quizzes,
            'SubjectList'  =>  $SubjectList,
        ]);
    }

    public function takeQuiz($quizId)
    {
        $quiz = Quiz::with('questions')->findOrFail($quizId);

        $SubjectList = DB::table('subject')->select('subj_stream')
        ->distinct()->get();

         return view('student.takeQuiz', compact('quiz', 'SubjectList'));
    }

    public function submitQuiz(Request $request, $quizId)
    {
        $quiz = Quiz::with('questions')->findOrFail($quizId);
        $answers = $request->input('answers');
        $correctAnswers = 0;
        $results = [];
        
        foreach ($quiz->questions as $question) {
            $isCorrect = $answers[$question->id] == $question->correct_option;
            $results[] = [
                'question' => $question->question,
                'given_answer' => $answers[$question->id],
                'correct_answer' => $question->correct_option,
                'is_correct' => $isCorrect,
            ];
            
            if ($isCorrect) {
                $correctAnswers++;
            }
        }
        
        $totalQuestions = $quiz->questions->count();
        $score = ($correctAnswers / $totalQuestions) * 100;

        $SubjectList = DB::table('subject')->select('subj_stream')
        ->distinct()->get();

        return view('student.quizResult', [
            'quiz' => $quiz,
            'results' => $results,
            'score' => $score,
            'correctAnswers' => $correctAnswers,
            'totalQuestions' => $totalQuestions,
            'SubjectList' => $SubjectList,
        ]);
    }

}
