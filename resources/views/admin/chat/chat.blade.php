@extends('admin.head')

@section('content')
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">New Teachers List</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard Home</a></li>
                            <li class="breadcrumb-item"><a href="3">Classes List</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    

        <div class="row">
            <div class="col-sm-12">
                @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <strong>{{ \Session::get('success') }}</strong>
                    </div>
                    @endif
                    @if (\Session::has('delete'))
                    <div class="alert alert-danger">
                        <strong>{{ \Session::get('delete') }}</strong>
                    </div>
                    @endif
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h5>Chat List</h5>
                    </div>
                    <div class="card-body">
                        <div class="chat-list">
                            @forelse ($data as $user)
                                <div class="chat-item" onclick="window.location.href='/admin/singlechatView/{{$user->stu_ID}}';" style="cursor: pointer; border: 1px solid #ddd; border-radius: 5px; padding: 10px; margin-bottom: 10px; display: flex; align-items: center;">
                                    <!-- User Image -->
                                    <div style="flex-shrink: 0; margin-right: 15px;">
                                        <img src="{{ asset('uploads/' . $user->Stu_image) }}" alt="user image" class="img-radius" style="width: 50px; height: 50px; border-radius: 50%;">
                                    </div>
                                    <!-- User Details -->
                                    <div style="flex-grow: 1;">
                                        <strong>{{ $user->Stu_name }}</strong> - 
                                        <span class="badge badge-primary">{{ $user->Subj_stream }}</span>
                                        <p style="margin: 0; color: gray; font-size: 14px;">{{ $user->last_message }}</p>
                                    </div>
                                </div>
                            @empty
                                <div class="no-chats" style="text-align: center; padding: 20px; color: gray;">
                                    No active chats found.
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    @endsection