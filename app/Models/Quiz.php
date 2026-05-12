<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = ["title"];


    public function questions() {
        return $this->hasMany(Question::class);
    }


    public function attempts() {
        return $this->hasMany(QuizAttempt::class);
    }

    protected static function booted()
    {
        static::deleting(function ($quiz) {
            $quiz->questions()->each(function ($question) {
                $question->options()->delete();
                $question->delete();
            });
        });
    }
}
