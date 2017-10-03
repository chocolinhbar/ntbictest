@extends('admin.layout.admin_layout')

@section('name_page')
<a id="namepage" href="#" class="active">Tổ chức</a>
@endsection

@section('main')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject bold uppercase"> Thông tin tổ chức</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-6">
                            @if ($count==0)
                            <div class="btn-group">
                                <a id="create" class="btn sbold green btn-outline" href="#"><span class="fa fa-pencil"></span> Tạo thông tin tổ chức</a>
                            </div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <div class="btn-group pull-right">
                                <select id="locale" class="form-control select2me btn green  btn-outline dropdown-toggle" name="locale" data-locale="{{$locale}}">Print
                                    <option id='vi' value="vi">Tiếng Việt</option>
                                    <option id='en' value="en">Tiếng Anh</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                @if (session('message'))
                    <div class="alert alert-success">
                    <button class="close" data-close="alert"></button>{{session('message')}}</div>
                @endif
                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                    <tbody>
                        @foreach($tochuc as $item)
                        <tr class="odd gradeX">
                            <td ></td>
                            <td style="float:right"><div ><a href="#" class="edit" data-id="{{$item->id}}" ><span class="fa fa-pencil-square" > Chỉnh sửa</span></a></div></td>
                        </tr>
                        <tr class="odd gradeX">
                            <td width="200px">Giới thiệu chung</td>
                            <td colspan="3">{!!$item->GioiThieuChung!!}</td> 
                        </tr>
                        <tr class="odd gradeX">
                            <td  width="200px">Vị trí chức năng</td>
                            <td colspan="3">{!!$item->ViTriChucNang!!}</td> 
                        </tr>
                        <tr class="odd gradeX">
                            <td  width="200px">Sứ mệnh tầm nhìn</td>
                            <td colspan="3">{!!$item->SuMenhTamNhin!!}</td>
                        </tr>
                        <tr class="odd gradeX">
                            <td  width="200px">Cơ cấu</td>
                            <td colspan="3">{!!$item->CoCau!!}</td> 
                        </tr>
                        <tr class="odd gradeX">
                            <td  width="200px">Đội ngũ trung tâm</td>
                            <td colspan="3">{!!$item->DoiNguTrungTam!!}</td>
                        </tr>

                        @endforeach
                    </tbody> 
                </table>
                {!! $tochuc->links() !!} 
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
@endsection
@section('js')
   <script src="{{ URL::asset('js/pathIndex.js') }}"></script>
   <script src="{{ URL::asset('js/ajaxRequestLocale.js') }}"></script>
   <script type="text/javascript">
      $(".sub-menu").css('display','block');
      $("#sub-menu-manager-data").addClass("active");
      $("#active-to-chuc").addClass("active");
    </script>
@endsection