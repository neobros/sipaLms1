<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Teacher;
use DB;

class HomeController extends Controller
{

    public function tobeTeacher()
    { 
        return view('teacher.login')->with([
        ]);
    }
  

    public function registerTeacher()
    { 
        return view('teacher.register')->with([
        ]);
    }
  

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

 
        if (Auth::guard('teacher')->attempt($credentials)) {

            $teacherCheck = DB::table('teacher')->where('username' ,$request->username)->first();

            if($teacherCheck->Status == 0)
            {
                Auth::guard('teacher')->logout();

                request()->session()->invalidate();
        
                request()->session()->regenerateToken();

                return redirect()->back()->with('delete',  'Not accept your request!');
            }

            return redirect()->intended('/teacher/dashboard')->with('success', 'Login Successfully.');
        }
        return redirect()->back()->with('delete',  'These credentials do not match our records!');

    }

    public function register(Request $request)
    {        
        // Validate form data
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'Teach_image.*' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            'Teacher_CV' => 'required|mimes:pdf,doc,docx|max:2048',
            'Teach_email' => 'required|string||max:255',
            'username' => 'required|string|max:255|unique:teacher',
            'password' => 'required|string|min:8|confirmed',
            'Teach_phone' => 'required|digits:10',
            'Teach_stream' => 'required',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
       // dd("dsd");

       $file = $request->file('Teach_image'); // Retrieve the uploaded file
       $filename = date('YmdHi') . '_' . $file->getClientOriginalName(); // Add a separator for readability
       $file->move(public_path('uploads'), $filename);

       $fileCV = $request->file('Teacher_CV'); // Retrieve the uploaded file
       $filenameCv = date('YmdHi') . '_' . $fileCV->getClientOriginalName(); // Add a separator for readability
       $fileCV->move(public_path('uploads'), $filenameCv);


    
        // Create customer
        $Teacher = Teacher::create([
            'Teacher_CV' => $filenameCv,
            'Teach_image' => $filename,
            'Teach_stream' => $request->Teach_stream,
            'Status' => 0,
            'Teach_address' => $request->Teach_address,
            'password' => Hash::make($request->password),
            'Teach_name' => $request->Teach_name,
            'Teach_email' => $request->Teach_email,
            'Teach_nic' => $request->Teach_nic,
            'Teach_phone' => $request->Teach_phone,
            'username' => $request->username,
        ]);

        //Auth::guard('teacher')->login($Teacher);

        // Redirect to customer dashboard or any other route
        return redirect()->intended('/')->with('success', 'Registration Successfully , Need admin approval !! Please wait.');
    }

    public function logout()
    {
        Auth::guard('teacher')->logout();

        // Optionally invalidate the session
        request()->session()->invalidate();

        // Regenerate session token to prevent session fixation attacks
        request()->session()->regenerateToken();

        // Redirect to the homepage or login page
        return redirect('/teacher/TobeTeacher')->with('success', 'Successfully logged out');
    }


    
    public function getSubCategories(Request $request)
    {  
        $subj_stream = $request->category;

        $subCategories = DB::table('subject')->where('subj_stream',$subj_stream )->get();

        return response()->json(['subCategories' => $subCategories]);
    }


    public function dashboard()
    { 


        $classesCount = DB::table('class_detail')
        ->where('Teacher_ID', Auth::guard('teacher')->user()->Teacher_ID)->count();


        $StudentCount = DB::table('reservation')
        ->where('Teacher_ID', Auth::guard('teacher')->user()->Teacher_ID)->count();

        $allEarnings = DB::table('reservation')
        ->join('payment', 'reservation.Reservation_ID', '=', 'payment.Reservation_ID')
        ->where('Teacher_ID', Auth::guard('teacher')->user()->Teacher_ID)->sum('payment.amount');


        return view('teacher.dashboard')->with([

            'classesCount'  =>  $classesCount, 
            'StudentCount'  =>  $StudentCount, 
            'allEarnings'  =>   $allEarnings, 


        ]);
    }
}
