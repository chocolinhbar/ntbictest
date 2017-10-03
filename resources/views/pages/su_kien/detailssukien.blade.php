@extends('pages.layout.index-sukien')

@section('content')
<div class="col-md-12 col-sm-12">
	<div class="col-md-9 col-sm-9 main-left">
		<ul class="breadcrumb">
			<li><a href="{{route('home')}}">Trang chủ</a></li>
			<li><a href="{!!url('su-kien')!!}">Sự kiện</a></li>
		</ul>
		<div class=" col-md-12 col-sm-12  detailsNew" style="padding-top:0px">
			<!--header details news-->
	    	<h2>{{$sukien->Ten}}</h2>
	    	<!--<div class="content-detail-news">-->
	    	<div class="row col-md-12">
	    		<div class="content-detail-news">
	    			{!!$sukien->NoiDung!!}
	    		</div>
	    	</div>
	    	<!--footer news-->
	    	<div class="row col-md-12" >
	    		<p>Thời gian diễn ra sự kiện: {{$sukien->NgayBatDau}} {{$sukien->NgayKetThuc}}<p>
	    	</div>
	    	<div class="row col-md-12">
	    		<button  id="register" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" data-id="{{$sukien->id}}">Đăng ký</button>
	    	</div>
		</div>	
	</div>
	<div class="col-md-3 col-md-3 sukiensapdienra">
		<h3>
	        Sự kiện sắp diễn ra
	    </h3>
	    @foreach($sukiensapdienra as $item)
		<div class="row">
			<div class="col-md-12 col-ms-12">		        
		        <img src="{{ URL::asset($item->HinhAnh) }}"  class="img-responsive" alt="{{$item->Ten}}" style="width:100%;height:144px">
	        	<a href="su-kien/{{$item->slug}}" title="{{$item->Ten}}">  <strong> {{$item->Ten}} </strong></a>
	        	<br>
	        	<i class="fa fa-clock-o" aria-hidden="true"> {{$item->NgayBatDau}}</i>
		    </div>
		</div>
		<hr>
		<br>
		@endforeach()
	</div>
</div>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      	<div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title">Đăng ký thông tin tham gia sự kiện: {{$sukien->Ten}} </h4>
	        </div>
	        <div class="modal-body">
	       		<form class="form-horizontal">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Họ và tên :
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-6">
                                <input type="text" name="ten" data-required="1" class="form-control" value={{old('ten')}}> 
                                 <span class="required"> {{$errors->first('ten')}}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Email :
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-6">
                                <input type="text" name="email" data-required="1" class="form-control" value={{old('email')}}> 
                                 <span class="required"> {{$errors->first('email')}}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Số điện thoại :
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-6">
                                <input type="text" name="phone" data-required="1" class="form-control" value={{old('')}}> 
                                 <span class="required"> {{$errors->first('phone')}}</span>
                            </div>
                        </div>
                         
                    </div>
                </form>
			</div>
			<div class="modal-footer">
                <div class="row">
                    <div class="col-md-offset-3 col-md-9">
                        <button type="submit" id="submit" class="btn btn-primary green">Đăng ký</button>
                        <button type="button" class="btn green" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
       	</div>
    </div>
</div>
@endsection


