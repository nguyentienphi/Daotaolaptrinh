<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Rating extends Model
{
    protected $fillable = [
        'user_id',
        'course_id',
        'rate',
        'content'
    ];

    protected $dates = ['created_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attibutes['created_at'])->format('d-m-Y');
    }
}
