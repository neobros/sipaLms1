<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Teacher;
class TeacherController extends Controller
{
    public function newTeachersList()
    {
        $newTeacherList = DB::table('teacher')
        ->join('subject', 'teacher.Teach_stream', '=', 'subject.subj_ID')->where('Status' ,0)->get();

        return view('admin.teachersManagement.newTeachersList')->with([
            'newTeacherList'  =>  $newTeacherList, 
        ]);
    }

    public function teachersList()
    {
        $teacherList = DB::table('teacher')->join('subject', 'teacher.Teach_stream', '=', 'subject.subj_ID')->where('Status' ,1)->get();
        return view('admin.teachersManagement.teachersList')->with([
            'teacherList'  =>  $teacherList, 
        ]);
    }

    public function openTeacherCV($Teacher_ID)
    {
        $cvData = DB::table('teacher')->where('Teacher_ID' ,$Teacher_ID)->first();

        $filePath = public_path('uploads/' . $cvData->Teacher_CV);

        if (file_exists($filePath)) {
            return response()->file($filePath);
        } else {
            return redirect()->back()->with('delete', 'File not found!');
        }
    }

    public function ApproveTeacher($Teacher_ID)
    {
        $update = [
            'Status' => 1,
        ];

        Teacher::where('Teacher_ID',$Teacher_ID)->update($update);
        return redirect()->back()->with('success', 'Teacher Approved Successfully!');

    }

    public function RejectTeacher($Teacher_ID)
    {
        DB::delete('delete from teacher where Teacher_ID = ?',[$Teacher_ID]);
    
        return redirect()->back()->with('delete', 'Teacher Rejected Successfully.');
    }


    public function addTimeSlot()
    {
        $TeacherList = DB::table('teacher')
        ->join('subject', 'teacher.Teach_stream', '=', 'subject.subj_ID')->where('Status' ,0)->get();

        return view('admin.timeManagement.addTimeSlot')->with([
            'TeacherList'  =>  $TeacherList, 
        ]);
    }

}
