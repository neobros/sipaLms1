@extends('teacher.head')
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
                            <li class="breadcrumb-item"><a href="/teacher/dashboard"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="/teacher/dashboard">Dashboard Home</a></li>
                            <li class="breadcrumb-item"><a href="/teacher/classManagement/addClasses">Add-View Subjects</a></li>
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
                                <form action="/teacher/addClass" method="post" enctype="multipart/form-data">
                                    @csrf


                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Main Subject Stream</label>
                                        <input readonly  type="text" class="form-control"
                                        value="{{$subCategories->subj_stream}}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Sub Subject Stream</label>
                                        <input readonly  type="text" class="form-control"
                                           value="{{$subCategories->subj_name}}" required>
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Sub Subject Stream</label>
                                        <input hidden name="Class_stream"  type="text" class="form-control"
                                        value="{{$subCategories->subj_ID}}" required>



                                    <div class="form-group">
                                            <label >Select Date</label>    
                                        <select name="Class_date"class="form-control">    
                                            <option value="monday">Monday</option>
                                            <option value="tuesday">Tuesday</option>
                                            <option value="wednesday">Wednesday</option>
                                            <option value="thursday">Thursday</option>
                                            <option value="friday">Friday</option>
                                            <option value="saturday">Saturday</option>
                                            <option value="sunday">Sunday</option>
                                        </select>
                            
                                    </div>


                                    <div class="form-group">
                                            <label >Subject Type</label>    
                                        <select name="Class_type"class="form-control">    
                                            <option value="Group">Group</option>
                                            <option value="Individual">Individual</option>                                         
                                        </select>
                            
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Subject Image</label>
                                        <input name="Class_image" type="file" class="form-control"
                                            placeholder="Subject Image" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Time Range  [ 00AM - 00AM ]</label>
                                        <input name="Class_time" type="text" class="form-control"
                                            placeholder="Time Range" required>
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Price</label>
                                        <input name="price" type="number" class="form-control"
                                            placeholder="Price" required>
                                    </div>


                                 

                                 
                                    <button type="submit" class="btn  btn-primary">Submit</button>
                                </form>
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