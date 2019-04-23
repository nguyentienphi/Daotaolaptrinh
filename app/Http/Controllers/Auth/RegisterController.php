<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function register(RegisterRequest $request)
    {
        $data = $request->only([
            'name',
            'email',
            'password',
        ]);

        $input = [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'role' => config('settings.user'),
            'avatar' => config('settings.avatar'),
            'gender' => null,
            'address' => null,
            'coin_number' => config('settings.coin_default'),
            'phone' => null
        ];
        $user = User::create($input);

        if ($user) {
            Auth::login($user);

            return response()->json(true);
        }

        return response()->json(false);
    }
}
