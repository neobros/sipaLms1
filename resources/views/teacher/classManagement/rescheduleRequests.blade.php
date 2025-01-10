@extends('teacher.head')
@section('content')
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Reschedule Requests</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/teacher/dashboard"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="/teacher/dashboard">Dashboard Home</a></li>
                            <li class="breadcrumb-item"><a href="/teacher/rescheduleRequests">Reschedule Requests</a></li>
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
                        <h5>Reschedule Requests</h5>
                        <div class="card-body table-border-style">
                            <div class="table-responsive">
                                <table class="table table-inverse" id="table_filter">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Student Name</th>
                                            <th>Parent Email</th>
                                            <th>Original Date</th>
                                            <th>Original Time</th>
                                            <th>Requested Date</th>
                                            <th>Requested Time</th>
                                            <th>Note</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($rescheduleRequests as $key => $request)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $request->student_name }}</td>
                                            <td>{{ $request->parent_email }}</td>
                                            <td>{{ $request->original_date }}</td>
                                            <td>{{ $request->original_time }}</td>
                                            <td>{{ $request->reschedule_date }}</td>
                                            <td>{{ $request->reschedule_time }}</td>
                                            <td>{{ $request->note }}</td>
                                            <td>
                                                @if($request->status == 'pending')
                                                    <span class="badge badge-warning">Pending</span>
                                                @elseif($request->status == 'approved')
                                                    <span class="badge badge-success">Approved</span>
                                                @else
                                                    <span class="badge badge-danger">Rejected</span>
                                                @endif
                                            </td>
                                            <td>
                                                <!-- Approve Button -->
                                                <button type="button" class="btn btn-icon btn-success btn-sm" 
                                                    data-toggle="modal" 
                                                    data-target="#replyModal" 
                                                    data-requestid="{{ $request->id }}"
                                                    data-status="approved">
                                                    <i class="feather icon-check-circle"></i>
                                                </button>
                                            
                                                <!-- Reject Button -->
                                                <button type="button" class="btn btn-icon btn-danger btn-sm" 
                                                    data-toggle="modal" 
                                                    data-target="#replyModal" 
                                                    data-requestid="{{ $request->id }}"
                                                    data-status="rejected">
                                                    <i class="feather icon-slash"></i>
                                                </button>
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

    <!-- Reply Modal -->
    <div class="modal fade" id="replyModal" tabindex="-1" role="dialog" aria-labelledby="replyModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="POST" action="{{ route('teacher.updateRescheduleStatusWithReply') }}">
                @csrf
                <input type="hidden" name="request_id" id="request_id">
                <input type="hidden" name="status" id="status">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="replyModalLabel">Add Reply</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="teacher_reply">Reply</label>
                            <textarea class="form-control" id="teacher_reply" name="teacher_reply" rows="3" placeholder="Add a reply..."></textarea>
                        </div>
                        <div class="form-group">
                            <label for="link">Link (Optional)</label>
                            <input class="form-control" id="link" name="link" placeholder="Add a link if approving (optional)">
                        </div>
                    </div>                    
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
 $('#replyModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var requestId = button.data('requestid');
    var status = button.data('status');

    var modal = $(this);
    modal.find('#request_id').val(requestId);
    modal.find('#status').val(status);

    // Default teacher reply for rejection
    if (status === 'rejected') {
        modal.find('#teacher_reply').val('The reschedule request has been rejected due to unsuitable timing.');
        modal.find('#link').prop('disabled', true).val(''); // Disable and clear the link field
    } else {
        modal.find('#teacher_reply').val('');
        modal.find('#link').prop('disabled', false); // Enable the link field
    }
});

</script>

@endsection
