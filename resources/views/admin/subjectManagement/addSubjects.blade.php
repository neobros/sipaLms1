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
                            <li class="breadcrumb-item"><a href="/admin/addSubjects">Add-View Subjects</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">

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
                    <div class="card-body">
                        <h5>Add Subject Details</h5>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <form action="/admin/storeSubjects" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Subject Name</label>
                                        <input name="subj_name" type="text" class="form-control"
                                            placeholder="Subject Name" required>
                                    </div>

                                 

                                    <div class="form-group">
                                        <label >Subject Stream</label>
                                            <select name="subj_stream" class="form-control" >                                    
                                                <option value="physical">Physical Science stream</option>
                                                <option value="science">Science stream</option>
                                                <option value="commerce">Commerce stream</option>
                                                <option value="arts">Arts stream</option>
                                                <option value="technology">Technology stream</option>
                                            </select>
                                    </div>

                                    <button type="submit" class="btn  btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Subjects Details</h5>
                        <div class="card-body table-border-style">
                            <div class="table-responsive">
                                <table class="table table-inverse" id="table_filter" >
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Subject Name</th>
                                            <th>Subjects Stream</th>      
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($subjectList as $key => $list)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{$list->subj_name}}</td>    


                                             @if($list->subj_stream == "physical")   
                                                <td><span class="badge badge-primary">Physical Science stream</span></td>
                                             @elseif($list->subj_stream == "science")   
                                                <td><span class="badge badge-secondary">Science stream</span></td> 
                                            @elseif($list->subj_stream == "commerce")   
                                                <td><span class="badge badge-success">Commerce stream</span></td> 
                                            @elseif($list->subj_stream == "arts")   
                                                <td><span class="badge badge-warning">Arts stream</span></td> 
                                            @else
                                                <td><span class="badge badge-info">Technology stream</span></td> 
                                            @endif

                                            <td>
                                                <a href="/admin/subjectDelete/{{$list->subj_ID}}"><button
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