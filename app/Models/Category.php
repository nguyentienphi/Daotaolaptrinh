<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name'
    ];

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($category) {
            $category->posts()->get()->each->delete();
            $category->courses()->get()->each->delete();
        });
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function getNameAttribute()
    {
        return strtoupper($this->attributes['name']);
    }
}
