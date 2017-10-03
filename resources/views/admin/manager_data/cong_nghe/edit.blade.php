@extends('admin.layout.admin_layout')

@section('name_page')
<a href="#" class="active" id="namepage">Công nghệ</a>
@endsection

@section('main')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN VALIDATION STATES-->
        <div class="portlet light portlet-fit portlet-form bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject font-dark sbold uppercase">Sửa thông tin công nghệ</span>
                </div>
            </div>
            <div class="portlet-body">
                <!-- BEGIN FORM-->
                <form action="#" method="POST" id="editForm" class="form-horizontal">
                        {{ method_field('PUT') }}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                            <button class="close" data-close="alert"></button>{{session('status')}}</div>
                        @endif
                        <div class="form-group">
                            <label class="control-label col-md-3">Language
                            </label>
                            <div class="col-md-4">
                                <select id="locale" class="form-control select2me" name="locale" data-locale="{{$locale}}">                                   
                                    <option id="vi" value="vi">Tiếng Việt</option>
                                    <option id="en" value="en">Tiếng Anh</option>
                                </select>
                            </div>
                        </div>
                       <div class="form-group">
                            <label class="control-label col-md-3">Tên đề tài
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <span class="required"> {{$errors->first('Ten')}} </span>
                                <input type="text" name="Ten" data-required="1" class="form-control" / value="{{$congnghe->Ten}}"> </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Giới thiệu chung <span class="required"> * </span>
                            </label>
                            <div class="col-md-9">
                                <span class="required"> {{$errors->first('NoiDung')}} </span>
                                <textarea name="NoiDung" data-required="1" class="form-control ckeditor" rows="4">{{$congnghe->NoiDung}}</textarea>
                            </div>
                        </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn green">Sửa</button>
                                <a type="button" class="btn default cancel" href="#">Hủy</a>
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
    <script src="{{ URL::asset('js/ajaxRequestLocale.js') }}"></script>
    <script type="text/javascript">
        $(".sub-menu").css('display','block');
        $("#sub-menu-manager-data").addClass("active");
        $("#active-cong-nghe").addClass("active");
    </script>
@endsection