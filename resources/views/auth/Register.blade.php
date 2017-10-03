@extends('auth.layouts.layout')
@section('title')
Đăng ký
@endsection
@section('content')
<form class="form-horizontal" role="form" method="POST" action="{{ url('register') }}">
    {{ csrf_field() }}
    <input type="hidden" name="token" value="{{CSRF_TOKEN()}}">
    <h3 class="font-green">Đăng ký</h3>
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">Fullname</label>
        <input class="form-control placeholder-no-fix" type="text" placeholder="Fullname" name="name"   value="{{ old('name') }}" required autofocus/> 
        <span class="required" style="font-size:14px;"> {{$errors->first('name')}}</span>
    </div>
    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">Username</label>
        <input class="form-control placeholder-no-fix" type="text" placeholder="Username" name="username"   value="{{  old('username') }}" required /> 
        <span class="required" style="font-size:14px;"> {{$errors->first('username')}}</span>
    </div>
    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">Email</label>
        <input class="form-control placeholder-no-fix" type="text" placeholder="Email" name="email"   value="{{ $email or old('email') }}" required /> 
        <span class="required" style="font-size:14px;"> {{$errors->first('email')}}</span>
    </div>
    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">Password</label>
        <input class="form-control placeholder-no-fix" type="password" placeholder="Password" name="password" required />
        <span class="required" style="font-size:14px;"> {{$errors->first('password')}}</span>
    </div>
    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">Re-Password</label>
        <input class="form-control placeholder-no-fix" type="password" placeholder="Re-password" name="password_confirmation" required />
        <span class="required" style="font-size:14px;"> {{$errors->first('password_confirmation')}}</span>
    </div>
    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                Lưu
            </button>
        </div>
    </div>
</form>
@endsection