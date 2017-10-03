@extends('pages.layout.index')

@section('content')
<div class="col-md-9 col-sm-9  main-left">
	<ul class="breadcrumb">
			<li><a href="{{route('home')}}">Trang chủ</a></li>
			<li><a href="{!!url('chuyen-gia')!!}">Chuyên gia</a></li>
	</ul>
	@foreach($chuyengia as $item)
	<div class=" col-md-12 col-sm-12  listnews_item">
		<div class="col-md-3 col-sm-3   img_listnews">
			<img class="img-responsive" src="{{ URL::asset('assets/upload/chuyen_gia/'.$item->HinhAnh) }}">
		</div>
		<div class="col-md-9 col-sm-9   ">
			<div class="listnews_item_title">
				{{ $item->Ten }}
			</div>
			<div class="listnews_item_description">
			    {!! $item->ChucVu !!}
			</div>
		</div>
	</div>	
	@endforeach
</div>
@endsection