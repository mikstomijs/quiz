<x-layout>
    <div class="page-shell quiz-shell">
        <header class="page-header">
            <h1 class="neon-heading">{{ $quiz->title }}</h1>
            <p class="body-copy">Answer fast, aim for the neon streak, and keep your score glowing.</p>
        </header>

        <div id="quiz" class="quiz-flow">
            @foreach($quiz->questions->shuffle() as $index => $question)
                <section class="card-panel question-panel" id="question-{{ $index }}" style="{{ $index === 0 ? '' : 'display:none' }}">
                    <div class="question-meta">
                        <span class="muted-text">Question {{ $index + 1 }} of {{ $quiz->questions->count() }}</span>
                        <h2 class="card-title">{{ $question->question }}</h2>
                    </div>

                    <div class="options-grid">
                        @foreach($question->options->shuffle() as $option)
                            <button class="option-button" onclick="nextQuestion({{ $index }}, {{ $option->id }})">
                                <span class="option-badge">{{ strtoupper(substr('ABCD', $loop->index, 1)) }}</span>
                                {{ $option->option_text }}
                            </button>
                        @endforeach
                    </div>
                </section>
            @endforeach

            <section id="results" class="card-panel result-panel" style="display:none">
                <h2 class="neon-heading">Your Results</h2>
                <p class="result-score">You scored <span id="score"></span> of {{ $quiz->questions->count() }}</p>
                <div class="button-row">
                    <button class="secondary-button" onclick="location.reload();">Retake quiz</button>
                    <a href="/history" class="secondary-button">View History</a>
                    <a href="/dashboard" class="secondary-button">Back to Home</a>
                </div>
            </section>
        </div>
    </div>

    <script>
        const totalQuestions = {{ $quiz->questions->count() }};
        const answers = {};
        var submitted = false;

        function nextQuestion(index, optionId) {
            answers[index] = optionId;
            document.getElementById('question-' + index).style.display = 'none';
            const next = index + 1 < totalQuestions ? 'question-' + (index + 1) : submitQuiz();
            document.getElementById(next).style.display = 'block';
        }

        function submitQuiz() {
            submitted = true;
            fetch('/quiz/submit', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                body: JSON.stringify({ answers, quiz_id: {{ $quiz->id }} })
            })
            .then(r => r.json())
            .then(data => {
                document.getElementById('score').textContent = data.score;
                document.getElementById('results').style.display = 'block';
            })
        }
    </script>
</x-layout>
