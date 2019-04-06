<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Comment\CommentService;
use App\Services\Post\PostService;
use Auth;

class CommentController extends Controller
{
    protected $commentService;

    public function __construct(CommentService $commentService, PostService $postService)
    {
        $this->commentService = $commentService;
        $this->postService = $postService;
    }

    public function addCommentPost(Request $request)
    {
        if (!$request->ajax()) {
            return response()->json([
                'success' => false
            ]);
        }

        $post = $this->postService->findOrFail($request->post);
        $input = $request->content;
        $this->commentService->addCommentPost($post, $input);

        return response()->json([
            'image' => asset(Auth::user()->avatar),
            'name' => Auth::user()->name,
            'success' => true
        ]);
    }
}
