<?php
namespace App\Services\Post;
use App\Services\BaseService;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;
use Auth;
use Session;

class PostService extends BaseService
{
    public function getModel()
    {
        return Post::class;
    }

    public function getAllComment($postId)
    {
        $comments = Comment::where('commentable_id', $postId)
        ->paginate(config('settings.paginate.comment'));

        return $comments;
    }

    public function updateViewNumber($id)
    {
        $post = Post::findOrFail($id)->increment('view_number');
    }

    public function getMorePost($user, $id)
    {
        $morePost = Post::where('user_id', $user)
            ->where('status', config('settings.status.approved'))
            ->where('id', '!=', $id)->get();

        return $morePost;
    }

    public function getAllPost()
    {
        return Post::orderBy('created_at', 'desc')
                ->paginate(7);
    }

    public function updatePost(array $data, $post)
    {
        return $post->fill($data)->save();
    }

    public function createPost(array $data)
    {
        return $this->fill($data)->save();
    }
}
