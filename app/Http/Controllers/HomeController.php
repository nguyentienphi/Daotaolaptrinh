<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Post\PostService;
use App\Services\Course\CourseService;
use Auth;
use Carbon\Carbon;

class HomeController extends Controller
{
    protected $courseService;
    protected $postService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CourseService $courseService, PostService $postService)
    {
        // $this->middleware('auth');
        $this->courseService = $courseService;
        $this->postService = $postService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $post = $this->postService->where('status', config('settings.status.approved'))->count();
        $course = $this->courseService->count();

        return view('home', compact('post', 'course'));
    }

    public function listNotification()
    {
        $date = Carbon::now()->subDays(config('settings.get_notification'));
        $notifications = Auth::user()->notifications()
            ->where('created_at', '>=', $date)->get();

        return view('clients.notifications.index', compact('notifications'));
    }
}
