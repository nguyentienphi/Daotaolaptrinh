<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Services\Category\CategoryService;
use App\Services\Post\PostService;
use App\Services\User\UserService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    protected $postService;
    protected $userService;
    protected $categoryService;

    public function __construct()
    {
        $this->postService = new PostService();
        $this->categoryService = new CategoryService();
    }

    public function index()
    {
        $data['posts'] = $this->postService->getAllPost();

        $data['activeMenu'] = ['menu' => 'posts', 'item' => 'list_post'];

        return view('admin.posts.index', $data);
    }

    /**
     * Function show view create user
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $data['categories'] = $this->categoryService->getAll();

        $data['activeMenu'] = ['menu' => 'posts', 'item' => 'add_post'];

        return view('admin.posts.add', $data);
    }

    /**
     * @param Request $request
     */
    public function store(PostRequest $request)
    {
        $data = [
            'user_id' => Auth::id(),
            'category_id' => $request->get('category_id'),
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'status' => config('settings.status.approved'),
            'view_number' => 0
        ];

        if ($this->postService->createPost($data)) {
            return redirect()->route('admin.posts.index');
        }
    }


    /**
     * Function edit user
     *
     * @param User $user
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Post $post){
        $data['post'] = $post;

        $data['categories'] = $this->categoryService->getAll();

        return view('admin.posts.edit', $data);
    }

    /**
     * Function update user
     *
     * @param PostRequest $request
     * @param Post $user
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PostRequest $request, Post $post)
    {
        $data = [
            'category_id' => $request->get('category_id'),
            'title' => $request->get('title'),
            'content' => $request->get('content'),
        ];

        if ($this->postService->updatePost($data, $post)) {
            return redirect()->route('admin.posts.index');
        }
    }

    /**
     * Function delete user and relation
     *
     * @param User $user
     * @return array
     *
     * @throws \Exception
     */
    public function destroy(Post $post)
    {
        if ($post->delete()) {
            return redirect()->route('admin.posts.index');
        }
    }
}
