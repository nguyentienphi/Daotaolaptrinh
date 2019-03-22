<?php
namespace App\Services;

use App\Models\User;

class UserService extends BaseService
{
    /**
     * Function get list user
     *
     * @return User[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return User::all();
    }
}
