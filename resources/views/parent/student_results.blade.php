@extends('student.head')
@section('content')

<div class="container">
    <h2 class="mt-5">Student Results</h2>

 

    @if(isset($error))
        <div class="alert alert-danger mt-4">
            {{ $error }}
        </div>
    @elseif(isset($students) && isset($results))
        <div class="mt-5">
            <h4>Parent Email: {{ $parentEmail }}</h4>
            <h5>Student List:</h5>
            <ul>
                @foreach($students as $student)
                    <li>Student Name: {{ $student->Stu_name }}</li>
                @endforeach
            </ul>

            <h5 class="mt-4">Results:</h5>
            @if($results->isEmpty())
                <p>No results found for the students associated with this email.</p>
            @else
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Quiz Name</th>
                            <th>Student Name</th>
                            <th>Subject Stream</th>
                            <th>Class Type</th>
                            <th>Teacher Name</th>
                            <th>Marks</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($results as $result)
                            <tr>
                                <td>{{ $result->quiz_title }}</td>
                                <td>
                                    {{ $students->firstWhere('stu_ID', $result->stu_ID)->Stu_name ?? 'Unknown Student' }}
                                </td>
                                <td>{{ $result->subj_stream }}</td>
                                <td>{{ $result->Class_type }}</td>
                                <td>{{ $result->Teach_name }}</td>
                                <td>{{ $result->marks }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    @endif
</div>
@endsection
