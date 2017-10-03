@extends('admin.layout.admin_layout')

@section('name_page')
<a id="namepage" href="#" class="active">Users</a>
@endsection

@section('main')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN VALIDATION STATES-->
        <div class="portlet light portlet-fit portlet-form bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject font-dark sbold uppercase">Thêm user</span>
                </div>
            </div>
            <div class="portlet-body">
                <!-- BEGIN FORM-->
                <form action="#" method="POST" id="editForm" class="form-horizontal" enctype="multipart/form-data">
                    {{ method_field('PUT') }}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-body">
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                            <button class="close" data-close="alert"></button>
                                    Đã có lỗi xảy ra !!!
                            </div>
                        @endif
                        @if (session('message'))
                            <div class="alert alert-success">
                                <button class="close" data-close="alert"></button>{{session('message')}}</div>
                        @endif
                        <div class="alert alert-success display-hide">
                            <button class="close" data-close="alert"></button> Thành công! </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Username
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="username" data-required="1" class="form-control" value="{{$user->username}}" />
                                <span class="required"> {{$errors->first('username')}}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Level
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">                               
                                <select id='level' class="form-control select2me" name="level" data-id="{{$user->level}}">
                                    <option id="lv1" value="1">Admin</option>
                                    <option id="lv2" value="2">Moderator</option>
                                </select>
                                <span class="required"> {{$errors->first('level')}}</span>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-md-3">Tên người dùng
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="name" data-required="1" class="form-control" value="{{$user->name}}" />
                                <span class="required"> {{$errors->first('name')}}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Email
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="email" data-required="1" class="form-control" value="{{$user->email}}" />
                                <span class="required"> {{$errors->first('email')}}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile" class="col-md-3 control-label">Hình ảnh
                            </label>
                            <div class="col-md-9">
                                <img class="responsive-img " src="{{ URL::asset('assets/upload/users/'.$user->hinh_anh) }}" alt="ảnh" class="img-circle" width="150px" height="150px">
                                <br>
                                <ul class="nav nav-tabs">
                                    <li><a href="#home" data-toggle="tab">Thay đổi ảnh</a></li>
                                    <li><a href="#info" data-toggle="tab">Xóa ảnh</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane" id="home"><input type="file" name="hinh_anh" multiple /></div>
                                    <div class="tab-pane" id="info">
                                        <button type="button" class="btn btn-danger btn-cons" id="delete_logo">Xóa ảnh</button>
                                    </div>
                                </div>
                                <span class="error">&nbsp;&nbsp;{{$errors->first('file-anh')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn green">Thêm</button>
                                <a class="btn default cancel" href="#">Hủy</a>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- END FORM-->
            </div>
            <!-- END VALIDATION STATES-->
        </div>
    </div>
</div>
@endsection
@section('js')
    <script src="{{ URL::asset('js/pathEdit.js') }}"></script>

    <script type="text/javascript">
        $(".sub-menu").css('display','block');
        $("#sub_menu_quan_ly_database").addClass("active");
        $("#active_chuyen_gia").addClass("active");
        $(document).ready(function(){
            $("#delete_logo").click(function(){
                var d1 = document.getElementById('info');
                d1.insertAdjacentHTML('afterend', '<div class="alert alert-warning auto_disable"> <h3>Nhấn Lưu để xóa ảnh</h3> <input type="hidden" name="delete_logo" value="delete"> </div>');
                    $("#delete_logo").remove();
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            var level = $('#level').attr('data-id');
            console.log(level);
            if (level == 1) {
                $('#lv1').attr('selected','selected');
            } else(level==2){
                $('#lv2').attr('selected','selected');
            } 
        });
    </script>

    <script type="text/javascript">
      $("#active-user").addClass("active");
    </script>
@endsection