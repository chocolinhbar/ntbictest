@extends('pages.layout.index')

@section('content')
<div class="col-md-9 col-sm-9  main-left">
	<ul class="breadcrumb">
			<li><a href="{{route('home')}}">{{trans('header.home')}}</a></li>
			<li><a href="">{{trans('header.news')}}</a></li>
			<li>{{$lt->Ten}}</li>
	</ul>
	<div class="line col-md-12 col-sm-12 ">
	</div>
	@foreach($tintuc as $item)
	<div class=" col-md-12 col-sm-12  listnews_item">
		<div class="col-md-3 col-sm-3   img_listnews">
			<img class="img-responsive" src="{!!url('assets/upload/tin_tuc/'.$item->HinhAnh) !!}">
		</div>
		<div class="col-md-9 col-sm-9   ">
			<div class="listnews_item_title">
				<a href="tin-tuc/{{$lt->slug}}/{{$item->slug}}">{{ $item->Ten }}</a>
			</div>
			<div class="listnews_item_description">
			{!! $item->TomTat !!}
			</div>
			<div class="listnews_item_date">

				<i class="fa fa-calendar" aria-hidden="true"> {{substr($item->created_at,0,11)}}</i> | 
				<a href="tin-tuc/{{$lt->slug}}/{{$item->slug}}">{{trans('sidebar.view_more')}}</a>

			</div>
		</div>
	</div>	
	@endforeach
	<div>
		{{$tintuc->links()}}
	</div>

</div>
@endsection