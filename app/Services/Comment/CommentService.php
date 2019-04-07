<?php
namespace App\Services\Comment;
use App\Services\BaseService;
use App\Models\Comment;
use Auth;
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
        $post->comments()->create([
            'user_id' => Auth::user()->id,
            'content' => $content,
            'parent_id' => $parentId
        ]);
    }
}
