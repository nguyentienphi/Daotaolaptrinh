<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comment;
use App\Services\Comment\CommentService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    protected $commentService;

    public function __construct()
    {
        $this->commentService = new CommentService();
    }

    public function index()
    {
        $data['comments'] =  $this->commentService->getAll();

        $data['activeMenu'] = ['menu' => 'comments', 'item' => 'list_comment'];

        return view('admin.comments.index', $data);
    }

    /**
     * Function delete user and relation
     *
     * @param Comm $user
     * @return array
     *
     * @throws \Exception
     */
    public function destroy(Comment $comment)
    {
        if ($comment->delete()) {
            return redirect()->route('admin.comments.index');
        }
    }
}
