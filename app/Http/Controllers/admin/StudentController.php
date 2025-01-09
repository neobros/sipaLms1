<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class StudentController extends Controller
{
    public function studentList()
    {
        $studentList = DB::table('student')->get();
        return view('admin.studentManagement.studentList')->with([
            'studentList'  =>  $studentList, 
        ]);
    }

    public function studentDelete($stu_ID)
    {   
        DB::delete('delete from student where stu_ID = ?',[$stu_ID]);

        return redirect()->back()->with('delete', 'student Delete Successfully.');
    }
}
