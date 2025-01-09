@extends('admin.head')
@section('content')
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">New Advertisement List</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard Home</a></li>
                            <li class="breadcrumb-item"><a href="/admin/advertisementManagement/newAdvertisement">New Advertisement List</a></li>
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
                                            <th>Teacher Name</th>
                                            <th>Price</th>
                                            <th>Approve or Reject </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($addAdvertisementList as $key => $list)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            
                                            <td>
                                                <div class="d-inline-block align-middle">
                                                    <img src="{{ asset('uploads/' . $list->Teach_image) }}" alt="user image" class="img- wid-90 align-top m-r-15">                                               
                                                </div>
                                         
                                            </td>    
                                            <td>{{$list->Teach_name}}</td>
                                            <td>{{$list->price}}</td>
                                            <td>

                                            <a href="/admin/ApproveAdvertisement/{{$list->id  }}"><button
                                                        style="width: 35px; height: 35px" type="button"
                                                        class="btn  btn-icon btn-success "
                                                        onclick="return confirm('Are you sure you want to Approve?')"><i
                                                            class="feather icon-check-circle"></i></button></a>

                                            <a href="/admin/RejectApproveAdvertisement/{{$list->id  }}"><button
                                                        style="width: 35px; height: 35px" type="button"
                                                        class="btn  btn-icon btn-danger"
                                                        onclick="return confirm('Are you sure you want to Reject?')"><i
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