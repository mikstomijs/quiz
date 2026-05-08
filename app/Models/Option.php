<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $fillable = ['option_text', 'question_id', 'is_correct'];

    function questions() {
        return $this->belongsTo(Question::class);
    }

}
