<?php

namespace App\Http\Controllers\Admin;

use App\Services\Course\CourseService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    protected $courseService;

    /**
     * CourseController constructor.
     *
     * @param CourseService $courseService
     */
    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }

    /**
     * Function show list course
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data['courses'] = $this->courseService->getAll();

        $data['activeMenu'] = ['menu' => 'courses', 'item' => 'list_course'];

        return view('admin.courses.index', $data);
    }
}
