<x-layout>
    <div class="page-shell quiz-shell">
        <header class="page-header">
            <h1 class="neon-heading">{{ $quiz->title }}</h1>
            <p class="body-copy">Answer fast, aim for the neon streak, and keep your score glowing.</p>
        </header>

        <div id="quiz" class="quiz-flow">
            <div class="quiz-progress" aria-hidden="true">
                <div class="quiz-progress__label">
                    <span>Progress</span>
                    <span id="quiz-progress-text">0 / {{ $quiz->questions->count() }}</span>
                </div>
                <div class="quiz-progress__track">
                    <div id="quiz-progress-fill" class="quiz-progress__fill"></div>
                </div>
            </div>

            @foreach($quiz->questions->shuffle() as $index => $question)
                <section class="card-panel question-panel" id="question-{{ $index }}" style="{{ $index === 0 ? '' : 'display:none' }}">
                    <div class="question-meta">
                        <span class="muted-text">Question {{ $index + 1 }} of {{ $quiz->questions->count() }}</span>
                        <h2 class="card-title">{{ $question->question }}</h2>
                    </div>

                    <div class="options-grid">
                        @foreach($question->options->shuffle() as $option)
                            <button class="option-button" type="button" data-question-index="{{ $index }}" data-option-id="{{ $option->id }}">
                                <span class="option-badge">{{ strtoupper(substr('ABCD', $loop->index, 1)) }}</span>
                                {{ $option->option_text }}
                            </button>
                        @endforeach
                    </div>
                </section>
            @endforeach

            <section id="results" class="card-panel result-panel" style="display:none">
                <h2 class="neon-heading">Your Results</h2>
                <p class="result-score">You scored <span id="score">—</span> of {{ $quiz->questions->count() }}</p>
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
        let submitted = false;

        function setQuizProgress(completed) {
            const fill = document.getElementById('quiz-progress-fill');
            const label = document.getElementById('quiz-progress-text');
            const pct = totalQuestions ? (completed / totalQuestions) * 100 : 0;
            if (fill) fill.style.width = pct + '%';
            if (label) label.textContent = completed + ' / ' + totalQuestions;
        }

        setQuizProgress(0);

        document.querySelectorAll('.option-button').forEach(button => {
            button.addEventListener('click', () => {
                const index = Number(button.dataset.questionIndex);
                const optionId = Number(button.dataset.optionId);
                nextQuestion(index, optionId);
            });
        });

        function nextQuestion(index, optionId) {
            if (submitted) return;
            answers[index] = optionId;
            document.getElementById('question-' + index).style.display = 'none';
            setQuizProgress(index + 1);

            if (index + 1 < totalQuestions) {
                document.getElementById('question-' + (index + 1)).style.display = 'block';
            } else {
                submitQuiz();
            }
        }

        function submitQuiz() {
            submitted = true;
            document.getElementById('results').style.display = 'block';

            fetch('{{ url('/quiz/submit') }}', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                body: JSON.stringify({ answers, quiz_id: {{ $quiz->id }}})
            })
            .then(r => r.json())
            .then(data => {
                document.getElementById('score').textContent = data.score;
            })
            .catch(() => {
                document.getElementById('score').textContent = '?';
            });
        }
    </script>
</x-layout>
