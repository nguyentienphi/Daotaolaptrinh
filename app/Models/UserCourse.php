<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class UserCourse extends Model
{
    use Notifiable, SoftDeletes;

    protected $table = 'user_course';

    protected $fillable = [
        'user_id',
        'course_id',
        'created_at',
        'update_at'
    ];


}
