<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Auth;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function __construct()
    {
        return $this->middleware('profile');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();

        return view('clients.posts.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        if (!$request->ajax()) {
            return response()->json([
                'success' => false,
            ]);
        }

        try {
            $data = $request->all();
            $data['user_id'] = Auth::user()->id;
            $data['status'] = config('settings.status.waiting_approved');
            $data['view_number'] = config('settings.view_number');
            $post = Post::create($data);

            $request->session()->flash('success', trans('post.create_success'));

            return response()->json([
                'success' => true,
                'redirect' => route('list-post-user'),
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => trans('post.create_failed'),
            ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showPostUser()
    {
        $postUsers = Post::where('user_id', Auth::user()->id)->paginate(config('settings.paginate.post_user'));

        return view('clients.posts.user.index', compact('postUsers'));
    }

    public function showPostCategory($id)
    {
        try {
            $posts = Post::where('category_id', $id)
            ->where('status', config('settings.status.approved'))
            ->orderBy('created_at', 'desc')->paginate(config('settings.paginate.post_category'));

            $postNews = Post::where('status', config('settings.status.approved'))
            ->take(3)->orderBy('created_at', 'desc')->get();

            return view('clients.posts.index', compact('posts', 'postNews'));
        } catch (Exception $e) {
            return view('errors.404');
        }
    }
}
