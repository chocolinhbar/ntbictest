<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\User;
use Auth;
use Mail;
use DB;
use Session;
use App\Mail\EmailVerification;

class RegisterController extends Controller
{

    protected $redirectPath = 'login';
    public function showRegistrationForm()
    {
        if (!Auth::check()) {
            return view('auth.Register');
        }else{
            return redirect()->route('home');
        }     
    }
    public function register(Request $request)
    {
        $validator = $this->validator($request->all());
        if($validator->fails()){
            $this->throwValidationException($request, $validator);
        }
        DB::beginTransaction();
        try{
            $user = $this->create($request->all());
            $email = new EmailVerification(new User(['email_token' => $user->email_token,'name'=>$user->name,'username'=>$user->username,'email'=>$user->email]));
            Mail::to($user->email)->send($email);
            DB::commit();
            Session::flash('message', 'Bạn đã nhận được mail xác nhận đăng ký tài khoản');
            return back();
        }
        catch(Exception $e)
        {
            DB::rollback(); 
            return back();
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'username' => 'required|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'username' => $data['username'],
            'hinh_anh' => '',
            'password' => bcrypt($data['password']),
            'level' =>3,
            'email_token' => $data['token'],
        ]);
    }

    protected function guard()
    {
        return Auth::guard('web');
    }
    public function verify($token)
    {
        $useractive = User::where('email_token', $token)->first();
        if($useractive == null) {
            Session::flash('message','Tài khoản đã kích hoạt!!!');
        } else {
            $useractive->verified();
            Session::flash('message', 'Bạn đã kích hoạt thành công! Hãy đăng nhập tại đây.');
        }
       
       return redirect()->route('login');
    }
}
