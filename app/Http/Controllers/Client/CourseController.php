<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Course\CourseService;
use App\Services\User\UserService;
use App\Services\Video\VideoService;
use Auth;

class CourseController extends Controller
{
    protected $courseService;
    protected $userService;

    public function __construct(CourseService $courseService,
        UserService $userService,
        VideoService $videoService
    )
    {
        $this->courseService = $courseService;
        $this->userService = $userService;
        $this->videoService = $videoService;
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
        $course = $this->courseService->findOrFail($id);

        return view('clients.courses.show', compact('course','videos'));
}

    public function registerCourse(Request $request)
    {
        if (!$request->ajax()) {
            return response()->json([
                'success' => false
            ]);
        }

        try {
            $course_id = $request->course_id;
            $coin_number = $request->remain;
            $check = $this->userService->checkRegisterCourse($course_id);

            if ($check) {
                return response()->json([
                    'message' => trans('course.exists')
                ]);
            } else {
                $this->userService->registerCoures($course_id);
                $this->userService->updateCoinNumber(Auth::user()->id, $coin_number);
                $request->session()->flash('success', trans('course.register_success'));

                return response()->json([
                    'success' => true,
                    'redirect' => route('list-course-register')
                ]);
            }

        } catch (Exception $e) {
            return response()->json([
                'message' => trans('course.register_failed')
            ]);
        }
    }

    public function listCourse()
    {
        $courses = $this->userService->getCourse();

        return view('clients.courses.register.index', compact('courses'));
    }

    public function getDetailCourseRegister($id)
    {
        $course = $this->courseService->findOrFail($id);
        $videos = $course->videos()->get();

        return view('clients.courses.register.show', compact('course', 'videos'));
    }

    public function showVideoCourse($id)
    {
        $video = $this->videoService->findOrFail($id);

        return view('clients.courses.register.detail', compact('video'));
    }
}
