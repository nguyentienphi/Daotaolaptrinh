<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Services\Course\CourseService;
use App\Services\Video\VideoService;

class ManagementCourseController extends Controller
{
    protected $courseService;
    protected $videoService;

    public function __construct(CourseService $courseService, VideoService $videoService)
    {
        $this->courseService = $courseService;
        $this->videoService = $videoService;
    }

    public function index()
    {
        $courses = Auth::user()->courses()->paginate(config('settings.management_course'));
        $counts = $this->courseService->getNumberUserRegister($courses);

        return view('clients.courses.managements.index', compact('courses', 'counts'));
    }

    public function show($id)
    {
        $course = $this->courseService->findOrFail($id);
        $videos = $course->videos;
        $users = $this->courseService->getListUser($course);

        return view('clients.courses.managements.show', compact('course', 'videos', 'users'));
    }

    public function showDetail($id)
    {
        $video = $this->videoService->where('id', $id)->first();
        $comments = $video->comment()->paginate(config('settings.paginate.comment'));

        return view('clients.courses.managements.detail', compact('video', 'comments'));
    }
}
