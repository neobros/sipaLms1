@extends('student.head')
@section('content')

<!-- Header Start -->
<div class="container-fluid bg-primary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
        <h3 class="display-3 font-weight-bold text-white">My Reschedule Requests</h3>
        <div class="d-inline-flex text-white">
            <p class="m-0"><a class="text-white" href="">Home</a></p>
            <p class="m-0 px-2">/</p>
            <p class="m-0">My Reschedule Requests</p>
        </div>
    </div>
</div>
<!-- Header End -->

<!-- Reschedule Requests Table -->
<div class="container-fluid pt-5">
    <div class="container">
        <div class="text-center pb-2">
            <p class="section-title px-5"><span class="px-2">Reschedule Requests</span></p>
            <h1 class="mb-4">My Reschedule Requests</h1>
        </div>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Teacher Name</th>
                            <th>Subject Name</th>
                            <th>Requested Date</th>
                            <th>Requested Time</th>
                            <th>Note</th>
                            <th>Status</th>
                            <th>Teacher Reply</th>
                            <th>Updated Link</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($rescheduleRequests as $key => $request)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $request->teacher_name }}</td>
                            <td>{{ $request->subject_name }}</td>
                            <td>{{ $request->reschedule_date }}</td>
                            <td>{{ $request->reschedule_time }}</td>
                            <td>{{ $request->note }}</td>
                            <td>
                                <span class="badge 
                                    {{ $request->status == 'approved' ? 'badge-success' : ($request->status == 'rejected' ? 'badge-danger' : 'badge-warning') }}">
                                    {{ ucfirst($request->status) }}
                                </span>
                            </td>
                            <td>{{ $request->teacher_reply ?? 'N/A' }}</td>
                            <td>{{ $request->updated_link ?? 'N/A' }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center">No Reschedule Requests Found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Reschedule Requests Table End -->

@endsection
