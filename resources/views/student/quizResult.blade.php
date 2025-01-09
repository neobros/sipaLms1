
@extends('student.head')

@section('content')
<div class="container">
    <h2 class="mt-5">Quiz Result: {{ $quiz->title }}</h2>
    <p><strong>Your Score:</strong> {{ number_format($score, 2) }}%</p>
    <p><strong>Correct Answers:</strong> {{ $correctAnswers }} / {{ $totalQuestions }}</p>

    <h3 class="mt-4">Detailed Results</h3>
    <ul class="list-group">
        @foreach ($results as $index => $result)
        <li class="list-group-item">
            <p><strong>Question {{ $index + 1 }}:</strong> {{ $result['question'] }}</p>
            <p><strong>Your Answer:</strong> Option {{ $result['given_answer'] }}</p>
            <p><strong>Correct Answer:</strong> Option {{ $result['correct_answer'] }}</p>
            <p><strong>Status:</strong>
                @if ($result['is_correct'])
                <span class="text-success">Correct</span>
                @else
                <span class="text-danger">Incorrect</span>
                @endif
            </p>
        </li>
        @endforeach
    </ul>

    <a href="{{ route('student.selfEvaluation') }}" class="btn btn-secondary mt-4">Back to Quizzes</a>
</div>
@endsection
