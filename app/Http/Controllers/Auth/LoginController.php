<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

  //  use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function getLogin() {
        return view('auth.login');
    }

    public function postLogin(Request $request) {
        $this->validate($request,
            [
                'username'=>'required|exists:users,username',
                'password'=>'required'
            ],
            [
                'username.required'=>'Bạn chưa nhập username',
                'username.exists' => 'Tài khoản hoặc mật khẩu không đúng!',
                'password.required'=>'Bạn chưa nhập password',
            ]);

       if (Auth::attempt(['username' => $request->username, 'password' => $request->password,'level'=>1,'verified'=>1])) {
            return redirect('admin');
        } elseif (Auth::attempt(['username' => $request->username, 'password' => $request->password,'level'=>2,'verified'=>1])) {
            return redirect('moderator');
        } elseif (Auth::attempt(['username' => $request->username, 'password' => $request->password,'level'=>3,'verified'=>1])) {
            return redirect()->route('home');
        } else {
            return redirect()->back()->withInput();
        } 
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('home');;
    }
    public function credentials(Request $request)
    {
        return [
            'email' => $request->email,
            'password' => $request->password,
            'verified' => 1,
        ];
    }
}
