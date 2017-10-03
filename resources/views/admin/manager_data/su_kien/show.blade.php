@extends('admin.layout.admin_layout')

@section('name_page')
<a id="namepage" href="#" class="active">Sự kiện</a>
@endsection

@section('main')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN VALIDATION STATES-->
        <div class="portlet light portlet-fit portlet-form bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject font-dark sbold uppercase"> Người đăng ký sự kiện</span>
                </div>
            </div>
            <div class="portlet-body">
                 <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                    <thead>
                        <tr>
                            <th> STT </th>
                            <th> Tên</th>
                            <th> Email </th>
                            <th> Phone </th>
                            <th> Ngày đăng ký</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($dangky as $item)
                        <tr class="odd gradeX">
                            <td>{{$item->id}}</td>
                            <td>{!! $item->Ten !!}</td>
                            <td>{!! $item->email !!}</td>
                            <td>{{$item->phone}}</td>
                            <td>{{$item->created_at}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $dangky->links() !!}
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
          $("#active-su-kien").addClass("active");
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                var pathname = window.location.pathname;
                $('#namepage').attr('href', pathname.substr(0,pathname.length-2));
            });
        </script>
@endsection
