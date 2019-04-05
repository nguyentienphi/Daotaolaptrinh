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
        $comment = $this->commentService->addCommentPost($post, $input);

        return response()->json([
            'image' => asset(Auth::user()->avatar),
            'name' => Auth::user()->name,
            'success' => true,
            'id' => $comment->id
        ]);
    }

    public function replyCommentPost(Request $request)
    {
        if (!$request->ajax()) {
            return response()->json([
                'success' => false
            ]);
        }

        $post = $this->postService->findOrFail($request->post);
        $content = $request->content;
        $parentId = $request->parent_id;

        $this->commentService->replyCommentPost($post, $content, $parentId);

        return response()->json([
            'success' => true,
            'avatar' => asset(Auth::user()->avatar),
            'name' => Auth::user()->name,
        ]);
    }
}
