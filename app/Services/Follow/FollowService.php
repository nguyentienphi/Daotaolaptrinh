<?php
namespace App\Services\Follow;
use App\Services\BaseService;
use App\Models\Follow;
use App\Models\User;
use Auth;

class FollowService extends BaseService
{
    public function getModel()
    {
        return Follow::class;
    }

    public function create($input)
    {
        return Follow::create($input);
    }

    public function getFollow()
    {
        $follows = Auth::user()->follows;
        $users = [];

        foreach ($follows as $follow) {
            $users[] = User::findOrFail($follow->follower_id);
        }

        return $users;
    }

    public function unFollow($id){
        $follows = Auth::user()->follows;

        foreach ($follows as $follow) {
            if ($follow->follower_id == $id) {
                $unFollow = $follow->delete();
            }
        }

        return $unFollow;
    }
}
