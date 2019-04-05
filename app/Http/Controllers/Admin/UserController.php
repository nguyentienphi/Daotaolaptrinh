<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddUserRequest;
use App\Models\User;
use App\Services\User\UserService;
use Zend\Diactoros\Request;

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

    /**
     * Function show view create user
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $data['roles'] = [User::ROLE_ADMIN,User::ROLE_USER,User::ROLE_TEACHER];

        return view('admin.users.add', $data);
    }

    /**
     * @param Request $request
     */
    public function store(AddUserRequest $request)
    {
        $data = [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
            'role' => $request->role,
            'coin_number' => config('settings.coin_default'),
            'avatar' => config('settings.avatar')
        ];

        if ($this->userService->createUser($data)) {
            return redirect()->route('admin.users.index');
        }
    }
}
