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
                    <span class="caption-subject font-dark sbold uppercase">Gửi thông báo</span>
                </div>
            </div>
            <div class="portlet-body">
                <!-- BEGIN FORM-->
                <form action="{!! url('admin/send-notif') !!}" method="POST" id="createForm" class="form-horizontal" enctype="multipart/form-data">
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
                        <div class="form-group">
                            <label class="control-label col-md-3">Tiêu đề
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="title" data-required="1" class="form-control" value="{{old('title')}}" />
                                <span class="required"> {{$errors->first('title')}}</span>
                            </div>
                        </div>
                        <div class="form-group last">
                            <label class="control-label col-md-3">Nội dung
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-9">
                                <textarea class="ckeditor form-control" name="content" rows="6" data-error-container="#editor2_error">
                                    {{old('content')}}
                                </textarea>
                                <span class="required"> {{$errors->first('content')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn green">Gửi</button>
                                <a class="btn default" href="{{route('users.index')}}" >Hủy</a>
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
    <script type="text/javascript">
        $(document).ready(function() {
            console.log(window.location.pathname);
            var pathname = window.location.pathname;
            $('#namepage').attr('href', pathname.substr(0,pathname.length-7));
            var create_path = pathname.substr(0,pathname.length-7);
            $('#createForm').attr('action',create_path);
        });
    </script>

    <script type="text/javascript">
      $("#active-user").addClass("active");
    </script>
@endsection