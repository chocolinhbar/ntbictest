@extends('pages.layout.index')
<html ... xmlns:fb="http://ogp.me/ns/fb#">
<meta property="fb:admins" content="vanltt138"/>
@section('content')
<div class="col-md-9 col-sm-9  main-left">
	<ul class="breadcrumb">
		<li><a href="{{route('home')}}">{{trans('header.home')}}</a></li>
		<li><a href="">{{trans('header.partners')}}</a></li>
		<li><a href="">{{$ldt->Ten}}</a></li>
	</ul>
	<div class=" col-md-12 col-sm-12  detailsNew">
		<!--header details news-->
    	<div class="header-news col-md-12 col-sm-12">
    		<div class="row ">
	    		<h3 >
		    		{{$doitac->Ten}}
		    	</h3>
	    	</div>
    	</div>
    	<!--content detail news-->
    	<!--<div class="content-detail-news">-->
    	<div class="row">
    		<div class="content-detail-tuyendung col-md-12 col-sm-12">
    			{!!$doitac->NoiDung!!}
    		</div>
    	</div>
	</div>
</div>
@endsection

