<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use Hash;
use Session;
use Exception;
use App\Services\User\UserService;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\ChangePasswordRequest;


class ProfileController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $user = Auth::user();

        return view('clients.profiles.index', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();

        return view('clients.profiles.edit', compact('user'));
    }

    public function update(ProfileRequest $request)
    {
        DB::beginTransaction();

        try {
            $user = $this->userService->findOrFail(Auth::user()->id);
            $this->userService->updateUser($request->all(), $user);
            Session::flash('success', trans('profile.success'));

            DB::commit();
        } catch (Exception $e) {
            Session::flash('error', trans('profile.fail'));

            DB::rollback();
        }

        return redirect()->route('profile.index');
    }

    public function getChangePassword()
    {
        return view('clients.profiles.change_password');
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        DB::beginTransaction();

        try {
            $user = Auth::user();

            if (!Hash::check($request->oldpassword, $user->password)) {
                $error = trans('profile.oldpassword_fail');
                throw new Exception('Old password wrong');
            } elseif ($request->newpassword != $request->retypepassword) {
                $error = trans('profile.password_confirm_wrong');
                throw new Exception('New password wrong');
            }

            $update['password'] = $request->newpassword;
            $this->userService->updateUser($update, $user);
            Session::flash('success', trans('profile.change_success'));

            DB::commit();
        } catch (Exception $e) {
            if (!isset($error)) {
                Session::flash('error', trans('profile.change_fail'));
            }

            Session::flash('error', $error);
        }

        return back();
    }
}
