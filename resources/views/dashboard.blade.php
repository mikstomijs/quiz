<x-layout>
    <div class="page-shell dashboard-shell">
        <header class="page-header">
            <h1 class="neon-heading">Quantum Quiz Arena</h1>
            <p class="body-copy">Choose your next challenge from the neon quiz grid.</p>
        </header>

        <div class="card-grid">
            @foreach($quizzes as $quiz)
                <article class="card-panel quiz-card">
                    <div>
                        <h2 class="card-title">{{ $quiz->title }}</h2>
                        @php $highscore = $quiz->attempts->max('score') @endphp
                        <p class="muted-text">@if($highscore !== null) Highscore: {{ $highscore }} @else Not attempted yet @endif</p>
                    </div>
                    <button class="primary-button" onclick="window.location.href='/quiz/{{ $quiz->id }}';">Start Quiz</button>
                </article>
            @endforeach
        </div>
    </div>
</x-layout>
