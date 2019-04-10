<?php
namespace App\Services\Post;
use App\Services\BaseService;
use App\Models\Post;
use App\Models\Comment;
use Auth;

class PostService extends BaseService
{
    public function getModel()
    {
        return Post::class;
    }

    public function getAllComment()
    {
        $posts = Auth::user()->posts->where('status', config('settings.status.approved'));
        foreach ($posts as $post) {
            $postId[] = ($post->id);
        }

        $comments = Comment::whereIn('commentable_id', $postId)
            ->paginate(config('settings.paginate.comment'));

        return $comments;
    }
}
