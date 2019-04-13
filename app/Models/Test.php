<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Test extends Model
{
    protected $fillable = [
        'course_id',
        'name',
        'time'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'point')->withPivot('point');
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->format('d-m-Y');
    }
}
