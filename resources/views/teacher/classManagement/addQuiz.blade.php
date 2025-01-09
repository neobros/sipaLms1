
@extends('teacher.head')
@section('content')


<section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Add Quiz</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/teacher/dashboard"><i class="feather icon-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="/teacher/classManagement/classesList">Classes List</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">Add Quiz</a>
                            </li>
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
                @if ($errors->any())
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
                        <h5>Add Quiz Problems</h5>
                        <p></p>
                        <p><strong>Subject:</strong> {{ $classDetails->subject_name }}</p>
                        <p><strong>Stream:</strong> {{ $classDetails->subject_stream }}</p>
                        <p><strong>Teacher:</strong> {{ $classDetails->teacher_name }}</p>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('quiz.store', $classId) }}" method="POST">
                            @csrf
                            <!-- Quiz Title -->
                            <div class="form-group">
                                <label for="title">Quiz Title</label>
                                <input type="text" name="title" class="form-control" required placeholder="Enter quiz title">
                            </div>

                            <div id="quiz-questions-container">
                                <div class="quiz-question">
                                    <h5>Question 1</h5>
                                    <div class="form-group">
                                        <label for="question">Question</label>
                                        <input type="text" name="questions[0][question]" class="form-control" required placeholder="Enter the quiz question">
                                    </div>
                                    <div class="form-group">
                                        <label for="option1">Option 1</label>
                                        <input type="text" name="questions[0][option1]" class="form-control" required placeholder="Enter Option 1">
                                    </div>
                                    <div class="form-group">
                                        <label for="option2">Option 2</label>
                                        <input type="text" name="questions[0][option2]" class="form-control" required placeholder="Enter Option 2">
                                    </div>
                                    <div class="form-group">
                                        <label for="option3">Option 3</label>
                                        <input type="text" name="questions[0][option3]" class="form-control" required placeholder="Enter Option 3">
                                    </div>
                                    <div class="form-group">
                                        <label for="option4">Option 4</label>
                                        <input type="text" name="questions[0][option4]" class="form-control" required placeholder="Enter Option 4">
                                    </div>
                                    <div class="form-group">
                                        <label for="correct_option">Correct Option</label>
                                        <select name="questions[0][correct_option]" class="form-control" required>
                                            <option value="" disabled selected>Select the correct option</option>
                                            <option value="1">Option 1</option>
                                            <option value="2">Option 2</option>
                                            <option value="3">Option 3</option>
                                            <option value="4">Option 4</option>
                                        </select>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <button type="button" id="add-question-btn" class="btn btn-secondary">Add Another Question</button>
                            <button type="submit" class="btn btn-primary">Submit All Questions</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
