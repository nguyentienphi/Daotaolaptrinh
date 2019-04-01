<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Course extends Model
{
    protected $dates = [
        'created_at',
        'updated_at',
    ];


    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function tests()
    {
        return $this->hasMany(Test::class);
    }

    public function videos()
    {
        return $this->belongsToMany(Video::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->format('d-m-Y');
    }
}
