@extends('admin.head')
@section('content')
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Add / View Subjects</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard Home</a></li>
                            <li class="breadcrumb-item"><a href="/admin/addSubjects">Student List</a></li>
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
                        <h5>Subjects Details</h5>
                        <div class="card-body table-border-style">
                            <div class="table-responsive">
                                <table class="table table-inverse" id="table_filter" >
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Subjects Stream</th>     
                                            <th>Contact Number</th>     
                                            <th>Student Email</th> 
                                            <th>Parent Email</th>     
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($studentList as $key => $list)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>
                                                <div class="d-inline-block align-middle">
                                                    <img src="{{ asset('uploads/' . $list->Stu_image) }}" alt="user image" class="img-radius wid-40 align-top m-r-15">
                                                    <div class="d-inline-block">
                                                        <h6>{{$list->Stu_name}}</h6>                             
                                                    </div>
                                                </div>
                                            
                                            </td>    

                                            @if($list->Subj_stream == "physical")   
                                                <td><span class="badge badge-primary">Physical Science stream</span></td>
                                            @elseif($list->Subj_stream == "science")   
                                                <td><span class="badge badge-secondary">Science stream</span></td> 
                                            @elseif($list->Subj_stream == "commerce")   
                                                <td><span class="badge badge-success">Commerce stream</span></td> 
                                            @elseif($list->Subj_stream == "arts")   
                                                <td><span class="badge badge-warning">Arts stream</span></td> 
                                            @else
                                                <td><span class="badge badge-info">Technology stream</span></td> 
                                            @endif


                                            <td>{{$list->Stu_contactnumber}}</td>    
                                            <td>{{$list->Stu_email}}</td>    
                                            <td>{{$list->parent_email}}</td>    

                                            <td>
                                                <a href="/admin/studentDelete/{{$list->stu_ID }}"><button
                                                        style="width: 35px; height: 35px" type="button"
                                                        class="btn  btn-icon btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete?')"><i
                                                            class="feather icon-slash"></i></button></a>
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