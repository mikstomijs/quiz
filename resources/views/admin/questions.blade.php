<x-layout-admin>
    <div class="page-shell admin-shell">
        <header class="page-header">
            <h1 class="neon-heading">Manage Questions</h1>
            <p class="body-copy">Editing for quiz: {{ $quiz->title }}</p>
        </header>

        <section class="card-panel admin-card">
            <h2 class="card-title">Add Question</h2>
            <form method="POST" action="/admin" class="form-grid">
                @csrf
                <input type="hidden" name="type" value="question">
                <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">
                <input class="input-glow" name="question" placeholder="New question text">
                <button class="primary-button">Add question</button>
            </form>
        </section>

        <section class="card-panel admin-card">
            <div class="button-row">
                <button class="secondary-button" type="button" onclick="window.location.href='/admin'">Back to Admin</button>
                <span class="muted-text">Click any question to keep editing or manage options.</span>
            </div>

            <div class="card-grid">
                @foreach($quiz->questions as $question)
                    <article class="card-panel question-card">
                        <form method="POST" action="/admin" class="question-form">
                            @csrf
                            <input type="hidden" name="type" value="updateQuestion">
                            <input type="hidden" name="question_id" value="{{ $question->id }}">
                            <input class="input-glow" name="question" value="{{ $question->question }}">
                            <button class="secondary-button">Save</button>
                        </form>
                        <div class="button-row">
                            <form method="POST" action="/admin" class="inline-form">
                                @csrf
                                <input type="hidden" name="type" value="deleteQuestion">
                                <input type="hidden" name="question_id" value="{{ $question->id }}">
                                <button class="secondary-button">Delete</button>
                            </form>
                            <button class="secondary-button" type="button" onclick="window.location.href='/admin/question/{{ $question->id }}/options'">Manage options</button>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>
    </div>
</x-layout-admin>
