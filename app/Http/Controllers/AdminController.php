<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Option;

class AdminController extends Controller
{
    public function store (Request $request) {

    if (!auth()->user()->isAdmin()) {
        abort(403);
    } else {

        $input = $request->all();


        switch($input["type"]) {
            case "quiz":
                $validated = $request->validate([
                'title' => ['required']
                ]); 
                Quiz::create([
                'title' => $validated['title']
                ]);

            case "question":
                $validated = $request->validate([
                'question' => ['required'],
                'quiz_id' => ['required']
                ]);
                Question::create([
                'question' => $validated["question"],
                'quiz_id' => $validated["quiz_id"]
                ]);
            case "options":
                $validated = $request->validate([
                    'option_1' => ['required'],
                    'option_2' => ['required'],
                    'option_3' => ['required'],
                    'option_4' => ['required'],
                    'question_id' => ['required'],
                    'correct_option' => ['required', 'integer', 'between:1,4'],

                ]);

                for ($i = 1; $i <= 4; $i++) {
                    if ($i == $validated['correct_option']) {
                        $isCorrect = true;
                    } else $isCorrect = false;
                    Option::create([
                        'option_text'   => $validated['option_' . $i],
                        'question_id'   => $validated['question_id'],
                        'is_correct' => $isCorrect
                     ]);
}

        }
        

       


        }

     

        return redirect("/admin");
    } 
        
      
    }
