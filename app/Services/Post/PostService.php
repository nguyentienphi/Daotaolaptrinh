<?php
namespace App\Services\Post;
use App\Services\BaseService;
use App\Models\Post;
class PostService extends BaseService
{
    public function getModel()
    {
        return Post::class;
    }
}
