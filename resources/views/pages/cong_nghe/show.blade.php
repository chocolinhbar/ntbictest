@extends('pages.layout.index')
<html ... xmlns:fb="http://ogp.me/ns/fb#">
<meta property="fb:admins" content="vanltt138"/>
@section('content')
<div class="col-md-9 col-sm-9  main-left">
	<ul class="breadcrumb">
		<li><a href="{{route('home')}}">Trang chủ</a></li>
		<li>Công nghệ</li>
	</ul>
	<div class=" col-md-12 col-sm-12  detailsNew">
        @if(count($congnghe) > 0)
		<div class="header-news col-md-12 col-sm-12">
    		<div class="row">
	    		<h3 >
		    		{{$congnghe->Ten}}
		    	</h3>
	    	</div>
    	</div>
    	<div class="row ">
    		<div class="content-detail-congnghe col-md-12 col-sm-12">
    			{!!$congnghe->NoiDung!!}
    		</div>
    	</div>
        @endif
	</div>
</div>
@endsection

