@extends('teacher.head')
@section('content')
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Advertisement List</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/teacher/dashboard"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="/teacher/dashboard">Dashboard Home</a></li>
                            <li class="breadcrumb-item"><a href="/teacher/advertisementManagement/advertisementList">Advertisement List</a></li>
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
                                            <th>Image</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th>Visible Status</th>
                                            <th>Visible</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($addAdvertisementList as $key => $list)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>
                                                <div class="d-inline-block align-middle">
                                                    <img src="{{ asset('uploads/' . $list->advertisementimage) }}" alt="user image" class="img- wid-90 align-top m-r-15">                                               
                                                </div>
                                         
                                            </td>    
                                            <td>{{$list->price}}</td>    


                                            @if($list->status == "0")   
                                                <td><span class="badge badge-success">Pending</span></td> 
                                            @elseif($list->status == "1")   
                                                <td><span class="badge badge-primary">Appoved</span></td> 
                                            @elseif($list->status == "2")   
                                                <td><span class="badge badge-warning">Rejected</span></td> 
                                            @endif




                                            @if($list->visible == "1")   
                                                <td><span class="badge badge-primary">Visible</span></td> 
                                            @elseif($list->visible == "0")   
                                                <td><span class="badge badge-warning">Not Visible</span></td> 
                                            @endif



                                     

                                            <td>
                                              @if($list->visible == "0")   
                                                <a href="/advertisementVisible/1/{{$list->id  }}"><button
                                                            style="width: 35px; height: 35px" type="button"
                                                            class="btn  btn-icon btn-success "
                                                            onclick="return confirm('Are you sure you want to Visible?')"><i
                                                                class="feather icon-check-circle"></i></button></a>
                                            @else
                                                <a href="/advertisementVisible/0/{{$list->id  }}"><button
                                                            style="width: 35px; height: 35px" type="button"
                                                            class="btn  btn-icon btn-danger"
                                                            onclick="return confirm('Are you sure you want to Not Visible?')"><i
                                                                class="feather icon-slash"></i></button></a>
                                              @endif
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