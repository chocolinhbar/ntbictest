@extends('auth.layouts.layout')
@section('title')
Đặt lại mật khẩu
@endsection
@section('content')
<form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
    {{ csrf_field() }}
    <input type="hidden" name="token" value="{{ $token }}">
    <h3 class="font-green">Đặt lại mật khẩu</h3>
    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">Email</label>
        <input class="form-control placeholder-no-fix" type="text" placeholder="Email" name="email"   value="{{ $email or old('email') }}" required autofocus/> 
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