@extends('student.head')

@section('content')
<div class="container">
    <h2 class="mt-5">{{ $quiz->title }}</h2>
    <p>Answer all questions below and submit to see your score.</p>

    <form action="{{ route('student.submitQuiz', $quiz->id) }}" method="POST">
        @csrf
        <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">

        @foreach ($quiz->questions as $index => $question)
        <div class="mb-4">
            <h5>Question {{ $index + 1 }}:</h5>
            <p>{{ $question->question }}</p>

            <div>
                <label>
                    <input type="radio" name="answers[{{ $question->id }}]" value="1" required>
                    {{ $question->option1 }}
                </label>
            </div>
            <div>
                <label>
                    <input type="radio" name="answers[{{ $question->id }}]" value="2">
                    {{ $question->option2 }}
                </label>
            </div>
            <div>
                <label>
                    <input type="radio" name="answers[{{ $question->id }}]" value="3">
                    {{ $question->option3 }}
                </label>
            </div>
            <div>
                <label>
                    <input type="radio" name="answers[{{ $question->id }}]" value="4">
                    {{ $question->option4 }}
                </label>
            </div>
        </div>
        @endforeach

        <button type="submit" class="btn btn-primary">Submit Answers</button>
    </form>
</div>
@endsection
