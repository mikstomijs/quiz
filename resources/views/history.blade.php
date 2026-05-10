<x-layout>
<div>





</div>

<div>
@foreach($attempts as $attempt) 
@if($attempt->user_id == Auth::id())
<div>
<p>Quiz: {{$attempt->quiz->title}}
<p>Score: {{$attempt->score}}</p>
<p>Date & time: {{$attempt->created_at}}
</div>
@else 
<div>
No quizzes taken!
</div>
@endif
@endforeach





</div>

</x-layout>