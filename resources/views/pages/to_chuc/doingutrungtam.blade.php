@extends('pages.layout.index')

@section('content')
<div class="col-md-9 col-sm-9  main-left">
	<ul class="breadcrumb">
			<li><a href="#">Trang chủ</a></li>
			<li><a href="#">Tổ chức</a></li>
			<li>Đội ngũ trung tâm</li>
	</ul>
	<div class=" tochuc col-md-12 col-sm-12"><h4 >Đội ngũ trung tâm</h4></div>
	<div class=" col-md-12 col-sm-12  introduced">
		@if(count($tochuc) > 0)
			{!!$tochuc->DoiNguTrungTam!!}
		@endif
	</div>
</div>
@endsection