<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditUserRequest;
use App\Models\User;
use App\Services\User\UserService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
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

        $data['activeMenu'] = ['menu' => 'users', 'item' => 'list_user'];

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

        $data['activeMenu'] = ['menu' => 'users', 'item' => 'add_user'];

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

    /**
     * Function edit user
     *
     * @param User $user
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(User $user){
        $data['user'] = $user;

        $data['roles'] = [User::ROLE_ADMIN,User::ROLE_USER,User::ROLE_TEACHER];

        $data['activeMenu'] = ['menu' => 'users', 'item' => 'edit_user'];

        return view('admin.users.edit', $data);
    }

    /**
     * Function update user
     *
     * @param EditUserRequest $request
     * @param User $user
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EditUserRequest $request, User $user)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role
        ];

        $this->userService->updateUser($data, $user);

        return back()->withInput();
    }

    /**
     * Function delete user and relation
     *
     * @param User $user
     * @return array
     *
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        DB::beginTransaction();
        try {
            $user->delete();

            DB::commit();

            return redirect()->route('admin.users.index');

        } catch (ModelNotFoundException $e) {
            DB::rollback();
        }
    }
}
