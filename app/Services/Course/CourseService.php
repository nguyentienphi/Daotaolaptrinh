<?php

namespace App\Services\Course;

use App\Services\BaseService;
use App\Models\Course;
use Auth;

class CourseService extends BaseService
{
    /**
     * @return string
     */
    public function getModel()
    {
        return Course::class;
    }

    /**
     * Get all course
     *
     * @return mixed
     */
    public function getAll()
    {
        return $this->orderBy('id', 'desc')->paginate();
    }

    /**
     * Create course and user_course
     *
     * @param array $course
     * @param array $userCourse
     *
     * @return mixed
     */
    public function createCourse(array $course, array $userCourse)
    {
        $this->uploadImage($course['content_image'], $course['image']);

        $course = parent::create($course);

        return $course->userCourse()->create($userCourse);
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
