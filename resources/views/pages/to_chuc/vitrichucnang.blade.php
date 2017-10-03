@extends('pages.layout.index')

@section('content')
<div class="col-md-9 col-sm-9  main-left">
	<ul class="breadcrumb">
			<li><a href="#">Trang chủ</a></li>
			<li><a href="#">Tổ chức</a></li>
			<li>Vị trí chức năng</li>
	</ul>
	<div class=" tochuc col-md-12 col-sm-12"><h4 >Vị trí chức năng</h4></div>	
	<div class=" col-md-12 col-sm-12  introduced">
		@if(count($tochuc) > 0)
			{!!$tochuc->ViTriChucNang!!}
		@endif
	</div>
</div>
@endsection