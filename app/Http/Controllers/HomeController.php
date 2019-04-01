<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Services\Course\CourseService;

class HomeController extends Controller
{
    protected $courseService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CourseService $courseService)
    {
        // $this->middleware('auth');
        $this->courseService = $courseService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $post = Post::count();
        $course = $this->courseService->count();

        return view('home', compact('post', 'course'));
    }
}
