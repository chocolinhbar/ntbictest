@extends('pages.layout.index')

@section('content')
<div class="col-md-9 col-sm-9  main-left">
	<ul class="breadcrumb">
			<li><a href="trangchu">Trang chủ</a></li>
			<li><a href="tochuc">Tổ chức</a></li>
			<li>Giới thiệu chung</li>
	</ul>
	<div class=" tochuc col-md-12 col-sm-12"><h4 >Giới thiệu chung</h4></div>
	<div class=" col-md-12 col-sm-12  introduced">
		@if(count($tochuc) > 0)
			{!!$tochuc->GioiThieuChung!!}
		@endif
	</div>
</div>
@endsection