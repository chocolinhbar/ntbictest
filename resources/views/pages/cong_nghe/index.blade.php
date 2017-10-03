@extends('pages.layout.index')

@section('content')
<div class="col-md-9 col-sm-9  main-left">
	<ul class="breadcrumb">
		<li><a href="{{route('home')}}">{{trans('header.home')}}</a></li>
		<li>{{trans('header.technology')}}</li>
	</ul>
	<div class="line col-md-12 col-sm-12 ">
	</div>
	@foreach($congnghe as $item)
	<div class=" col-md-12 col-sm-12  listnews_item">
		<div class="col-md-12 col-sm-12   ">
			<div class="listnews_item_title">
			    <h4><a href="cong-nghe/{{$item->slug}}">{{$item->Ten}}</a></h4>
			</div>
			<div class="listnews_item_date">
			<i class="fa fa-calendar" aria-hidden="true"> {{$item->created_at}}</i> | 
			<a href="cong-nghe/{{$item->slug}}">{{trans('sidebar.view_more')}}</a>
			</div>
		</div>
	</div>
	@endforeach
	<div>
		{{$congnghe->links()}}
	</div>
</div>
@endsection