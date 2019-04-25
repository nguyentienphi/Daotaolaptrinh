<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'question_id',
        'content',
        'is_right'
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function result()
    {
        return $this->hasOne(Result::class);
    }
}
