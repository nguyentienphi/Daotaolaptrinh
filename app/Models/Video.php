<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    public function comment()
    {
         return $this->morphMany(Comment::class, 'commentable')
    }
}
