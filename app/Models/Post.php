<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'user_id',
        'status',
        'category_id',
        'view_number'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $append = [
        'status_custom'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->format('d-m-Y');
    }

    public function getStatusCustomAttribute()
    {
        if ($this->status == config('settings.status.waiting_approved')) {
            return trans('post.waiting_approved');
        } else {
            return trans('post.approved');
        }

    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
