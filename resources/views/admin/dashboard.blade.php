@extends('admin.head')
@section('content')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">SIPSA Admin Dashboard</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Dashboard Home</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
                <div class="col-lg-7 col-md-12">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card support-bar overflow-hidden">
                                <div class="card-body pb-0">
                                    <h2 class="m-0"></h2>
                                    <span class="text-c-blue">{{$teacherCount}}</span>
                                    <p class="mb-3 mt-3">Total registered teachers.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="card support-bar overflow-hidden">
                                <div class="card-body pb-0">
                                    <h2 class="m-0"></h2>
                                    <span class="text-c-blue">{{$subjectCount}}</span>
                                    <p class="mb-3 mt-3">Total registered subject.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="card support-bar overflow-hidden">
                                <div class="card-body pb-0">
                                    <h2 class="m-0"></h2>
                                    <span class="text-c-blue">{{$studentCount}}</span>
                                    <p class="mb-3 mt-3">Total registered student.</p>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
                <div class="col-lg-5 col-md-12">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-6">
                                            <h4 class="text-c-yellow">{{$classCount}}</h4>
                                            <h6 class="text-muted m-b-0">All Classes</h6>
                                        </div>
                                        <div class="col-4 text-right">
                                            <i class="feather icon-bar-chart-2 f-28"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-c-yellow">
                                    <div class="row align-items-center"> 
                                        <div class="col-3 text-right">
                                            <i class="feather icon-trending-up text-white f-16"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-6">
                                            <h4 class="text-c-green">RS..00</h4>
                                            <h6 class="text-muted m-b-0">All Today Earnings</h6>
                                        </div>
                                        <div class="col-4 text-right">
                                        <i class="feather icon-bar-chart-2 f-28"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-c-green">
                                    <div class="row align-items-center">
                                        <div class="col-3 text-right">
                                            <i class="feather icon-trending-up text-white f-16"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

