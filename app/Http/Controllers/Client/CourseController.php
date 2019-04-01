<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Course\CourseService;

class CourseController extends Controller
{
    protected $courseService;

    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }

    public function showCourseCategory($id)
    {
        try {
            $courses = $this->courseService->where('category_id', $id)
                ->orderBy('created_at', 'desc')->paginate(config('settings.paginate.course'));

            return view('clients.courses.index', compact('courses'));
        } catch (Exception $e) {
            return view('errors.404');
        }
    }

    public function show($id)
    {
        try {
            $course = $this->courseService->where('id', $id)->first();

            return view('clients.courses.show', compact('course','videos'));
        } catch (Exception $e) {
            return view('errors.404');
        }
    }
}
