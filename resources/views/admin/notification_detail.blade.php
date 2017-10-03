@extends('admin.layout.admin_layout')

@section('name_page')
<a href="#" class="active" id="namepage">Notification</a>
@endsection

@section('main')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-green-sharp">
                    <i class="fa fa-bell-o font-green-sharp"></i>
                    <span class="caption-subject bold uppercase">{{$notif->Title}}</span>
                    <!-- <span class="caption-helper">monthly stats...</span> -->
                </div>
                <div class="actions">
                    <a class="btn btn-circle btn-icon-only btn-default delete-modal" data-toggle="modal" href="#delete" data-id="{{$notif->id}}" data-level="{{Auth::user()->level}}" data-user="{{Auth::user()->id}}">
                        <i class="icon-trash"></i>
                    </a>
                    <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;"> </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="scroller" style="height:400px" data-always-visible="1" data-rail-visible="1" data-rail-color="red" data-handle-color="green">
                    {!! $notif->Content !!}
                </div>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
<div class="modal fade bs-modal-sm" id="delete" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Xóa thông báo</h4>
            </div>
            <div class="modal-body"> 
                <form>
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    Bạn chắc chắn muốn xóa thông báo này? 
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                <button type="button" id="delete" class="btn red">Delete</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection
@section('js')
    <script type="text/javascript">
        $('.delete-modal').click(function() {
            var id = $(this).data("id");
            var user_id = $(this).data("user");
            var user_level = $(this).data("level");
            var url_delete = '';
            if (user_level == 1) {
                url_delete = 'admin/notification-delete/' + id;
            } else {
                url_delete = 'moderator/notification-delete/' + id;
            }
            var href_profile = '';
            if(user_level == 1) {
                href_profile = 'admin/profile';
            } else {
                href_profile = 'moderator/profile';
            }
            $('#delete').click(function() {
                $.ajax({
                    type: 'post',
                    dataType: 'json',
                    url: url_delete,
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': id,
                        'user_id': user_id,
                        'user_level': user_level
                    },
                    success: function() {
                        window.history.go(-1);
                        location.reload();
                    }
                });
            });
        });
    </script>
@endsection
