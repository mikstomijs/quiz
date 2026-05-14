<x-layout-admin>
    <div class="page-shell admin-shell">
        <header class="page-header">
            <h1 class="neon-heading">Quantum Admin</h1>
            <p class="body-copy">Manage quizzes, questions, and options in a high-tech control plane.</p>
        </header>

        <section class="card-panel admin-card">
            <h2 class="card-title">Create New Quiz</h2>
            <form method="POST" action="/admin" class="form-grid">
                @csrf
                <input type="hidden" name="type" value="quiz">
                <input class="input-glow" name="title" placeholder="Quiz title">
                <button class="primary-button">Create quiz</button>
            </form>
        </section>


        <section class="card-panel admin-card">
            <h2 class="card-title">Quiz Directory</h2>
            <div class="card-grid">
                @foreach($quizzes as $quiz)
                    <article class="card-panel quiz-card admin-loop-card">
                        <div>
                            <h3>{{ $quiz->title }}</h3>
                        </div>
                        <button class="secondary-button" type="button" onclick="window.location.href='/admin/quiz/{{ $quiz->id }}/questions'">Manage</button>
                        <form method="POST" action="/admin">
                        @csrf
                        <input type="hidden" name="type" value="deleteQuiz">
                        <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">
                        <button class="secondary-button" type="submit">Delete</button>
                        </form>
                    </article>
                @endforeach
            </div>
        </section>
    </div>
</x-layout-admin>
