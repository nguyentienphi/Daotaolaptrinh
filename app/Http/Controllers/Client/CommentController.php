<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Comment\CommentService;
use App\Services\Post\PostService;
use App\Services\User\UserService;
use App\Services\Video\VideoService;
use Auth;
use App\Notifications\CommentNotification;
use Pusher\Pusher;

class CommentController extends Controller
{
    protected $commentService;
    protected $postService;
    protected $userService;
    protected $videoService;

    public function __construct(
        CommentService $commentService,
        PostService $postService,
        UserService $userService,
        VideoService $videoService
    )
    {
        $this->commentService = $commentService;
        $this->postService = $postService;
        $this->userService = $userService;
        $this->videoService = $videoService;
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
        $user = $post->user()->first();
        $this->notification($post, $comment, $user);

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

        $comment = $this->commentService->replyCommentPost($post, $content, $parentId);
        $user = $this->commentService->findOrFail($request->parentCommentReply)->user;
        $this->notification($post, $comment, $user);

        return response()->json([
            'success' => true,
            'avatar' => asset(Auth::user()->avatar),
            'name' => Auth::user()->name,
            'userId' => $user->id
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

    public function notification($post, $comment, $user)
    {
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
            'notificationId' => $notification->id,
            'parentId' => $comment->parent_id
        ];

        $pusher->trigger('send-comment', 'NotifyComment', $data);

    }

    public function addCommentVideo(Request $request)
    {
        if (!$request->ajax()) {
            return response()->json([
                'success' => false
            ]);
        }

        $videoId = $this->videoService->findOrFail($request->videoId);
        $content = $request->content;
        $course = $videoId->courses()->first();
        $user = $course->users()->where('role', 3)->first();

        $commentVideo = $this->commentService->addCommentVideo($videoId, $content);

        return response()->json([
            'success' => true,
            'image' => asset(Auth::user()->avatar),
            'name' => Auth::user()->name,
            'id' => $commentVideo->id
        ]);
    }

}
