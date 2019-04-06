<?php

namespace App\Services\User;

use App\Services\BaseService;
use App\Models\User;
use Auth;
use DB;

class UserService extends BaseService
{
    public function getModel()
    {
        return User::class;
    }

    public function registerCoures($course_id)
    {
        $this->findOrFail(Auth::user()->id)->courses()->attach($course_id);
    }

    public function getCoin()
    {
        $user = $this->findOrFail(Auth::user()->id);

        return $user->coin_number;
    }

    public function getCourse()
    {
        return $this->findOrFail(Auth::user()->id)->courses()->paginate(config('settings.paginate.register_course'));
    }

    public function updateCoinNumber($user_id, $coin_number)
    {
        $user = $this->findOrFail($user_id);

        $user->update(['coin_number' => $coin_number]);
    }

    public function checkRegisterCourse($course_id)
    {
        $user_id = Auth::user()->id;
        $course = DB::table('user_course')->where('user_id', $user_id)
            ->where('course_id', $course_id)->exists();

        return $course;
    }

    /**
     * get list user of sys
     *
     * @return mixed
     */
    public function getAll()
    {
        $users = User::orderBy('id', 'desc')
            ->paginate();

        return $users;
    }

    /**
     * @param array $dataUser
     * @return mixed
     */
    public function createUser(array $data)
    {
        return $this->create($data);
    }
}
