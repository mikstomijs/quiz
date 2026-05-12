<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Option;

class AdminController extends Controller
{
    public function index()
    {
        abort_unless(auth()->user() && auth()->user()->isAdmin(), 403);

        $quizzes = Quiz::all(['id', 'title']);
        return view('admin', compact('quizzes'));
    }

    public function questions(Quiz $quiz)
    {
        abort_unless(auth()->user() && auth()->user()->isAdmin(), 403);

        $quiz->load('questions');
        return view('admin.questions', compact('quiz'));
    }

    public function options(Question $question)
    {
        abort_unless(auth()->user() && auth()->user()->isAdmin(), 403);

        $question->load('options', 'quiz');
        return view('admin.options', compact('question'));
    }

    public function store(Request $request)
    {
        abort_unless(auth()->user() && auth()->user()->isAdmin(), 403);

        $type = $request->input('type');

        switch ($type) {
            case 'quiz':
                $validated = $request->validate([
                    'title' => ['required'],
                ]);

                Quiz::create(['title' => $validated['title']]);
                break;

            case 'question':
                $validated = $request->validate([
                    'question' => ['required'],
                    'quiz_id' => ['required', 'integer'],
                ]);

                Question::create([
                    'question' => $validated['question'],
                    'quiz_id' => $validated['quiz_id'],
                ]);
                break;

            case 'options':
                $validated = $request->validate([
                    'option_1' => ['required'],
                    'option_2' => ['required'],
                    'option_3' => ['required'],
                    'option_4' => ['required'],
                    'question_id' => ['required', 'integer'],
                    'correct_option' => ['required', 'integer', 'between:1,4'],
                ]);

                for ($i = 1; $i <= 4; $i++) {
                    Option::create([
                        'option_text' => $validated['option_' . $i],
                        'question_id' => $validated['question_id'],
                        'is_correct' => $i == $validated['correct_option'],
                    ]);
                }
                break;

            case 'deleteQuiz':
                $validated = $request->validate([
                    'quiz_id' => ['required', 'integer'],
                ]);

                Quiz::destroy($validated['quiz_id']);
                break;

            case 'updateQuestion':
                $validated = $request->validate([
                    'question_id' => ['required', 'integer'],
                    'question' => ['required'],
                ]);

                $question = Question::findOrFail($validated['question_id']);
                $question->update(['question' => $validated['question']]);
                break;

            case 'deleteQuestion':
                $validated = $request->validate([
                    'question_id' => ['required', 'integer'],
                ]);

                Question::destroy($validated['question_id']);
                break;

            case 'updateOption':
                $validated = $request->validate([
                    'option_id' => ['required', 'integer'],
                    'option_text' => ['required'],
                    'is_correct' => ['nullable', 'boolean'],
                ]);

                $option = Option::findOrFail($validated['option_id']);

                if (!empty($validated['is_correct'])) {
                    Option::where('question_id', $option->question_id)->update(['is_correct' => false]);
                    $option->is_correct = true;
                } else {
                    $option->is_correct = false;
                }

                $option->option_text = $validated['option_text'];
                $option->save();
                break;

            case 'deleteOption':
                $validated = $request->validate([
                    'option_id' => ['required', 'integer'],
                ]);

                Option::destroy($validated['option_id']);
                break;

            default:
                abort(400);
        }

        return redirect('/admin');
    }
}
