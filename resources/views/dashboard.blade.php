<x-app-layout>
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
                    {{ __("You're logged in!") }}
    

        @foreach($quizzes as $quiz)
        <a href="/quiz/{{ $quiz->id }}">{{ $quiz->title }}</a>
        @endforeach

                </div>
            </div>
        </div>z
    </div>
</x-app-layout>
