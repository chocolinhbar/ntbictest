<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<base href="{{asset('')}}">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title></title>
	<link href="{{ URL::asset('pages/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ URL::asset('pages/css/custom.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ URL::asset('pages/fonts/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
	<link href="{{ URL::asset('pages/css/sukien.css') }}" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<div class="bg-body">
		<div class="container bg-content">
			@include('pages.layout.header')
			<div class="clearfix"></div>
			<div class="row">
				@yield('content')
				
			</div><!-- main -->

			<div class="clearfix"></div>
			@include('pages.layout.footer')
		</div>
	</div>
</body>
<!-- <script src="pages/js/jssor.slider-24.1.5.min.js" type="text/javascript"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="{{ URL::asset('pages/js/sukien.js') }}" type="text/javascript"></script>
</html>

