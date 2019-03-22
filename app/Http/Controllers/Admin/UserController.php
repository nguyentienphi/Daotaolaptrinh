<?php

namespace App\Http\Controllers\Admin;

use App\Services\UserService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    public function index(){
        $users = $this->userService->getAll();
        dd($users);
    }
}
