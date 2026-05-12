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
            <h2 class="card-title">Quick Quiz Management</h2>
            <div class="form-grid">
                <div class="input-group">
                    <label class="label-text">Choose quiz</label>
                    <select id="quizSelect" class="select-glow">
                        @foreach($quizzes as $quiz)
                            <option value="{{ $quiz->id }}">{{ $quiz->title }}</option>
                        @endforeach
                    </select>
                </div>
                <button class="secondary-button" type="button" onclick="window.location.href='/admin/quiz/'+document.getElementById('quizSelect').value+'/questions'">Manage questions</button>
            </div>
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
                    </article>
                @endforeach
            </div>
        </section>
    </div>
</x-layout-admin>
