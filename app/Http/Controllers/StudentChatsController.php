<?php

namespace App\Http\Controllers;

use App\Models\student_chats;
use App\Http\Requests\Storestudent_chatsRequest;
use App\Http\Requests\Updatestudent_chatsRequest;

class StudentChatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storestudent_chatsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storestudent_chatsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\student_chats  $student_chats
     * @return \Illuminate\Http\Response
     */
    public function show(student_chats $student_chats)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\student_chats  $student_chats
     * @return \Illuminate\Http\Response
     */
    public function edit(student_chats $student_chats)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatestudent_chatsRequest  $request
     * @param  \App\Models\student_chats  $student_chats
     * @return \Illuminate\Http\Response
     */
    public function update(Updatestudent_chatsRequest $request, student_chats $student_chats)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\student_chats  $student_chats
     * @return \Illuminate\Http\Response
     */
    public function destroy(student_chats $student_chats)
    {
        //
    }
}
