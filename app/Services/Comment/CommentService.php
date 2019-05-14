<?php
namespace App\Services\Comment;
use App\Services\BaseService;
use App\Models\Comment;
use Auth;
use DB;
use Carbon\Carbon;

class CommentService extends BaseService
{
    public function getModel()
    {
        return Comment::class;
    }

    public function addCommentPost($post, $data) {
        return $post->comments()->create([
            'user_id' => Auth::user()->id,
            'content' => $data,
            'parent_id' => config('settings.comment')
        ]);
    }

    public function replyCommentPost($post, $content, $parentId)
    {
        return $post->comments()->create([
            'user_id' => Auth::user()->id,
            'content' => $content,
            'parent_id' => $parentId
        ]);
    }

    public function getNotification($user)
    {
        $notification = DB::table('notifications')
            ->where('notifiable_id', $user)
            ->orderBy('created_at', 'desc')->first();

        return $notification;
    }

    public function updateNotification($id)
    {
        DB::table('notifications')->where('id', $id)->update([
            'read_at' => Carbon::now()
        ]);
        $notification = DB::table('notifications')->where('id', $id)->first();

        return $notification;
    }

    public function getAll()
    {
        return Comment::orderBy('created_at', 'desc')
            ->paginate(7);
    }

    public function addCommentVideo($video, $content) {
        return $video->comment()->create([
            'user_id' => Auth::user()->id,
            'content' => $content,
            'parent_id' => config('settings.comment')
        ]);
    }
}
