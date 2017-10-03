@extends('pages.layout.index')

@section('content')
<div class="col-md-9 col-sm-9  main-left">
	<ul class="breadcrumb">
			<li><a href="#">Trang chủ</a></li>
			<li><a href="#">Tổ chức</a></li>
		<li>Tuyển dụng</li>
	</ul>
	<div class="line col-md-12 col-sm-12 ">
	</div>
	@foreach($tuyendung as $item)
	<div class=" col-md-12 col-sm-12  listnews_item">
		<div class=" col-md-12 col-sm-12 ">
			<div class="listnews_item_title">
			<h4><a href="tuyen-dung/{{$item->slug}}">{{$item->MoTa}}</a></h4>
			</div>
			<div class="listnews_item_description">
			{!!$item->NoiDungTuyenDung!!}
			</div>
			<div class="listnews_item_date">

			<i class="fa fa-calendar" aria-hidden="true"> {{substr($item->NgayBatDau,0,11)}}</i> | 

			<a href="tuyen-dung/{{$item->slug}}">Xem thêm </a>
			</div>
		</div>
	</div>
	@endforeach
	
</div>
@endsection