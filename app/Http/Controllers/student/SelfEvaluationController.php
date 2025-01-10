<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Payment;
use App\Models\Quiz;
use App\Models\Result;
use App\Models\QuizQuestion;
use Illuminate\Support\Facades\Auth;

class SelfEvaluationController extends Controller
{
    
    public function selfEvaluation()
    {
        $studentId = Auth::guard('student')->user()->stu_ID;

        $paidReservations = Payment::join('reservation', 'payment.Reservation_ID', '=', 'reservation.Reservation_ID')
        ->where('payment.stu_ID', $studentId)->pluck('Class_ID');

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

        $classDetails = DB::table('class_detail')->join('subject', 'class_detail.Class_stream', '=', 'subject.subj_ID')
        ->join('teacher', 'class_detail.Teacher_ID', '=', 'teacher.Teacher_ID')->where('class_detail.Class_ID', $quiz->class_id)
        ->select('class_detail.*', 'subject.subj_stream as subj_stream1' , 'subject.subj_name as subj_name1' , 'teacher.Teach_name as Teach_name1')->first();


        $details = [
            'title' => 'SIPA LMS',
            'body' => "Student Name: $classDetails->subj_name1<br><br>" . // HTML line breaks
                      "Subject Stream: $classDetails->subj_stream1<br><br>" . // HTML line breaks
                      "Student Quiz Marks: $score"
        ];

        
        $email = Auth::guard('student')->user()->parent_email;

        $this->sendEmail($details, $email);

        $Result = Result::create([
            'quizzes_ID' => $quizId,
            'name' => $classDetails->subj_name1,
            'Teach_name' => $classDetails->Teach_name1,
            'subj_stream' => $classDetails->subj_stream1,
            'Class_type' => $classDetails->Class_type,
            'stu_ID' => Auth::guard('student')->user()->stu_ID,
            'marks' => $score,
       
        ]);

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
