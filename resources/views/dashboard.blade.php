<x-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        @if(Auth::user()->isAdmin())
        <a href='/admin'><button>Admin panel</button></a>
        @endif
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

    

  @foreach($quizzes as $quiz)
    <div>
    <button><a href="/quiz/{{ $quiz->id }}">{{ $quiz->title }}</a></button>
    
    @php $highscore = $quiz->attempts->max('score') @endphp
    @if($highscore !== null)
        <span>Highscore: {{ $highscore }}</span>
    @else
        <span>Not attempted yet</span>
    @endif
    </div>
@endforeach

                </div>
            </div>
        </div>
    </div>
</x-layout>
