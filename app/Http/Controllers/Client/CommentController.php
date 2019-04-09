<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Comment\CommentService;
use App\Services\Post\PostService;
use App\Services\User\UserService;
use Auth;
use App\Notifications\CommentNotification;
use Pusher\Pusher;

class CommentController extends Controller
{
    protected $commentService;
    protected $postService;
    protected $userService;

    public function __construct(
        CommentService $commentService,
        PostService $postService,
        UserService $userService
    )
    {
        $this->commentService = $commentService;
        $this->postService = $postService;
        $this->userService = $userService;
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

        $this->notification($post, $comment);

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

    public function listCommentUser(Request $request)
    {
        $comments = $this->postService->getAllComment();

        return view('clients.comments.index',compact('comments'));
    }

    public function updateNotification($id, Request $request)
    {
        $notification = $this->commentService->updateNotification($id);
        $idPost = json_decode(($notification->data))->post->id;

        return redirect()->route('post.show', $idPost);
    }

    public function notification($post, $comment)
    {
        $user = $post->user()->first();

        if ($user->id != Auth::user()->id) {
            $user->notify(new CommentNotification($comment, $post, Auth::user()));
        }

        $notification = $this->commentService->getNotification($user->id);

        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        $count = count($user->unreadNotifications);

        $data = [
            'content' => Auth::user()->name,
            'count' => $count++,
            'userId' => $user->id,
            'notificationId' => $notification->id
        ];

        $pusher->trigger('send-comment', 'NotifyComment', $data);

    }
}
