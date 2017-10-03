@extends('admin.layout.admin_layout')

@section('name_page')
<a id="namepage" href="#" class="active">Thông tin tổ chức</a>
@endsection

@section('main')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN VALIDATION STATES-->
        <div class="portlet light portlet-fit portlet-form bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject font-dark sbold uppercase">Tạo thông tin tổ chức</span>
                </div>
            </div>
            <div class="portlet-body">
                <!-- BEGIN FORM-->
                <form action="#" method="POST" id="createForm" class="form-horizontal">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-body">
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                            <button class="close" data-close="alert"></button>
                                Lỗi!
                            </div>
                        @endif
                        <div class="alert alert-success display-hide">
                            <button class="close" data-close="alert"></button> Thành công! </div>
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
                        <div class="form-group last">
                            <label class="control-label col-md-3">Giới thiệu chung
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-9">
                                <textarea class="ckeditor form-control" name="gioi_thieu_chung" rows="6" id="editor">{{old('gioi_thieu_chung')}}</textarea>
                                <span class="required">{{$errors->first('gioi_thieu_chung')}}</span>
                            </div>
                        </div>
                        <div class="form-group last">
                            <label class="control-label col-md-3">Vị trí chức năng
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-9">
                                <textarea class="ckeditor form-control" name="vi_tri_chuc_nang" rows="6" id="editor">{{old('vi_tri_chuc_nang')}}</textarea>
                                <span class="required"> {{$errors->first('vi_tri_chuc_nang')}}</span>
                            </div>
                        </div>
                        <div class="form-group last">
                            <label class="control-label col-md-3">Sứ mệnh tầm nhìn
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-9">
                                <textarea class="ckeditor form-control" name="su_menh_tam_nhin" rows="6" id="editor">{{old('su_menh_tam_nhin')}}</textarea>
                                <span class="required"> {{$errors->first('su_menh_tam_nhin')}}</span>
                            </div>
                        </div>
                         <div class="form-group last">
                            <label class="control-label col-md-3">Cơ cấu
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-9">
                                <textarea class="ckeditor form-control" name="co_cau" rows="6" id="editor">{{old('co_cau')}}</textarea>
                                <span class="required"> {{$errors->first('co_cau')}}</span>
                            </div>
                        </div>
                         <div class="form-group last">
                            <label class="control-label col-md-3">Đội ngũ trung tâm
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-9">
                                <textarea class="ckeditor form-control" name="doi_ngu_trung_tam" rows="6" id="editor">{{old('doi_ngu_trung_tam')}}</textarea>
                                <span class="required"> {{$errors->first('doi_ngu_trung_tam')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn green">Thêm</button>
                                <a class="btn default" href="#" onclick="history.go(-1)">Hủy</a>
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
    <script src="{{ URL::asset('js/path.js') }}"></script>
    <script src="{{ URL::asset('js/ajaxRequestLocale.js') }}"></script>
    <script type="text/javascript">
      $(".sub-menu").css('display','block');
      $("#sub-menu-manager-data").addClass("active");
      $("#active-to-chuc").addClass("active");
    </script>
@endsection

