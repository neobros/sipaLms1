<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function feedbacks()
    { 
        $feedbacks = DB::table('feedback')->join('student', 'feedback.stu_ID', '=', 'student.stu_ID')->where('Teacher_ID' ,Auth::guard('teacher')->user()->Teach_stream )->select('feedback.id','Stu_name' ,'message' ,'feedback.updated_at')->orderBy('feedback.id', 'desc')->get();

        return view('teacher.feedbackManagement.feedbacks')->with([

            'feedbacks'  =>  $feedbacks, 
        ]);
    }

    public function feedbackDelete($id)
    {   
        DB::delete('delete from feedback where id = ?',[$id]);

        return redirect()->back()->with('delete', 'Feedback Delete Successfully.');
    }



}
