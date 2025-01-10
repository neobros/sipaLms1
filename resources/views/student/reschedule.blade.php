@extends('student.head')
@section('content')

    <!-- Header Start -->
    <div class="container-fluid bg-primary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-3 font-weight-bold text-white">My Classes List</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0"><a class="text-white" href="">Home</a></p>
                <p class="m-0 px-2">/</p>
                <p class="m-0">My Classes List</p>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Team Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <p class="section-title px-5"><span class="px-2">My Classes</span></p>
                <h1 class="mb-4">Classes List</h1>
            </div>
            <div class="row">

               

            <div class="table-responsive">
                                <table class="table table-inverse" id="table_filter" >
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Teacher Name</th>
                                            <th>Subjects Stream</th>     
                                            <th>Time</th>     
                                            <th>Type</th> 
                                            <th>Link</th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($myClassData as $key => $list)
                                        <tr>
                                            <td>{{++$key}}</td>
                                           
                                            <td>{{$list->Teach_name1}}</td>    

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


                                            <td>{{$list->Class_date}}-{{$list->Class_time}}</td>    
                                            <td>{{$list->Class_type}}</td>    
                                           <td>---</td>    

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>



            </div>
        </div>
    </div>
    <!-- Team End -->




@endsection