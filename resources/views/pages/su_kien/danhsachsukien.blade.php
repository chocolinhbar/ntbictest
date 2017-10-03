@extends('pages.layout.index-sukien')

@section('content')
<div class="col-md-12 col-sm-12">
	<ul class="breadcrumb">		
		<li><a href="#">Trang chủ</a></li>		
		<li><a href="#">sự kiện</a></li>		
		<!-- <li>Tin tổng hợp</li> -->		
	</ul>	
	@if($countsukienslideshow > 0)
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
    
      <!-- Wrapper for slides -->
      <div class="carousel-inner">
      
        <div class="item active">
          	<img src="{{ URL::asset($sukienslideshow[0]-> HinhAnh) }}">
        </div><!-- End Item -->
        @if($countsukienslideshow > 1)
	        @for($i=1 ; $i < $countsukienslideshow ; $i++)
	        <div class="item">
	          	<img src="{{ URL::asset($sukienslideshow[$i]-> HinhAnh) }}">
	        </div><!-- End Item --> 
	        @endfor
        @endif     
      </div><!-- End Carousel Inner -->

        <ul class="nav nav-pills nav-justified">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          @if($countsukienslideshow > 1)
	          @for($i=1 ; $i < $countsukienslideshow ; $i++)
	          <li data-target="#myCarousel" data-slide-to="$i"></li>
	          @endfor
          @endif
        </ul>
    </div><!-- End Carousel -->
    @endif
	<!-- tin tuc noi bat -->
	<div class="row">
		@foreach($sukiennoibat as $item)
	    <div class="col-md-3 col-sm-3">
	      <div class="thumbnail">
	        <img src="{{ URL::asset($item->HinhAnh) }}"  class="img-responsive" alt="{{$item->Ten}}" style="width:100%;height:144px">
	        <a href="su-kien/{{$item->slug}}" title="{{$item->Ten}}">  <strong> {{$item->Ten}} </strong></a>
	        <br>
	        <i class="fa fa-clock-o" aria-hidden="true"> {{$item->NgayBatDau}}</i>
	        </div>
	    </div>
	    @endforeach
	</div>
	<hr>
	<!-- tong hop tat ca tin tuc -->
	<div class="col-md-12 col-sm-12 events">
		<h4>
	        <span class="fa fa-caret-down"></span> Danh sách sự kiện
	    </h4>
	    @foreach($sukien as $item)
    	<div class="col-md-4 col-sm-4 event">
    		<div class="mota">
	        	<img src="{{ URL::asset($item->HinhAnh) }}"  class="img-responsive" alt="{{$item->Ten}}" style="width:100%;height:179px">
	        	<a href="su-kien/{{$item->slug}}" title="{{$item->Ten}}" class="name">  <strong> {{$item->Ten}} </strong></a>
	        	<br>
	        	<i class="fa fa-clock-o" aria-hidden="true">  {{$item->NgayBatDau}}</i>
	        	<br>
		        <i class="fa fa-map-marker" aria-hidden="true"> {{$item->DiaChi}}</i>
	        </div>
	    </div>
		@endforeach
	</div>
	<div>
		{{$sukien->links()}}
	</div>
</div>
@endsection