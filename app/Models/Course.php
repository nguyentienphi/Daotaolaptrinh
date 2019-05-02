<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Course extends Model
{
    protected $fillable = [
        'name',
        'category_id',
        'title',
        'description',
        'image',
        'price',
        'category_id',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
        'date_register'
    ];

    /**
     * Number perPage
     *
     * @var int
     */
    protected $perPage = 7;

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_course')->withTimestamps();
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

    public function getDateRegisterAttribute()
    {
        return Carbon::parse($this->pivot->attributes['created_at'])->format('d-m-Y');
    }

    /**
     * @return string
     */
    public function getNameCategoryAttribute()
    {
        if (empty($this->category)) {
            return '';
        }

        return $this->category->name;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userCourse()
    {
        return $this->hasMany(UserCourse::class);
    }

    public function rates()
    {
        return $this->hasMany(Rating::class);
    }
}
