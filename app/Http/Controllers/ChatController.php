<?php

namespace App\Http\Controllers;
use App\Models\Chat;
use App\Models\student_chats;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class ChatController extends Controller
{
    public function getMessages(Request $request)
    {
        $messages = Chat::where('stu_ID', Auth::guard('student')->user()->stu_ID )
                        ->orderBy('created_at', 'asc')
                        ->get();
        return response()->json($messages);
    }


    
    public function sendMessage(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|string',
        ]);

        $chat = new Chat();
        $chat->stu_ID = Auth::guard('student')->user()->stu_ID;
        $chat->message = $validated['message'];
        $chat->type = 1; 
        $chat->save();

        return response()->json(['success' => true, 'message' => $chat]);
    }

    public function chatView()
    { 
        $data = DB::table('chats')
        ->join('student', 'chats.stu_ID', '=', 'student.stu_ID')
        ->select(
            'chats.stu_ID',
            'student.Stu_image',
            'student.Subj_stream',
            'student.Stu_name',
            'chats.message as last_message',
            'chats.updated_at'
        )
        ->whereIn('chats.id', function ($query) {
            $query->select(DB::raw('MAX(id)'))
                ->from('chats')
                ->groupBy('stu_ID');
        })
        ->orderBy('chats.updated_at', 'desc')
        ->get();
    
    

        return view('admin.chat.chat')->with([
            'data'  =>  $data, 
        ]);
    }

    public function singlechatView($stu_ID)
    { 
        $user = DB::table('student')
        ->where('stu_ID', $stu_ID )
        // ->orderBy('chats.updated_at', 'desc')        
        ->first();
    

        return view('admin.chat.singlechatView')->with([
            'user'  =>  $user, 
        ]);
    }

    public function adminGetMessages( $stu_ID)
    {
        $messages = Chat::where('stu_ID', $stu_ID )
                        ->orderBy('created_at', 'asc')
                        ->get();
        return response()->json($messages);
    }

    public function adminSendMessage(Request $request , $id)
    {
        $validated = $request->validate([
            'message' => 'required|string',
        ]);

        
        $chat = new Chat();
        $chat->stu_ID = $id;
        $chat->message = $validated['message'];
        $chat->type = 2; 
        $chat->save();

        return response()->json(['success' => true, 'message' => $chat]);
    }


    
    public function studentGetMessages(Request $request)
    {
        $messages = student_chats::join('student', 'student_chats.stu_ID', '=', 'student.stu_ID')
                        ->select(
                            'student_chats.stu_ID',
                            'student_chats.message',
                            'student.Stu_image',
                            'student.Stu_name',
                            'student_chats.created_at'
                        )
                        ->orderBy('created_at', 'asc')
                        ->get();

        return response()->json($messages);
    }


    public function studentSendMessage(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|string',
        ]);

        $chat = new student_chats();
        $chat->stu_ID = Auth::guard('student')->user()->stu_ID;
        $chat->message = $validated['message'];
        $chat->type = 1; 
        $chat->save();

        return response()->json(['success' => true, 'message' => $chat]);
    }


}
