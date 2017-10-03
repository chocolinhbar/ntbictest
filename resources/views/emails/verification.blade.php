<p style="color:black; font-size: 20px; font-weight: bold; text-align: center;">TRANG QUẢN TRỊ DỮ LIỆU NTBIC</p>
<p style="color:black; font-size: 20px; font-weight: bold; text-align: center;">THÔNG BÁO</p>

<p style="color:black; font-size: 18px; ">Xin chào {{$user->name}} !</p>
<p style="color:black; font-size: 18px; ">Cổng thông tin NTBIC thông báo báo bạn đã được đăng ký tài khoản truy cập trang quản lý dữ liệu khoa học & công nghệ tại {{ url('/') }}.</p>
<p style="color:black; font-size: 18px; color: blue">Tên tài khoản: {{$user->username}}</p>
<p style="color:black; font-size: 18px; color: blue">Email đăng ký: {{$user->email}}</p>
<p style="color:black; font-size: 18px; ">Truy cập kích hoạt tài khoản tại {{url('user/verify/'.$user->email_token)
}} để kích hoạt tài khoản.</p>


<p> Cảm ơn,</p>
<p>NTBIC</p>