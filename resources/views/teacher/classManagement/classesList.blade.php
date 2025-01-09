@extends('teacher.head')
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
                            <li class="breadcrumb-item"><a href="/teacher/dashboard"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="/teacher/dashboard">Dashboard Home</a></li>
                            <li class="breadcrumb-item"><a href="/teacher/classManagement/classesList">Classes List</a></li>
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
                        <h5>Details</h5>
                        <div class="card-body table-border-style">
                            <div class="table-responsive">
                                <table class="table table-inverse" id="table_filter" >
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Subjects Stream</th>     
                                            <th>Date</th>     
                                            <th>Subject Type</th>     
                                            <th>Time Range </th> 
                                            <th>Price</th> 
                                            <th>Image</th>                                           
                                            <th>Status</th>
                                            <th>Student</th>
                                            <th>Action</th>   
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($classesList as $key => $list)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            
                                            @if($list->subj_stream1 == "physical")   
                                                <td><span class="badge badge-primary">Physical Science stream - {{ $list->subj_name1 }}</span></td>
                                            @elseif($list->subj_stream1 == "science")   
                                                <td><span class="badge badge-secondary">Science stream - {{ $list->subj_name1 }}</span></td> 
                                            @elseif($list->subj_stream1 == "commerce")   
                                                <td><span class="badge badge-success">Commerce stream - {{ $list->subj_name1 }}</span></td> 
                                            @elseif($list->subj_stream1 == "arts")   
                                                <td><span class="badge badge-warning">Arts stream - {{ $list->subj_name1 }}</span></td> 
                                            @else
                                                <td><span class="badge badge-info">Technology stream - {{ $list->subj_name1 }}</span></td> 
                                            @endif


                                            <td>{{$list->Class_date}}</td>    
                                            <td>{{$list->Class_type}}</td>    
                                            <td>{{$list->Class_time}}</td>                                        
                                            <td>{{$list->price}}</td>   

                                            <td>
                                                <div class="d-inline-block align-middle">
                                                    <img src="{{ asset('uploads/' . $list->Class_image) }}" alt="user image" class="img-radius wid-40 align-top m-r-15">
                                                </div>                                       
                                            </td>     

                                            @if($list->status == "0")   
                                                <td><span class="badge badge-primary">Need to Approve</span></td>
                                            @elseif($list->status == "1")   
                                                <td><span class="badge badge-secondary">Visible</span></td> 
                                            @elseif($list->status == "2")   
                                                <td><span class="badge badge-warning">Not Visible</span></td> 
                                            @endif

                                            <td>

                                            <a href="/teacher/classManagement/checkStudent/{{$list->Class_ID}}"><button
                                                        style="width: 35px; height: 35px" type="button"
                                                        class="btn btn-icon btn-info has-ripple"
                                                        onclick="return confirm('Are you sure you want to Check?')"><i
                                                            class="feather icon-info"></i></button></a>
                                           
                                            </td>

                                            <td>

                                            <a href="/{{$list->Class_ID  }}"><button
                                                        style="width: 35px; height: 35px" type="button"
                                                        class="btn  btn-icon btn-success "
                                                        onclick="return confirm('Are you sure you want to Approve?')"><i
                                                            class="feather icon-check-circle"></i></button></a>

                                            <a href="/{{$list->Class_ID  }}"><button
                                                        style="width: 35px; height: 35px" type="button"
                                                        class="btn  btn-icon btn-danger"
                                                        onclick="return confirm('Are you sure you want to Reject?')"><i
                                                            class="feather icon-slash"></i></button></a>

                                            <!-- Add Quiz Button -->
                                            <a href="/teacher/classManagement/addQuiz/{{ $list->Class_ID }}">
                                                <button style="width: 35px; height: 35px" type="button" class="btn btn-icon btn-primary"
                                                    onclick="return confirm('Are you sure you want to add a Quiz for this class?')">
                                                    <i class="feather icon-plus"></i>
                                                </button>
                                            </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
    </div>
    @endsection