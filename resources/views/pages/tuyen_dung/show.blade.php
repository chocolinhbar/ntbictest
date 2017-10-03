@extends('pages.layout.index')
<html ... xmlns:fb="http://ogp.me/ns/fb#">
<meta property="fb:admins" content="vanltt138"/>
@section('content')
<div class="col-md-9 col-sm-9  main-left">
	<ul class="breadcrumb">
		<li><a href="#">Trang chủ</a></li>
		<li><a href="#">Tổ chức</a></li>
		<li><a href="#">Tuyển dụng</a></li>
	</ul>
	<div class=" col-md-12 col-sm-12  detailsNew">
		<!--header details news-->
    	<div class="header-news col-md-12 col-sm-12">
    		<div class="row ">
	    		<h3 >
		    		{{$tuyendung->MoTa}}
		    	</h3>
	    	</div>
	    	<div class="row">
		    	<div class="date-detail-news ">
		    		Ngày bắt đầu:<span> {{substr($tuyendung->NgayBatDau,0,11)}}     </span>  <br>
		    		Ngày kết thúc:<span> {{substr($tuyendung->NgayKetThuc,0,11)}}</span>
		    	</div>
	    	</div>
    	</div>
    	<!--content detail news-->
    	<!--<div class="content-detail-news">-->
    	<div class="row">
    		<div class="content-detail-tuyendung col-md-12 col-sm-12">
    			{!!$tuyendung->NoiDungTuyenDung!!}
    		</div>
    	</div>
	</div>
</div>
@endsection

