<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClassDetails;
use App\Models\Quiz;
use App\Models\QuizQuestion;
use DB;
use Illuminate\Support\Facades\Auth;
class ClassController extends Controller
{
    public function addClasses()
    { 


        $subCategories = DB::table('subject')->where('subj_ID', Auth::guard('teacher')->user()->Teach_stream  )->first();


        return view('teacher.classManagement.addClasses')->with([

            'subCategories'  =>  $subCategories, 
        ]);
    }
  
    public function storeClass(Request $request)
    {        
        $request->validate([
            'Class_image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            'Class_stream' => 'required',
            'Class_date' => 'required',
            'Class_type' => 'required',
            'Class_time' => 'required',
            'price' => 'required',

        ]);



       $file = $request->file('Class_image'); // Retrieve the uploaded file
       $filename = date('YmdHi') . '_' . $file->getClientOriginalName(); // Add a separator for readability
       $file->move(public_path('uploads'), $filename);


        // Create customer
        $Teacher = ClassDetails::create([
            'Teacher_ID' =>   Auth::guard('teacher')->user()->Teacher_ID ,
            'Class_image' => $filename,
            'Class_stream' => $request->Class_stream,
            'status' => 0,
            'Class_date' => $request->Class_date,
            'Class_type' => $request->Class_type,
            'Class_time' => $request->Class_time,
            'price' => $request->price,
        ]);

        return redirect()->back()->with('success', 'Class added Successfully.');
    }

    public function classesList()
    { 

        $classesList = DB::table('class_detail')->join('subject', 'class_detail.Class_stream', '=', 'subject.subj_ID')
        ->where('Teacher_ID', Auth::guard('teacher')->user()->Teacher_ID  )
        ->select('class_detail.*', 'subject.subj_stream as subj_stream1' , 'subject.subj_name as subj_name1' )->get();

        return view('teacher.classManagement.classesList')->with([

            'classesList'  =>  $classesList, 
        ]);
    }

    public function checkStudent($Class_ID)
    { 

        $checkStudentList = DB::table('class_detail')
        ->join('subject', 'class_detail.Class_stream', '=', 'subject.subj_ID')
        ->join('teacher', 'class_detail.Teacher_ID', '=', 'teacher.Teacher_ID')
        ->join('reservation', 'class_detail.Class_ID', '=', 'reservation.Class_ID')
        ->join('student', 'reservation.stu_ID', '=', 'student.stu_ID')
        ->select('student.*', 'subject.subj_stream as subj_stream1' , 'subject.subj_name as subj_name1' , 'teacher.Teach_name as Teach_name1' ,  'student.Stu_name as Stu_name1' )
        ->where('reservation.Class_ID' , $Class_ID)->get();




        return view('teacher.classManagement.checkStudent')->with([

            'checkStudentList'  =>  $checkStudentList, 
        ]);
    }

    public function showAddQuizForm($classId)
    {
        $classDetails = DB::table('class_detail')
            ->join('subject', 'class_detail.Class_stream', '=', 'subject.subj_ID') 
            ->join('teacher', 'class_detail.Teacher_ID', '=', 'teacher.teacher_ID') 
            ->select(
                'class_detail.*',
                'subject.subj_name as subject_name',
                'subject.subj_stream as subject_stream',
                'teacher.Teach_name as teacher_name'
            )
            ->where('class_detail.Class_ID', $classId)
            ->first(); 
// dd($classDetails);
        if (!$classDetails) {
            return redirect()->back()->withErrors(['error' => 'Class not found']);
        }

        return view('teacher.classManagement.addQuiz', compact('classId', 'classDetails'));
    }


    public function storeQuiz(Request $request, $classId)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'questions.*.question' => 'required|string|max:255',
            'questions.*.option1' => 'required|string|max:255',
            'questions.*.option2' => 'required|string|max:255',
            'questions.*.option3' => 'required|string|max:255',
            'questions.*.option4' => 'required|string|max:255',
            'questions.*.correct_option' => 'required|integer|min:1|max:4',
        ]);
    
        // Create the quiz
        $quiz = Quiz::create([
            'class_id' => $classId,
            'title' => $validatedData['title'],
        ]);
    
        // Add questions to the quiz
        foreach ($validatedData['questions'] as $questionData) {
            QuizQuestion::create([
                'quiz_id' => $quiz->id,
                'question' => $questionData['question'],
                'option1' => $questionData['option1'],
                'option2' => $questionData['option2'],
                'option3' => $questionData['option3'],
                'option4' => $questionData['option4'],
                'correct_option' => $questionData['correct_option'],
            ]);
        }
    
        return redirect()->route('quiz.addForm', $classId)->with('success', 'Quiz and questions added successfully.');
    }

}
