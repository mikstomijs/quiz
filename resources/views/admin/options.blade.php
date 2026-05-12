<x-layout-admin>
    <div class="page-shell admin-shell">
        <header class="page-header">
            <h1 class="neon-heading">Manage Options</h1>
            <p class="body-copy">Editing options for question: {{ $question->question }}</p>
        </header>

        <section class="card-panel admin-card">
            <div class="button-row">
                <button class="secondary-button" type="button" onclick="window.location.href='/admin/quiz/{{ $question->quiz_id }}/questions'">Back to Questions</button>
                <span class="muted-text">Update the choice text or mark the correct answer.</span>
            </div>

            <div class="card-grid">
                @foreach($question->options as $option)
                    <article class="card-panel option-card">
                        <form method="POST" action="/admin" class="option-form">
                            @csrf
                            <input type="hidden" name="type" value="updateOption">
                            <input type="hidden" name="option_id" value="{{ $option->id }}">
                            <input class="input-glow" name="option_text" value="{{ $option->option_text }}">

                            <div class="button-row">
                                <label class="checkbox-label">
                                    <input type="checkbox" name="is_correct" value="1" {{ $option->is_correct ? 'checked' : '' }}>
                                    Correct answer
                                </label>
                                <button class="secondary-button">Save</button>
                            </div>
                        </form>

                        <form method="POST" action="/admin" class="inline-form">
                            @csrf
                            <input type="hidden" name="type" value="deleteOption">
                            <input type="hidden" name="option_id" value="{{ $option->id }}">
                            <button class="secondary-button">Delete</button>
                        </form>
                    </article>
                @endforeach
            </div>
        </section>
    </div>
</x-layout-admin>
