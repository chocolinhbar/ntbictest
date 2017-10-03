@extends('auth.layouts.layout')
@section('title')
Đăng nhập
@endsection
@section('content')
            <!-- BEGIN LOGIN FORM -->
            
            <form class="login-form"  method="post" action="{{url('login')}}">
            <input type="text" name="_token" value="{{CSRF_TOKEN()}}" hidden="">
                <h3 class="form-title font-green">Đăng nhập</h3>
                @if (Session::has('message'))
                  <div class="alert alert-info">{{ Session::get('message') }}</div>
               @endif
                @if(count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                        {{$err}}<br>
                    @endforeach
                </div>
                 @endif
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                </div>
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Username</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username" value="{{old('username')}}" /> </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" /> </div>
                <div class="form-actions">
                    <button type="submit" class="btn green uppercase">Đăng nhập</button>
                    <label class="rememberme check">
                        <input type="checkbox" name="remember" value="1" />Remember </label>
                    <a href="{{url('password/reset')}}" id="forget-password" class="forget-password">Quên mật khẩu</a>
                </div>
                <div class="create-account">
                    <p>
                        <a href="{{url('register')}}" id="register-btn" class="uppercase">Tạo tài khoản</a>
                    </p>
                </div>
            </form>
@endsection