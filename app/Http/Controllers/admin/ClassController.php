<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class ClassController extends Controller
{
    public function classesList($id)
    { 
      
        $classesList = DB::table('class_detail')->join('subject', 'class_detail.Class_stream', '=', 'subject.subj_ID')
        ->join('teacher', 'class_detail.Teacher_ID', '=', 'teacher.Teacher_ID')
        ->where('subject.subj_stream', $id )
        ->select('class_detail.*', 'subject.subj_stream as subj_stream1' , 'subject.subj_name as subj_name1' ,'teacher.Teach_name as Teach_name1' )->get();

        return view('admin.classManagement.classesList')->with([

            'classesList'  =>  $classesList, 
            'id'  =>  $id, 
        ]);
    }
}
