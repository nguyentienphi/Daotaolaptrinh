<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Services\Post\PostService;
use App\Services\Follow\FollowService;
use App\Http\Requests\PostRequest;
use Illuminate\Pagination\LengthAwarePaginator;
use Auth;
use Session;
use Exception;
use DB;

class PostController extends Controller
{
    protected $postService;
    protected $followService;

    public function __construct(PostService $postService, FollowService $followService)
    {
        $this->postService = $postService;
        $this->followService = $followService;
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
    public function show($id, Request $request)
    {
        try {
            $post = $this->postService->findOrFail($id);
            $user = $post->user->id;
            $morePosts = $this->postService->getMorePost($user, $id);

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

    public function posrUserDetail($id)
    {
        $post = $this->postService->findOrFail($id);
        $comments = $this->postService->getAllComment($id);

        return view('clients.posts.user.detail', compact('post', 'comments'));
    }

    public function updateViewNumber(Request $request)
    {
        if (!$request->ajax()) {
            return response()->json([
                'success' => false
            ]);
        }

       try {
            $postId = $request->postId;

            $this->postService->updateViewNumber($postId);

            return response()->json([
                'success' => true,
                'redirect' => route('post.show', $postId)
            ]);
       } catch (Exception $e) {
            return response()->json([
                'message' => trans('lang.error')
            ]);
       }
    }

    public function follow(Request $request)
    {
        if (!$request->ajax()) {
            return response()->json([
                'success' => false
            ]);
        }

        DB::beginTransaction();

        try {
            $data = $request->data;

            $input = [
                'user_id' => Auth::user()->id,
                'follower_id' => $data
            ];

            $follow = $this->followService->create($input);

            if (!$follow) {
                throw new Exception(trans('lang.create_fail'), 1);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'userId' => $data
            ]);

        } catch (Exception $e) {
            DB::rollback();

            return response()->json([
                'success' => false,
                'message' => trans('lang.error')
            ]);
        }
    }

    public function getFollow(Request $request) {
        $users = $this->followService->getFollow();
        $posts = [];

        foreach ($users as $user) {
            foreach ($user->posts as $value) {
                $posts[] = $value;
            }
        }

        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $posts = collect($posts);
        $perPage = config('settings.paginate.list_post_follow');
        $currentPageItems = $posts->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
        $posts= new LengthAwarePaginator($currentPageItems , count($posts), $perPage);
        $posts->setPath($request->url());

        return view('clients.follows.index', compact('posts'));
    }

    public function unFollow(Request $request)
    {

        if (!$request->ajax()) {
            return response()->json([
                'success' => false
            ]);
        }

        DB::beginTransaction();

        try {
            $data = $request->data;

            $unFollow = $this->followService->unFollow($data);

            if (!$unFollow) {
                throw new Exception(trans('lang.fail'), 1);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'userId' => $data
            ]);

        } catch (Exception $e) {
            DB::rollback();

            return response()->json([
                'success' => false,
                'message' => trans('lang.error')
            ]);
        }
    }
}
