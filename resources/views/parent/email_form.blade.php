@extends('student.head')
@section('content')
<div class="container">
    <h2 class="mt-5">Search Student Results</h2>
    <p>Enter the parent email to view the results of associated students.</p>

    <!-- Parent Email Form -->
    <form method="GET" action="{{ route('parent.parentReportView') }}">
        <div class="form-group">
            <label for="parent_email">Parent Email</label>
            <input type="email" name="parent_email" id="parent_email" class="form-control" placeholder="Enter Parent Email" required>
        </div>
        <button type="submit" class="btn btn-primary">View Results</button>
    </form>
</div>
@endsection
