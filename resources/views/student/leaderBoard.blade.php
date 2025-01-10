@extends('student.head')
@section('content')


    <!-- Header Start -->
    <div class="container-fluid bg-primary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-3 font-weight-bold text-white">leader Board</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0"><a class="text-white" href="">Home</a></p>
                <p class="m-0 px-2">/</p>
                <p class="m-0">Result List</p>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <div class="container">
        <h2 class="mt-5">Result List</h2>
        <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-body">
                           

                        <table class="table table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Student Name</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Marks</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach( $data as $key => $item  )
                                <tr>
                                    <th scope="row">{{++$key}}</th>
                                    <td>{{$item->Stu_name}}</td>
                                    <td>{{$item->subj_stream}}  {{$item->Class_type}}</td>
                                    <td>{{$item->marks}} % </td>
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



    
    <!-- Team Start -->
    <div class="container-fluid pt-5">
        <div class="container">
          

               
            </div>
        </div>
    </div>
    <!-- Team End -->




@endsection