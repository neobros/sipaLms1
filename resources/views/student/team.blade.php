@extends('student.head')
@section('content')

    <!-- Header Start -->
    <div class="container-fluid bg-primary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-3 font-weight-bold text-white">Our Teachers</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0"><a class="text-white" href="">Home</a></p>
                <p class="m-0 px-2">/</p>
                <p class="m-0">Our Teachers</p>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Team Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <p class="section-title px-5"><span class="px-2">Our Teachers</span></p>
                <h1 class="mb-4">Meet Our Teachers</h1>
            </div>
            <div class="row">

                @foreach($TeacherList as $dataSubjectList)
                
                         <div class="col-md-6 col-lg-3 text-center team mb-5">
                         <a href="/teamView/{{$dataSubjectList->Teacher_ID}}">
                            <div class="position-relative overflow-hidden mb-4" style="border-radius: 100%;">
                                <img class="img-fluid w-100" src="{{ asset('uploads/' . $dataSubjectList->Teach_image) }}" alt="" >
                                <div
                                    class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute">         
                                </div>
                            </div>
                            <h4>{{$dataSubjectList->Teach_name}}</h4>
                            <i>{{$dataSubjectList->subj_stream}} - {{$dataSubjectList->subj_name}}</i>
                            </a>
                        </div> 
                    
                @endforeach
            </div>
        </div>
    </div>
    <!-- Team End -->




@endsection