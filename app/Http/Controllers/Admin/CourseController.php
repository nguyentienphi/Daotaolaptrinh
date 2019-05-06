<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AddCourseRequest;
use App\Models\Course;
use App\Services\Category\CategoryService;
use App\Services\Course\CourseService;
use App\Http\Controllers\Controller;
use App\Services\User\UserService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    protected $courseService;
    protected $categoryService;
    protected $userService;

    /**
     * CourseController constructor.
     *
     * @param CourseService $courseService
     * @param CategoryService $categoryService
     * @param UserService $userService
     */
    public function __construct(CourseService $courseService, CategoryService $categoryService, UserService $userService)
    {
        $this->courseService = $courseService;

        $this->categoryService = $categoryService;

        $this->userService = $userService;
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

    /**
     * Show view create course and course_user
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $data['categories'] = $this->categoryService->getAll();

        $data['users'] = $this->userService->getAll();

        return view('admin.courses.add', $data);
    }

    /**
     * Create course and course_user
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AddCourseRequest $request)
    {
        $nameImage = time().'.'.$request->picture->getClientOriginalExtension();

        $course = [
            'name' => $request->get('name'),
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'image' => $nameImage,
            'content_image' => $request->picture,
            'price' => $request->get('price'),
            'category_id' => $request->get('category_id')
        ];

        $userCourse = [
            'user_id' => $request->user_id
        ];

        if ($this->courseService->createCourse($course, $userCourse)) {
            return redirect()->route('admin.courses.index');
        }
    }

    /**
     * Function delete course and relation
     *
     * @param Course $course
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Course $course)
    {
        DB::beginTransaction();
        try {
            $course->delete();

            DB::commit();

            return redirect()->route('admin.courses.index');

        } catch (ModelNotFoundException $e) {
            DB::rollback();
        }
    }
}
