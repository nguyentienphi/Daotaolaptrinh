<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\User\UserService;

class UserController extends Controller
{
    protected $userService;

    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->userService =  new UserService();
    }

    /**
     * Show list user
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $data['users'] = $this->userService->getAll();

        foreach ($data['users'] as $user) {
            if ($user->role == User::ROLE_ADMIN) {
                $user->role = "Admin";
            } elseif ($user->role == User::ROLE_USER) {
                $user->role = "User";
            } else {
                $user->role = "Teacher";
            }
        }

        return view('admin.users.index', $data);
    }
}
