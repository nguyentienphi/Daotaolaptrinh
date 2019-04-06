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
        $post->comments()->create([
            'user_id' => Auth::user()->id,
            'content' => $data,
            'parent_id' => config('settings.comment')
        ]);
    }
}
