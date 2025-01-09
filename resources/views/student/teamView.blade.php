@extends('student.head')
@section('content')

<div class="container-fluid py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <img class="img-fluid rounded mb-5 mb-lg-0" src="{{ asset('uploads/' . $teacherDetails->Teach_image) }}" alt="">
                </div>
                <div class="col-lg-7">
                    <p class="section-title pr-5"><span class="pr-2">Teacher Profile</span></p>
                    <h1 class="mb-4">{{$teacherDetails->Teach_name}}</h1>
                    <p>Invidunt lorem justo sanctus clita. Erat lorem labore ea, justo dolor lorem ipsum ut sed eos,
                        ipsum et dolor kasd sit ea justo. Erat justo sed sed diam. Ea et erat ut sed diam sea ipsum est
                        dolor</p>
                    <div class="row pt-2 pb-4">
                        <!-- <div class="col-6 col-md-4">
                            <img class="img-fluid rounded" src="/student/img/about-2.jpg" alt="">
                        </div> -->
                        <div class="col-6 col-md-8">
                            <ul class="list-inline m-0">
                                <li class="py-2 border-top border-bottom"><i class="fa fa-check text-primary mr-3"></i>{{$teacherDetails->subj_name}}</li>
                                <li class="py-2 border-bottom"><i class="fa fa-check text-primary mr-3"></i>{{$teacherDetails->subj_stream}}</li>
                                <!-- <li class="py-2 border-bottom"><i class="fa fa-check text-primary mr-3"></i>Diam dolor diam elitripsum vero.</li> -->
                            </ul>
                        </div>
                    </div>
                  
                </div>
            </div>
        </div>

        
    </div>


    <div class="container py-5">
    <div class="row pt-5">
    <div class="col-lg-12">
     <div class="mb-5">
                    <h2 class="mb-4">Feedbacks</h2>

                    @foreach($feedbacks as $feedbacksData)
                        <div class="media mb-4">
                            <img src="/student/img/9187604.png" alt="Image" class="img-fluid rounded-circle mr-3 mt-1" style="width: 45px;">
                            <div class="media-body">
                                <h6>{{$feedbacksData->Stu_name}} <small><i>{{$feedbacksData->updated_at}} </i></small></h6>
                                <p>{{$feedbacksData->message}}</p>
                        
                            </div>
                        </div>
                    @endforeach
                </div>

                @if(Auth::guard('student')->check())  
                    <div class="bg-light p-5">
                        <h2 class="mb-4">Leave a Feedback</h2>
                        <form action="/addFeedback" method="post" enctype="multipart/form-data">
                        @csrf
                                <input hidden type="text"  name="Teacher_ID" value="{{$teacherDetails->Teacher_ID}}" >
                            <div class="form-group">
                                <label for="message">Message *</label>
                                <textarea id="message"  name="message" cols="30" rows="3" class="form-control"></textarea>
                            </div>
                            <div class="form-group mb-0">
                                <input type="submit" value="Leave Comment" class="btn btn-primary px-3">
                            </div>
                        </form>
                    </div>
                @endif

                </div>
    </div>
        </div>
@endsection