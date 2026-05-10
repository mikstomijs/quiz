<x-layout-admin>
<x-slot:title>Admin</x-slot:title>
<div>
<form method="POST" action="/admin">
    <label>Create new quiz</label>
    @csrf
    <input type="hidden" name="type" value="quiz">
    <input name="title">
    <button>Submit</button>
</form>


<form method="POST" action="/admin">
<label>Add question to quiz</label>
    @csrf
<input type="hidden" name="type" value="question">
<input name="question">
<select name="quiz_id">
    @foreach($quizzes as $quiz)
        <option value="{{ $quiz->id }}">{{ $quiz->title }}</option>
    @endforeach
</select>
<button>Submit</button>
</form>


<form method="POST" action="/admin">
<label>Add options to question</label>
<input type="hidden" name="type" value="options">
<select name="question_id">
@foreach($quizzes as $quiz)
    @foreach($quiz->questions as $question)
        @if($question->options->isEmpty())
            <option value="{{ $question->id }}">
                {{ $question->question }}
            </option>
        @endif
    @endforeach
@endforeach
</select>
<input name="option_1"> 
<input name="option_2">
<input name="option_3">
<input name="option_4">
<select name="correct_option">
@for($i = 1; $i <=4; $i++)
    <option value="{{ $i }}">
        {{ $i }}
    </option>
@endfor
</select>
<button>Submit</button>


</form>
</div>



</x-layout-admin>