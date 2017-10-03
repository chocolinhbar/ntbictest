@extends('admin.layout.admin_layout')

@section('name_page')
<a id="namepage" href="#" class="active">Tin tức</a>
@endsection

@section('main')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN VALIDATION STATES-->
        <div class="portlet light portlet-fit portlet-form bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject font-dark sbold uppercase">Sửa tin tức</span>
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
                            <label class="control-label col-md-3">Tin tức
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="ten" data-required="1" class="form-control" value="{{$tintuc->Ten}}" />
                                <span class="required"> {{$errors->first('ten')}}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Loại tin
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <select class="form-control select2me" name="loai_tin">
                                    @foreach($loaitin as $item)
                                        @if($item->id == $tintuc->loai_tin_id)
                                            <option value="{{$item->id}}" selected>{{$item->Ten}}</option>
                                        @else
                                            <option value="{{$item->id}}" >{{$item->Ten}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <span class="required"> {{$errors->first('loai_tin')}}</span>
                            </div>
                        </div>
                        <div class="form-group last">
                            <label class="control-label col-md-3">Tóm tắt
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-9">
                                <textarea class="ckeditor form-control" name="tom_tat" rows="6" data-error-container="#editor2_error">
                                    {{$tintuc->TomTat}}
                                </textarea>
                                <span class="required"> {{$errors->first('tom_tat')}}</span>
                            </div>
                        </div>
                        <div class="form-group last">
                            <label class="control-label col-md-3">Nội dung
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-9">
                                <textarea class="ckeditor form-control" name="noi_dung" rows="6" id="noi_dung">
                                    {{$tintuc->NoiDung}}
                                </textarea>
                                <span class="required"> {{$errors->first('noi_dung')}}</span>
                            </div>
                        </div>                       
                        <div class="form-group">
                            <label for="exampleInputFile" class="col-md-3 control-label">Hình ảnh
                            </label>
                            <div class="col-md-9">
                                <img class="responsive-img " src="{{ URL::asset('assets/upload/tin_tuc/'.$tintuc->HinhAnh) }}" alt="ảnh" class="img-circle" width="150px" height="150px">
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
                        <div class="form-group">
                        <label class="control-label col-md-3">Nổi bật
                            <span class="required"> * </span>
                        </label>
                        <div class="col-md-4">
                            <div class="radio-list" >
                            @if($tintuc->status == 0)
                                <label>
                                    <input type="radio" name="status" value="1" /> Có </label>
                                <label>
                                    <input type="radio" name="status" value="0" checked/> Không </label>
                            @else
                                <label>
                                    <input type="radio" name="status" value="1" checked/> Có </label>
                                <label>
                                    <input type="radio" name="status" value="0" /> Không </label>
                            @endif
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn green">Sửa</button>
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
    <script src="{{ URL::asset('js/ajaxRequestLocale.js') }}"></script>

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

    <script type="text/javascript">
      $(".sub-menu").css('display','block');
      $("#sub-menu-manager-data").addClass("active");
      $("#active-tin-tuc").addClass("active");
    </script>
@endsection
