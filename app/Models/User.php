<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * Number perPage
     *
     * @var int
     */
    protected $perPage = 7;

    CONST ROLE_ADMIN = 1;
    CONST ROLE_USER = 2;
    CONST ROLE_TEACHER =3;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'coin_number',
        'address',
        'phone',
        'gender',
        'role',
        'avatar',
        'deleted_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Delete all record of relation model
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();

        static::deleting(function ($user) {
            $user->courses()->get()->each->delete();
            $user->results()->get()->each->delete();
            $user->tests()->get()->each->delete();
            $user->comments()->get()->each->delete();
            $user->posts()->get()->each->delete();
        });
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'user_course')->withTimestamps();
    }

    public function results()
    {
        return $this->hasMany(Result::class);
    }

    public function tests()
    {
        return $this->belongsToMany(Test::class, 'point')->withPivot('point');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
