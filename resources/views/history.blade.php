<x-layout>
    <div class="page-shell history-shell">
        <header class="page-header">
            <h1 class="neon-heading">History</h1>
            <p class="body-copy">Review your past attempts and relive your highest scores.</p>
        </header>

        <div class="history-grid">
            @php $hasAttempts = false; @endphp
            @foreach($attempts as $attempt)
                @if($attempt->user_id == Auth::id())
                    @php $hasAttempts = true; @endphp
                    <article class="card-panel history-card">
                        <h2 class="card-title">{{ $attempt->quiz->title }}</h2>
                        <p class="body-copy">Score: <span class="accent-text">{{ $attempt->score }}</span></p>
                        <p class="muted-text">Date & time: {{ $attempt->created_at }}</p>
                    </article>
                @endif
            @endforeach

            @unless($hasAttempts)
                <div class="card-panel empty-state">
                    <p class="body-copy">No quizzes taken yet. Head back to the dashboard and launch your first challenge.</p>
                </div>
            @endunless
        </div>
    </div>
</x-layout>
