<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<base href="{{asset('')}}">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title></title>
	<!-- fonts -->
	<link href="{{ URL::asset('pages/fonts/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
	<link href="{{ URL::asset('pages/fonts/fontawesome-webfont.woff2') }}" rel="stylesheet" type="text/css"/>
	<link href="{{ URL::asset('pages/fonts/glyphicons-halflings-regular.ttf') }}" rel="stylesheet" type="text/css"/>
	<link href="{{ URL::asset('pages/fonts/glyphicons-halflings-regular.woff') }}" rel="stylesheet" type="text/css"/>
	<link href="{{ URL::asset('pages/fonts/glyphicons-halflings-regular.woff2') }}" rel="stylesheet" type="text/css"/>
	<!-- bootstrap -->
	<link href="{{ URL::asset('pages/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">

	<!-- css -->
	<link href="{{ URL::asset('pages/css/custom.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ URL::asset('pages/css/carousel.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ URL::asset('pages/css/news.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ URL::asset('pages/css/detailsNew.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ URL::asset('assets/global/css/components.min.css') }}" rel="stylesheet" id="style_components" type="text/css" />
</head>
<body>
	<div class="bg-body">
		<div class="container bg-content">
			@include('pages.layout.header')
			<div class="clearfix"></div>
			<div class="row">
				@yield('content')
				@include('pages.layout.sidebar')
			</div><!-- main -->

			<div class="clearfix"></div>
			@include('pages.layout.footer')
		</div>
	</div>
</body>
<!-- <script src="pages/js/jssor.slider-24.1.5.min.js" type="text/javascript"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="{{ URL::asset('pages/js/custom.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('pages/js/bootstrap.min.js') }}" type="text/javascript"></script>
</html>

