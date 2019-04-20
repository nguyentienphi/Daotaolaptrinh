<?php

namespace App\Services\Course;

use App\Services\BaseService;
use App\Models\Course;

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
}
