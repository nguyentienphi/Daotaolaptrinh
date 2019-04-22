<?php

namespace App\Services\Course;

use App\Services\BaseService;
use App\Models\Course;
use Auth;

class CourseService extends BaseService
{
    public function getModel()
    {
        return Course::class;
    }

    public function getAll()
    {
        return $this->orderBy('id', 'desc')->paginate();
    }

    public function getNumberUserRegister($courses)
    {
        $count = [];
        foreach ($courses as $course) {
            $count[$course->id] = count($course->users()->where('user_id', '!=', Auth::user()->id)->get());
        }

        return $count;
    }

    public function getListUser($course)
    {
        $users = $course->users()->where('role', '!=', config('settings.teacher'))
            ->paginate(config('settings.list_user'));
        return $users;
    }
}
