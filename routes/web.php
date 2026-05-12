<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\QuizController;
use App\Models\User;
use App\Models\Quiz;



use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $quizzes = Quiz::with(['attempts' => function($query) {
    $query->where('user_id', auth()->id());
}])->get();

    return view('dashboard', compact('quizzes'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin', [AdminController::class, 'index']);
Route::get('/admin/quiz/{quiz}/questions', [AdminController::class, 'questions']);
Route::get('/admin/question/{question}/options', [AdminController::class, 'options']);




Route::get('/history', [QuizController::class, 'history'])->middleware('auth');

Route::post('/quiz/submit', [QuizController::class, 'submit'])->middleware('auth');






Route::post('/admin', [AdminController::class, 'store']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/quiz/{quiz}', [QuizController::class, 'quiz']);

require __DIR__.'/auth.php';
