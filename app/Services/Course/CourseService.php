<?php

namespace App\Services\Course;

use App\Services\BaseService;
use App\Models\Course;

class CourseService extends BaseService
{
    public function getModel()
    {
        return Course::class;
    }
}
