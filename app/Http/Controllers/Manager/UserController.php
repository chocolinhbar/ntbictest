<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Mail;
use Session;
use App\Mail\ActiveAccount;
use App\Mail\Notification;
use Illuminate\Support\Facades\Hash;
use App\Notifications;
use App\NotificationReceived;

class UserController extends Controller
{

    public function index() {
    	$user = DB::table('users')->paginate(10);
    	return view('admin.manager_data.user.index',['users'=> $user]);
    }

    public function create() {
    	return view('admin.manager_data.user.create');
    }

    public function store(Request $request) {
        $this->validate($request,
            [
                'username' => 'required|unique:users,username',
                'email' => 'required|email|unique:users,email',
                'hinh_anh' => 'image|mimes:jpeg,bmp,png,jpg',
                'name' => 'required',
                'level' => 'required'
            ],
            [
                'username.required' => 'Bạn cần nhập username',
                'username.unique' => 'username đã tồn tại',
                'name.required' => 'Bạn cần nhập tên',
                'email.required' => 'Bạn cần nhập email',
                'email.unique' => 'email đã được sử dụng',
                'email.email' => 'Định dạng email không hợp lệ',
                'hinh_anh.image' => 'Bạn cần chọn 1 ảnh',
                'hinh_anh.mimes' => "Bạn chỉ có thể chọn ảnh có định dạng: jpeg,bmp,png,jpg",
                'level.required' => 'Cần chọn quyền của người dùng'
            ]);

        $user = new User;
        $user->username = $request->username;
        $user->name = $request->name;
        $user->level = $request->level;
        $user->email = $request->email;
        $user->email_token = str_random(10);
        $pass = str_random(6);
        $user->password = bcrypt($pass); 

        if($request->hasFile('hinh_anh')){
            $file = $request->file('hinh_anh');
            $duoi = $file->getClientOriginalExtension();

            $name = $file->getClientOriginalName();
            $hinh_anh = str_random(4)."_".$name;
            while(file_exists("assets/upload/users".$hinh_anh)){
                $hinh_anh = str_random(4)."_".$name;
            }
            $file->move("assets/upload/users",$hinh_anh);
            $user->hinh_anh = $hinh_anh;
        }
        else{
            $user->hinh_anh = "";
        }
        DB::beginTransaction();
        try{
            $user->save();
            $id=$user->id;
            $user1 = User::find($id);
             Mail::to($request->email)->send(new ActiveAccount(
                $request->name,
                $request->email,
                $request->username,
                $pass,
                url('user/verify/'.$user1->email_token)
                ));
            DB::commit();
            Session::flash('message', 'Bạn đã nhận được mail xác nhận đăng ký tài khoản');
            return redirect()->route('users.index');
        }
        catch(Exception $e)
        {
            DB::rollback(); 
            return back();
        }
    }

    public function edit($id) {
    	$user = User::find($id);
    	return view('admin.manager_data.user.edit', ['user' => $user]);
    }

    public function update(Request $request, $id) {
        $this->validate($request,
            [
                'username' => 'required',
                'email' => 'required|email',
                'hinh_anh' => 'image|mimes:jpeg,bmp,png,jpg',
                'name' => 'required',
                'level' => 'required'
            ],
            [
                'username.required' => 'Bạn cần nhập username',
                'username.unique' => 'username đã tồn tại',
                'name.required' => 'Bạn cần nhập tên',
                'email.required' => 'Bạn cần nhập email',
                'email.unique' => 'email đã được sử dụng',
                'email.email' => 'Định dạng email không hợp lệ',
                'hinh_anh.image' => 'Bạn cần chọn 1 ảnh',
                'hinh_anh.mimes' => "Bạn chỉ có thể chọn ảnh có định dạng: jpeg,bmp,png,jpg",
                'level.required' => 'Cần chọn quyền của người dùng'
            ]);

        $user = User::find($id);
        $user->username = $request->username;
        $user->name = $request->name;
        $user->level = $request->level;
        $user->email = $request->email;

        $pass = '123456';
        $user->password = bcrypt($pass);

        if($request->hasFile('hinh_anh')){
            $file = $request->file('hinh_anh');
            $duoi = $file->getClientOriginalExtension();

            $name = $file->getClientOriginalName();
            $hinh_anh = str_random(4)."_".$name;
            while(file_exists("assets/upload/users".$hinh_anh)){
                $hinh_anh = str_random(4)."_".$name;
            }
            $file->move("assets/upload/users",$hinh_anh);
            $user->hinh_anh = $hinh_anh;
        } else {
            $user->hinh_anh = "";
        }

        $user->save();
        return redirect()->back()->with('message',"Bạn đã sửa user thành công");
    }

    public function destroy($id) {
    	$user = User::find($id);
    	$user->delete();
    	return $user->toJson();
    }
    public function verify_user_mo($token)
    {
        $useractive = User::where('email_token', $token)->first();
        if($useractive == null) {
            Session::flash('message','Tài khoản đã kích hoạt!!!');
        } else {
            $useractive->verified();
            Session::flash('message', 'Bạn đã kích hoạt thành công. Hãy đăng nhập tại đây!!!');
        }
       
       return redirect()->route('login');
    }

    public function getProfile() {
        $user = Auth::user();
        return view('admin.manager_data.user.profile')->with('user',$user);
    }

    public function updateProfile(Request $request) {
        $this->validate($request,
            [
                'email' => 'required|email',
                'name' => 'required'
            ],
            [
                'name.required' => 'Bạn cần nhập tên',
                'email.required' => 'Bạn cần nhập email',
                'email.unique' => 'email đã được sử dụng',
                'email.email' => 'Định dạng email không hợp lệ',
            ]);

        $user = Auth::user();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->back()->with('user',$user);
    }

    public function updateAvatar(Request $request) {
        $this->validate($request,
            [
                'hinh_anh' => 'image|mimes:jpeg,bmp,png,jpg'
            ],
            [
                'hinh_anh.image' => 'Bạn cần chọn 1 ảnh',
                'hinh_anh.mimes' => "Bạn chỉ có thể chọn ảnh có định dạng: jpeg,bmp,png,jpg",
            ]);

        $user = Auth::user();

        if($request->hasFile('hinh_anh')){
            $file = $request->file('hinh_anh');
            $duoi = $file->getClientOriginalExtension();

            $name = $file->getClientOriginalName();
            $hinh_anh = str_random(4)."_".$name;
            while(file_exists("assets/upload/users".$hinh_anh)){
                $hinh_anh = str_random(4)."_".$name;
            }
            $file->move("assets/upload/users",$hinh_anh);
            $user->hinh_anh = $hinh_anh;
        } else {
            $user->hinh_anh = "a";
        }

        $user->save();

        return redirect()->back()->with('user',$user);
    }

    public function updatePassword(Request $request) {
        $this->validate($request,
            [
                'current_pass' => 'required',
                'new_pass' => 'required'
            ],
            [
                'current_pass.required' => 'Bạn cần nhập password',
                'new_pass.required' => 'Bạn cần nhập password mới'
            ]);

        $user = Auth::user();

        if ($request->retype_pass != $request->new_pass) {
            return redirect()->back()->withErrors('Password không trùng khớp');
        } elseif(!Hash::check($request->current_pass, $user->password)) {
            return redirect()->back()->withErrors('Password không chính xác');
        } else {
            $user->password = bcrypt($request->new_pass);
            $user->save();

            return redirect()->back()->with('user',$user);
        }
    }

    //send notification for all moderator users
    public function getSendNotification() {
        return view('admin.manager_data.user.send_notification');
    }

    public function postSendNotification(Request $request) {
        if (Auth::check() && Auth::user()->level == 1) {
            $this->validate($request,
            [
                'title' => 'required',
                'content' => 'required'
            ],
            [
                'title.required' => 'Bạn cần nhập tiêu đề thông báo',
                'content.required' => 'Bạn cần nhập nội dung thông báo'
            ]);

            $admin = Auth::user();
            $moderators = User::where('level', 2)->where('verified', 1)->get();

            //create notification
            $notif = new Notifications;

            $notif->Title = $request->title;
            $notif->Content = $request->content;
            $notif->user_sent_id = $admin->id;

            DB::beginTransaction();
            try{
                $notif->save();
                foreach($moderators as $item)
                Mail::to($item->email)->send(new Notification(
                    $item->name,
                    $request->title,
                    $request->content ));
                DB::commit();
                Session::flash('message', 'Bạn đã gửi thông báo thành công');                
            }
            catch(Exception $e)
            {
                DB::rollback(); 
                return back();
            }
            //create receive user
            foreach ($moderators as $mod) {
                $notif_received = new NotificationReceived;

                $notif_received->user_receive_id = $mod->id;
                $notif_received->notification_id = $notif->id;
                $notif_received->is_read = 0;
                
                $notif_received->save();
            }
        }
        
        return redirect()->route('users.index');
    }

    public function getDetailNotification($id) {
        $notif = Notifications::find($id);

        $user = Auth::user();
        $notif_received = NotificationReceived::where('user_receive_id', $user->id)->where('notification_id',$id)->first();
        if (!is_null($notif_received)) {
            $notif_received->is_read = 1;
            $notif_received->save();    
        }

        return view('admin.notification_detail')->with(['notif' => $notif]);
    }

    public function DeleteNotification(Request $request, $id) {
        if ($request->user_level == 1) {
            $notif = Notifications::find($id);
            $notif->delete();
            return $notif->toJson();
        }
        elseif ($request->user_level == 2) {
            $notif = NotificationReceived::where('notification_id', $id)->where('user_receive_id', $request->user_id)->first();
            $notif->delete();
            return $notif->toJson();
        }

        return redirect()->back();
    }
}
