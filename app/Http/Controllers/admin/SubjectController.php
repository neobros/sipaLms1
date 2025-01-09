<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use DB;
class SubjectController extends Controller
{
    public function addSubjects()
    {
        $subjectList = DB::table('subject')->get();
        return view('admin.subjectManagement.addSubjects')->with([
            'subjectList'  =>  $subjectList, 
        ]);
    }
  


    public function storeSubjects(Request $request)
    {
        $request->validate([
            'subj_name' => 'required|string|max:255',
            'subj_stream' => 'required|string|max:255',
         ]);

        // Create customer
        $customer = Subject::create([
            'subj_name' => $request->subj_name,
            'subj_stream' => $request->subj_stream, 
        ]);

        return redirect()->back()->with([
            'success'  =>  'Subject Added Successfully.', 
        ]);

    }

    public function subjectDelete($subj_ID)
    {   
        DB::delete('delete from subject where subj_ID = ?',[$subj_ID]);

        return redirect()->back()->with('delete', 'Subject Delete Successfully.');
    }
}
