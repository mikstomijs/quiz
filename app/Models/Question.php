<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ["question", "quiz_id"];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function options()
    {
        return $this->hasMany(Option::class);
    }

    protected static function booted()
    {
        static::deleting(function ($question) {
            $question->options()->delete();
        });
    }
}
