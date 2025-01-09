@extends('student.head')
@section('content')

 <!-- Class Start -->

        <div class="container">
            <div class="text-center pb-2">
                <p class="section-title px-5"><span class="px-2">Classes</span></p>
                <h1 class="mb-4">Classes</h1>
            </div>
            <div class="row">
            @foreach($classesList as $classesDataList)
                <div class="col-lg-4 mb-5">
                    <div class="card border-0 bg-light shadow-sm pb-2">
                        <!-- <img class="card-img-top mb-2" src="/student/img/class-1.jpg" alt=""> -->
                        <img style="max-width: 344px;max-height: 344px;" class="card-img-top mb-2" src="{{ asset('uploads/' . $classesDataList->Class_image) }}" alt="">
                        <div class="card-body text-center">
                            <h4 class="card-title">{{$classesDataList->subj_name1}}</h4>
                            <p class="card-text">{{$classesDataList->Teach_name1}}</p>
                        </div>
                        <div class="card-footer bg-transparent py-4 px-5">
                            <div class="row border-bottom">
                                <div class="col-6 py-1 text-right border-right"><strong>Subject Type</strong></div>
                                <div class="col-6 py-1">{{$classesDataList->Class_type}}</div>
                            </div>
                            <div class="row border-bottom">
                                <div class="col-6 py-1 text-right border-right"><strong>Time</strong></div>
                                <div class="col-6 py-1">{{$classesDataList->Class_date}}</div>
                            </div>
                            <div class="row border-bottom">
                                <div class="col-6 py-1 text-right border-right"><strong>Class Time</strong></div>
                                <div class="col-6 py-1">{{$classesDataList->Class_time}}</div>
                            </div>
                            <div class="row">
                                <div class="col-6 py-1 text-right border-right"><strong>Tution Fee</strong></div>
                                <div class="col-6 py-1">RS {{$classesDataList->price}} / Month</div>
                            </div>
                        </div>

                        @if(Auth::guard('student')->check())  
                        <!-- <a href="/reservation/{{$classesDataList->Class_ID}}" class="btn btn-primary px-4 mx-auto mb-4">Join Now</a> -->
                        <a href="/classView/{{$classesDataList->Class_ID}}" class="btn btn-primary px-4 mx-auto mb-4">Join Now</a>
                        @else

                        <a href="#" onclick="needLogin()"class="btn btn-primary px-4 mx-auto mb-4">Join Now</a>
                        @endif
                    </div>
                </div>
                @endforeach

                
            </div>
        </div>
    </div>
    <!-- Class End -->


    <!-- Registration Start -->
    <!-- <div class="container-fluid py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 mb-5 mb-lg-0">
                    <p class="section-title pr-5"><span class="pr-2">Book A Seat</span></p>
                    <h1 class="mb-4">Book A Seat For Your Kid</h1>
                    <p>Invidunt lorem justo sanctus clita. Erat lorem labore ea, justo dolor lorem ipsum ut sed eos,
                        ipsum et dolor kasd sit ea justo. Erat justo sed sed diam. Ea et erat ut sed diam sea ipsum est
                        dolor</p>
                    <ul class="list-inline m-0">
                        <li class="py-2"><i class="fa fa-check text-success mr-3"></i>Labore eos amet dolor amet diam</li>
                        <li class="py-2"><i class="fa fa-check text-success mr-3"></i>Etsea et sit dolor amet ipsum</li>
                        <li class="py-2"><i class="fa fa-check text-success mr-3"></i>Diam dolor diam elitripsum vero.</li>
                    </ul>
                    <a href="" class="btn btn-primary mt-4 py-2 px-4">Book Now</a>
                </div>
                <div class="col-lg-5">
                    <div class="card border-0">
                        <div class="card-header bg-secondary text-center p-4">
                            <h1 class="text-white m-0">Book A Seat</h1>
                        </div>
                        <div class="card-body rounded-bottom bg-primary p-5">
                            <form>
                                <div class="form-group">
                                    <input type="text" class="form-control border-0 p-4" placeholder="Your Name" required="required" />
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control border-0 p-4" placeholder="Your Email" required="required" />
                                </div>
                                <div class="form-group">
                                    <select class="custom-select border-0 px-4" style="height: 47px;">
                                        <option selected>Select A Class</option>
                                        <option value="1">Class 1</option>
                                        <option value="2">Class 1</option>
                                        <option value="3">Class 1</option>
                                    </select>
                                </div>
                                <div>
                                    <button class="btn btn-secondary btn-block border-0 py-3" type="submit">Book Now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Registration End -->





@endsection