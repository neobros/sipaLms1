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

<!-- Classes Table -->
<div class="container-fluid pt-5">
    <div class="container">
        <div class="text-center pb-2">
            <p class="section-title px-5"><span class="px-2">My Classes</span></p>
            <h1 class="mb-4">Classes List</h1>
        </div>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-inverse" id="table_filter">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Teacher Name</th>
                            <th>Subjects Stream</th>
                            <th>Time</th>
                            <th>Type</th>
                            <th>Link</th>
                            <th>Reschedule</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($myClassData as $key => $list)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $list->Teach_name1 }}</td>

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

                            <td>{{ $list->Class_date }} - {{ $list->Class_time }}</td>
                            <td>{{ $list->Class_type }}</td>
                            <td>---</td>
                            <td>
                                @if($list->reschedule_request_id)
                                    <span class="badge badge-secondary">Already Requested</span>
                                @else
                                    <!-- Reschedule Button -->
                                    <button class="btn btn-warning btn-sm" 
                                        data-toggle="modal" 
                                        data-target="#rescheduleModal" 
                                        data-classid="{{ $list->Class_ID }}" 
                                        data-teachername="{{ $list->Teach_name1 }}"
                                        data-subjectname="{{ $list->subj_name1 }}">
                                        Request Reschedule
                                    </button>
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
<!-- Classes Table End -->

<!-- Reschedule Request Modal -->
<div class="modal fade" id="rescheduleModal" tabindex="-1" role="dialog" aria-labelledby="rescheduleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="{{ route('student.rescheduleRequest') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="rescheduleModalLabel">Request Reschedule</h5>
                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#rescheduleModal" 
                        data-classid="{{ $list->Class_ID }}" 
                        data-teachername="{{ $list->Teach_name1 }}">
                        Request Reschedule
                    </button>

                </div>
                <div class="modal-body">
                    <input type="hidden" name="class_id" id="class_id">
                    <div class="form-group">
                        <label for="teacher_name">Teacher Name</label>
                        <input type="text" class="form-control" id="teacher_name" name="teacher_name" readonly>
                    </div>
                    <div class="form-group">
                        <label for="subject_name">Subject Name</label>
                        <input type="text" class="form-control" id="subject_name" name="subject_name" readonly>
                    </div>                    
                    <div class="form-group">
                        <label for="reschedule_date">New Date</label>
                        <input type="date" class="form-control" id="reschedule_date" name="reschedule_date" required>
                    </div>
                    <div class="form-group">
                        <label for="reschedule_time">New Time</label>
                        <input type="time" class="form-control" id="reschedule_time" name="reschedule_time" required>
                    </div>
                    <div class="form-group">
                        <label for="note">Brief Note</label>
                        <textarea class="form-control" id="note" name="note" rows="3" placeholder="Enter a brief note" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit Request</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $('#rescheduleModal').on('show.bs.modal', function (event) {
        console.log("Clicked");
        var button = $(event.relatedTarget);
        var classId = button.data('classid');
        var teacherName = button.data('teachername');
        var subjectName = button.data('subjectname'); 

        var modal = $(this);
        modal.find('#class_id').val(classId);
        modal.find('#teacher_name').val(teacherName);
        modal.find('#subject_name').val(subjectName);
    });
</script>
@endsection
