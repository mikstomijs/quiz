<?php

namespace App\Http\Controllers;
use App\Models\Quiz;
use App\Models\QuizAttempt;
use App\Models\Option;


use Illuminate\Http\Request;

class QuizController extends Controller
{
public function quiz(Quiz $quiz) {
    $quiz->load('questions.options');
    return view('quiz', compact('quiz'));
}


public function history() {
    $attempts = QuizAttempt::with('quiz')
        ->where('user_id', auth()->id())
        ->latest()
        ->get();

    return view('history', compact('attempts'));
}



public function submit(Request $request) {
    $answers = $request->input('answers');
    $score = 0;

    foreach ($answers as $optionId) {
        $option = Option::find($optionId);
        if ($option && $option->is_correct) {
            $score++;
        }
    }

    $attempt = QuizAttempt::create([
        'user_id' => auth()->id(),
        'quiz_id' => $request->input('quiz_id'),
        'score'   => $score,
    ]);

    return response()->json([
    'id'    => $attempt->id,
    'score' => $score,
]);
}
}