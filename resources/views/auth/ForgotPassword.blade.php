@extends('auth.layouts.layout')
@section('title')
Quên mật khẩu
@endsection
@section('content')
<form method="post" class="login-form" action="{{url('password/email')}}">
    <input type="text" name="_token" value="{{CSRF_TOKEN()}}" hidden="">
        <h3 class="font-green">Quên mật khẩu</h3>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <p> Nhập email để đặt lại mật khẩu</p>
        <div class="form-group">
        	<span class="required" style="font-size:14px;"> {{$errors->first('email')}}</span>
            <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" value="{{old('email')}}"/> </div>
            <img style="margin-top: -10px; width: 80%; border: 1px solid gray" id="login_captcha" src="{{ Captcha::src() }}">
					<i class="fa fa-refresh fa-2x" style="padding: 10px;cursor: pointer; margin: 20px 0 0 5px;" aria-hidden="true" id="re_login_captcha"></i>
					<p></p>
					<span class="required"> {{$errors->first('captcha')}}</span>
					<input id="text_captcha" type="text" class="form-control" name="captcha" placeholder="Nhập mã bảo vệ">
        <div class="form-actions">
            <button type="button" id="back-btn" class="btn btn-default">Hủy</button>
            <button type="submit" class="btn btn-success uppercase pull-right">Gửi</button>
        </div>
</form>
@endsection