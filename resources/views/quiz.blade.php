<div id="quiz">
    @foreach($quiz->questions->shuffle() as $index => $question)
        <div class="card" id="question-{{ $index }}" style="{{ $index === 0 ? '' : 'display:none' }}">
            <p>Question {{ $index + 1 }} of {{ $quiz->questions->count() }}</p>
            <p>{{ $question->question }}</p>

            @foreach($question->options->shuffle() as $option)
                <button onclick="nextQuestion({{ $index }}, {{ $option->id }})">
                    {{ $option->option_text }}
                </button>
            @endforeach
        </div>
    @endforeach

    <div id="complete" style="display:none">
        <p>Quiz complete!</p>
        <button onclick="submitQuiz()">See Results</button>
    </div>


    <div id="results" style="display:none">
        <h2>Your Results</h2>
        <p>You scored <span id="score"></span> out of {{ $quiz->questions->count() }}</p>
        <a href="/history">View History</a>
        <a href="/">Back to Home</a>
    </div>
</div>

<script>
    const totalQuestions = {{ $quiz->questions->count() }};
    const answers = {};

    function nextQuestion(index, optionId) {
        answers[index] = optionId;
        document.getElementById('question-' + index).style.display = 'none';
        const next = index + 1 < totalQuestions ? 'question-' + (index + 1) : 'complete';
        document.getElementById(next).style.display = 'block';
    }

    function submitQuiz() {
        fetch('/quiz/submit', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            body: JSON.stringify({ answers, quiz_id: {{ $quiz->id }} })
        })
        .then(r => r.json())
        .then(data => {
            document.getElementById('complete').style.display = 'none';
            document.getElementById('score').textContent = data.score;
            document.getElementById('results').style.display = 'block';
        })
    }
</script>