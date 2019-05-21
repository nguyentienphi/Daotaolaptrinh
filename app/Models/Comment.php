<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id',
        'content',
        'parent_id',
        'commentable_id',
        'commentable_type',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function commentable()
    {
        return $this->morphTo();
    }

    public function replysComment()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    public function getNameRelation()
    {
        if (empty($this->commentable)) {
            return '';
        }

        return $this->commentable->title;
    }

}
