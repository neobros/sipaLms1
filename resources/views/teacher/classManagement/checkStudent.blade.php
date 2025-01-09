@extends('teacher.head')
@section('content')
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Check Student</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/teacher/dashboard"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="/teacher/dashboard">Dashboard Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Check Student</a></li>
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
                                            <th>Student Name</th> 
                                            <th>Student Email</th> 
                                            <th>Student Number</th> 
                                            <th>Parent Email</th> 

                                            <!-- <th>Subjects Stream</th>      -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($checkStudentList as $key => $list)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            
                                          

                                            <td>{{$list->Stu_name}}</td>    
                                            <td>{{$list->Stu_email}}</td>    
                                            <td>{{$list->Stu_contactnumber}}</td>                                        
                                            <td>{{$list->parent_email}}</td>   


                                        

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