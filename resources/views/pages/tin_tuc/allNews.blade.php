@extends('pages.layout.index')		
		
@section('content')		
<div class="col-md-9 col-sm-9  main-left">		
	<ul class="breadcrumb">		
			<li><a href="#">Trang chủ</a></li>		
			<li><a href="#">Tin tức </a></li>		
			<!-- <li>Tin tổng hợp</li> -->		
	</ul>		
	@foreach($tintuc as $item)		
	<?php		
		$loai_tin = App\LoaiTin::find($item->loai_tin_id);		
	?>		
	<div class=" col-md-12 col-sm-12  listnews_item">		
		<div class="col-md-3 col-sm-3   img_listnews">		
			<img class="img-responsive" src="assets/upload/tin_tuc/{{$item->HinhAnh}}">		
		</div>		
		<div class="col-md-9 col-sm-9   ">		
			<div class="listnews_item_title">		
				<a href="{!!url('tin-tuc/'.$loai_tin->slug.'/'.$item->slug) !!}">{{ $item->Ten }}</a>		
			</div>		
			<div class="listnews_item_description">		
			{!! $item->TomTat !!}		
			</div>		
			<div class="listnews_item_date">		
				<i class="fa fa-calendar" aria-hidden="true"> {{substr($item->updated_at,0,11)}}</i> | 		
				<a href="{!!url('tin-tuc/'.$loai_tin->slug.'/'.$item->slug) !!}">Xem thêm </a>		
			</div>		
		</div>		
	</div>			
	@endforeach		
		
	<div>		
		{{$tintuc->links()}}		
	</div>		
		
</div>		
@endsection 