<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
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
}
