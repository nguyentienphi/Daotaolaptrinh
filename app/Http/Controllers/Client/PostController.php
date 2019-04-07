<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Services\Post\PostService;
use Auth;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }
    public function index()
    {
        return view('errors.404');
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
            $post = $this->postService->create($data);

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
        try {
            $post = $this->postService->findOrFail($id);
            $user = $post->user->id;
            $morePosts = $this->postService->where('user_id', $user)
                ->where('status', config('settings.status.approved'))
                ->where('id', '!=', $post->id)->get();

            if (count($morePosts) > 3) {
                $morePosts = $morePosts->random(3);
            }

            $comments = $post->comments()->where('parent_id', config('settings.comment'))->get();

            return view('clients.posts.detail', compact('post', 'morePosts', 'comments'));
        } catch (Exception $e) {
            return view('clients.errors.404');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = $this->postService->findOrFail($id);

        return view('clients.posts.user.edit', compact('post'));
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
        if (!$request->ajax()) {
            return response()->json([
                'success' => false,
            ]);
        }

        try {
            $content = $request->all();
            $this->postService->update($id, $content);
            $request->session()->flash('success', trans('post.update_success'));

            return response()->json([
                'success' => true,
                'redirect' => route('list-post-user'),
            ]);
        } catch (Exception $e) {
            $request->session()->flash('error', trans('post.update_failed'));

            return response()->json([
                'success' => false,
                'redirect' => route('list-post-user'),
            ]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        try {
            $this->postService->findOrFail($id)->delete();
            $request->session()->flash('success', trans('post.delete_success'));
        } catch (Exception $e) {
            $request->session()->flash('success', trans('post.delete_error'));
        }

        return redirect()->route('list-post-user');
    }

    public function showPostUser()
    {
        $postUsers = $this->postService->where('user_id', Auth::user()->id)->paginate(config('settings.paginate.post_user'));

        return view('clients.posts.user.index', compact('postUsers'));
    }

    public function showPostCategory($id)
    {
        try {
            $posts = $this->postService->where('category_id', $id)
            ->where('status', config('settings.status.approved'))
            ->orderBy('created_at', 'desc')->paginate(config('settings.paginate.post_category'));

            $postNews =  $this->postService->where('status', config('settings.status.approved'))
            ->take(3)->orderBy('created_at', 'desc')->get();

            return view('clients.posts.index', compact('posts', 'postNews'));
        } catch (Exception $e) {
            return view('errors.404');
        }
    }
}
