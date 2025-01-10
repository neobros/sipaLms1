<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\Reservation;
use App\Models\Payment;
use App\Models\Feedback;
use App\Models\RescheduleRequest;
use DB;
class HomeController extends Controller
{

    public function home()
    {
        $TeacherList = DB::table('teacher')
        ->join('subject', 'teacher.Teach_stream', '=', 'subject.subj_ID')->where('Status' ,1)->get();

        $classesList = DB::table('class_detail')->join('subject', 'class_detail.Class_stream', '=', 'subject.subj_ID')
        ->join('teacher', 'class_detail.Teacher_ID', '=', 'teacher.Teacher_ID')
        ->select('class_detail.*', 'subject.subj_stream as subj_stream1' , 'subject.subj_name as subj_name1' , 'teacher.Teach_name as Teach_name1')->limit(3)->get();
        

        $SubjectList = DB::table('subject')->select('subj_stream')
        ->distinct()->get();

        $advertisementList = DB::table('advertisements')->where('advertisements.status', 1 )->where('advertisements.visible', 1 )->get();


        return view('student.welcome')->with([
            'TeacherList'  =>  $TeacherList, 
            'SubjectList'  =>  $SubjectList, 
            'classesList'  =>  $classesList, 
            'advertisementList'  =>  $advertisementList, 
        ]);
    }

    public function team()
    {
        $TeacherList = DB::table('teacher')
        ->join('subject', 'teacher.Teach_stream', '=', 'subject.subj_ID')->where('Status' ,1)->get();


        $SubjectList = DB::table('subject')->select('subj_stream')
        ->distinct()->get();


        return view('student.team')->with([
            'TeacherList'  =>  $TeacherList, 
            'SubjectList'  =>  $SubjectList, 
        ]);
    }

    public function about()
    {
        $TeacherList = DB::table('teacher')
        ->join('subject', 'teacher.Teach_stream', '=', 'subject.subj_ID')->where('Status' ,1)->get();


        $SubjectList = DB::table('subject')->select('subj_stream')
        ->distinct()->get();


        return view('student.about')->with([
            'TeacherList'  =>  $TeacherList, 
            'SubjectList'  =>  $SubjectList, 
        ]);
    }

    public function contact()
    {
        $TeacherList = DB::table('teacher')
        ->join('subject', 'teacher.Teach_stream', '=', 'subject.subj_ID')->where('Status' ,1)->get();


        $SubjectList = DB::table('subject')->select('subj_stream')
        ->distinct()->get();


        return view('student.contact')->with([
            'TeacherList'  =>  $TeacherList, 
            'SubjectList'  =>  $SubjectList, 
        ]);
    }

    public function leaderBoard()
    {
        $data = DB::table('results')
        ->join('student', 'results.stu_ID', '=', 'student.stu_ID')
        ->orderBy('results.marks', 'desc')
        ->get();

    


        $SubjectList = DB::table('subject')->select('subj_stream')
        ->distinct()->get();


        return view('student.leaderBoard')->with([
            'data'  =>  $data, 
            'SubjectList'  =>  $SubjectList, 
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('Stu_email', 'password');

        if (Auth::guard('student')->attempt($credentials)) {
            return redirect()->intended('/')->with('success', 'Login Successfully.');
        }
        return redirect()->back()->with('delete',  'These credentials do not match our records!');

    }

    public function register(Request $request)
    {     
        // Validate form data
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'Stu_image.*' => 'image|mimes:jpg,jpeg,png,gif|max:2048',
            'Stu_email' => 'required|string|email|max:255|unique:student',
            'password' => 'required|string|min:8|confirmed',
            'Stu_contactnumber' => 'required|digits:10',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    

       if($request->captured_image != '')
       {
            $filename = null;
            if ($request->filled('captured_image')) {
                $imageData = $request->input('captured_image');
                $imageData = str_replace('data:image/png;base64,', '', $imageData);
                $imageData = str_replace(' ', '+', $imageData);
                $imageName = 'captured_' . time() . '.png';
                $imagePath = public_path('uploads/' . $imageName);
                file_put_contents($imagePath, base64_decode($imageData));
                $filename =  $imageName;
            }
       }else
       {
            $file = $request->file('Stu_image'); // Retrieve the uploaded file
            $filename = date('YmdHi') . '_' . $file->getClientOriginalName(); // Add a separator for readability
    
            $file->move(public_path('uploads'), $filename);

      
       }

    
        // Create customer
        $customer = Student::create([
            'username' => $request->username,
            'Stu_email' => $request->Stu_email,
            'Stu_image' => $filename,
            'password' => Hash::make($request->password),
            'Subj_stream' => $request->Subj_stream,
            'Stu_name' => $request->Stu_name,
            'Stu_contactnumber' => $request->Stu_contactnumber,
            'parent_email' => $request->parent_email,
        ]);

        // Log the customer in
        Auth::guard('student')->login($customer);

        // Redirect to customer dashboard or any other route
        return redirect()->intended('/')->with('success', 'Login Successfully.');
    }

    public function logout()
    {
        Auth::guard('student')->logout();

        // Optionally invalidate the session
        request()->session()->invalidate();

        // Regenerate session token to prevent session fixation attacks
        request()->session()->regenerateToken();

        // Redirect to the homepage or login page
        return redirect('/')->with('success', 'Successfully logged out');
    }

    public function class($id)
    {  
        $TeacherList = DB::table('teacher')
        ->join('subject', 'teacher.Teach_stream', '=', 'subject.subj_ID')->where('Status' ,1)->get();

        $classesList = DB::table('class_detail')->join('subject', 'class_detail.Class_stream', '=', 'subject.subj_ID')
        ->join('teacher', 'class_detail.Teacher_ID', '=', 'teacher.Teacher_ID')
        ->select('class_detail.*', 'subject.subj_stream as subj_stream1' , 'subject.subj_name as subj_name1' , 'teacher.Teach_name as Teach_name1')->where('subj_stream' ,$id)->get();

        $SubjectList = DB::table('subject')->select('subj_stream')
        ->distinct()->get();


        return view('student.class')->with([
            'TeacherList'  =>  $TeacherList, 
            'SubjectList'  =>  $SubjectList, 
            'classesList'  =>  $classesList, 
        ]);
    }


    
    public function reservation($Class_ID)
    {  
        return view('student.reservation')->with([
            'Class_ID'  =>  $Class_ID, 
        ]);
    }

    public function pay(Request $request)
    {  

        $classData = DB::table('class_detail')->join('subject', 'class_detail.Class_stream', '=', 'subject.subj_ID')
        ->join('teacher', 'class_detail.Teacher_ID', '=', 'teacher.Teacher_ID')
        ->select('class_detail.*', 'subject.subj_stream as subj_stream1' , 'subject.subj_name as subj_name1' , 'teacher.Teach_name as Teach_name1')->where('Class_ID' ,$request->Class_ID)->first();


        $Reservation = Reservation::create([
            'Class_ID' => $classData->Class_ID,
            'Teacher_ID' => $classData->Teacher_ID,
            'Subj_ID' => $classData->Class_stream,
            'Re_Status' => 1,
            'stu_ID' => Auth::guard('student')->user()->stu_ID ,
            'Date_reservation' => $classData->Class_date . '-' . $classData->Class_time,
        ]);


        $details = [
            'title' => 'SIPA LMS',
            'body' => "Student Name: $classData->subj_name1<br><br>" . // HTML line breaks
                      "Subject Stream: $classData->subj_stream1<br><br>" . // HTML line breaks
                      "Student Enrolled: Rs $classData->price"
        ];

        
        $email = Auth::guard('student')->user()->parent_email;

        $this->sendEmail($details, $email);


        $Payment = Payment::create([
            'Reservation_ID' => $Reservation->Reservation_ID,
            'Payment_Details' => "-",
            'amount' => $classData->price,
            'Re_Status' => 1,
            'stu_ID' => Auth::guard('student')->user()->stu_ID ,

        ]);


        return redirect('/')->with('success', 'Successfully class registered');


    }
    
    public function myClasses()
    {
        $myClassData = DB::table('class_detail')
            ->join('subject', 'class_detail.Class_stream', '=', 'subject.subj_ID')
            ->join('teacher', 'class_detail.Teacher_ID', '=', 'teacher.Teacher_ID')
            ->join('reservation', 'class_detail.Class_ID', '=', 'reservation.Class_ID')
            ->leftJoin('reschedule_requests', function ($join) {
                $join->on('class_detail.Class_ID', '=', 'reschedule_requests.class_id')
                    ->where('reschedule_requests.student_id', '=', Auth::guard('student')->user()->stu_ID);
            })
            ->select(
                'class_detail.*',
                'subject.subj_stream as subj_stream1',
                'subject.subj_name as subj_name1',
                'teacher.Teach_name as Teach_name1',
                'reschedule_requests.id as reschedule_request_id' // Check if there's a reschedule request
            )
            ->where('reservation.stu_ID', Auth::guard('student')->user()->stu_ID)
            ->get();

        $SubjectList = DB::table('subject')->select('subj_stream')
            ->distinct()->get();

        return view('student.myClasses')->with([
            'myClassData' => $myClassData,
            'SubjectList' => $SubjectList,
        ]);
    }

    public function classView($Class_ID)
    {  
        
        $classData = DB::table('class_detail')->join('subject', 'class_detail.Class_stream', '=', 'subject.subj_ID')
        ->join('teacher', 'class_detail.Teacher_ID', '=', 'teacher.Teacher_ID')
        ->select('class_detail.*', 'subject.subj_stream as subj_stream1' , 'subject.subj_name as subj_name1' , 'teacher.Teach_name as Teach_name1' , 'teacher.Teach_image as Teach_image1')->where('Class_ID' ,$Class_ID)->first();

  
        $SubjectList = DB::table('subject')->select('subj_stream')
        ->distinct()->get();

        return view('student.classView')->with([
            'Class_ID'  =>  $Class_ID, 
            'SubjectList'  =>  $SubjectList, 
            'classData'  =>  $classData, 
        ]);
    }

    public function teamView($Teacher_ID)
    {  
        
        $teacherDetails = DB::table('teacher')->join('subject', 'teacher.Teach_stream', '=', 'subject.subj_ID')->where('Teacher_ID' ,$Teacher_ID)->first();

        $feedbacks = DB::table('feedback')->join('student', 'feedback.stu_ID', '=', 'student.stu_ID')->where('Teacher_ID' ,$Teacher_ID)->select('Stu_name' ,'message' ,'feedback.updated_at')->orderBy('feedback.id', 'desc')->get();

  
        $SubjectList = DB::table('subject')->select('subj_stream')
        ->distinct()->get();

        return view('student.teamView')->with([
            'SubjectList'  =>  $SubjectList, 
            'teacherDetails'  =>  $teacherDetails, 
            'feedbacks'  =>  $feedbacks, 
        ]);
    }

    public function addFeedback(Request $request)
    {  
        
        $customer = Feedback::create([
            'Teacher_ID' => $request->Teacher_ID,
            'stu_ID' => Auth::guard('student')->user()->stu_ID,
            'message' => $request->message,   
        ]);


        return redirect()->back()->with('success', 'Feedback Added Successfully!');
    }

    public function rescheduleRequest(Request $request)
    {
        $request->validate([
            'class_id' => 'required|exists:class_detail,Class_ID',
            'reschedule_date' => 'required|date',
            'reschedule_time' => 'required',
            'note' => 'required|string|max:500',
        ]);

        try {
            $classDetail = DB::table('class_detail')
                ->where('Class_ID', $request->class_id)
                ->first();

            if (!$classDetail) {
                return back()->withErrors(['error' => 'Class not found']);
            }

            DB::table('reschedule_requests')->insert([
                'class_id' => $request->class_id,
                'student_id' => Auth::guard('student')->user()->stu_ID, 
                'teacher_id' => $classDetail->Teacher_ID, 
                'subject_name' => $request->subject_name, 
                'teacher_name' => $request->teacher_name, 
                'reschedule_date' => $request->reschedule_date,
                'reschedule_time' => $request->reschedule_time,
                'note' => $request->note,
                'status' => 'pending', 
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return redirect()->back()->with('success', 'Reschedule request submitted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    public function getRescheduleRequests()
    {
        $studentId = Auth::guard('student')->user()->stu_ID; 
      
        $rescheduleRequests = RescheduleRequest::where('student_id', $studentId)
            ->orderBy('created_at', 'desc')
            ->get();

            
        $SubjectList = DB::table('subject')->select('subj_stream')
            ->distinct()->get();

        return view('student.rescheduleRequests', compact('rescheduleRequests', 'SubjectList'));
    }


}
