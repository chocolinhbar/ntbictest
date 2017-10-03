@extends('pages.layout.index')
@section('content')
<div class="col-md-9 col-sm-9 main-left">
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Wrapper for slides -->
      	<div class="carousel-inner">
	        @if(count($tintuc) > 0)
          <?php
            $tin1 = $tintuc->shift();
            $loai_tin_1 = App\LoaiTin::find($tin1->loai_tin_id);
          ?>
	        <div class="item active">
	          	<a href="{!!url('tin-tuc/'.$loai_tin_1->slug.'/'.$tin1->slug)!!}"><img src="{!!url('assets/upload/tin_tuc/'.$tin1->HinhAnh) !!}"></a>
	           	<div class="carousel-caption">
		            <h4><a href="{!!url('tin-tuc/'.$loai_tin_1->slug.'/'.$tin1->slug)!!}">{{$tin1->Ten}}</a></h4>
		            <p>{!!$tin1->TomTat!!}</p>
	          	</div>
	        </div><!-- End Item -->
	 		@foreach($tintuc as $item)
			<?php
				$loai_tin = App\LoaiTin::find($item->loai_tin_id);
			?>
	         <div class="item">
	          	<a href="{!!url('tin-tuc/'.$loai_tin->slug.'/'.$item->slug)!!}"><img src="{!!url('assets/upload/tin_tuc/'.$item->HinhAnh) !!}"></a>
	           	<div class="carousel-caption">
		            <h4><a href="{!!url('tin-tuc/'.$loai_tin->slug.'/'.$tin1->slug)!!}">{{$item->Ten}}</a></h4>
					<p>{!!$item->TomTat!!}</p>
	          	</div>
	        </div><!-- End Item -->
			@endforeach         
      	</div><!-- End Carousel Inner -->
	 
	    <ul class="list-group col-sm-4">
		    <li data-target="#myCarousel" data-slide-to="0" class="list-group-item active"><div>{{$tin1->Ten}}</div></li>
		    @for($i = 0; $i < count($tintuc); $i++)
		    <li data-target="#myCarousel" data-slide-to="{{$i+1}}" class="list-group-item"><div>{{$tintuc[$i]->Ten}}</div></li>
			@endfor
	    </ul>
 
      <!-- Controls -->
      	<div class="carousel-controls">
          	<a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
          	</a>
          	<a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
          	</a>
      	</div>
		  @endif
    </div><!-- End Carousel -->
    <div class="clearfix"></div>
    <div class="advert margintop">
    	<img src="pages/image/anhdep.jpg" alt="">
    </div> <!-- advert -->
    <div class="clearfix"></div>
	<div class="margintop">
		<div class="col-md-6 news_1">
			<div class="header-blue">
				<a href="{!!url('tin-tuc/doanh-nghiep')!!}" title="" class="group_header_link">{{trans('content.business_news')}}</a>
				<a href="{!!url('tin-tuc/doanh-nghiep')!!}" title="" class="A_ViewMore">{{trans('sidebar.view_more')}}</a>
			</div>
			@if(count($tin_doanh_nghiep) > 0)
			<?php
				$tin_dn_1  = $tin_doanh_nghiep->shift();
			?>
			<div class="news_header">
				<div class="col-md-6 link_img">
					<a href="{!!url('tin-tuc/doanh-nghiep/'.$tin_dn_1->slug)!!}" title="">
						<img src="{!!url('assets/upload/tin_tuc/'.$tin_dn_1->HinhAnh)!!}" alt="">
					</a>
				</div>
				<div class="col-md-6 link_title">
					<a href="{!!url('tin-tuc/doanh-nghiep/'.$tin_dn_1->slug)!!}" title="">
						<p>{{$tin_dn_1->Ten}}</p>
					</a>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="list_news">
				@foreach ($tin_doanh_nghiep as $item)
				<li>
					<a href="{!!url('tin-tuc/doanh-nghiep/'.$item->slug)!!}" title="">
						<i class="fa fa-newspaper-o" aria-hidden="true"></i> <span>{{$item->Ten}}</span>
					</a>
				</li>
				@endforeach
			</div>
			@endif
		</div>
		<div class="col-md-6 news_2">
			<div class="header-blue">
				<a href="{!!url('tin-tuc/khoi-nghiep')!!}" title="" class="group_header_link">{{trans('content.start_up_news')}}</a>
				<a href="{!!url('tin-tuc/khoi-nghiep')!!}" title="" class="A_ViewMore">{{trans('sidebar.view_more')}}</a>
			</div>
			@if(count($tin_khoi_nghiep) > 0)
			<?php
				$tin_kn_1  = $tin_khoi_nghiep->shift();
			?>
			<div class="news_header">
				<div class="col-md-6 link_img">
					<a href="{!!url('tin-tuc/khoi-nghiep/'.$tin_kn_1->slug)!!}" title="">
						<img src="{!!url('assets/upload/tin_tuc/'.$tin_kn_1->HinhAnh)!!}" alt="">
					</a>
				</div>
				<div class="col-md-6 link_title">
					<a href="{!!url('tin-tuc/khoi-nghiep/'.$tin_kn_1->slug)!!}" title="">
						<p>{{$tin_kn_1->Ten}}</p>
					</a>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="list_news">
				@foreach ($tin_khoi_nghiep as $item)
				<li>
					<a href="{!!url('tin-tuc/khoi-nghiep/'.$item->slug)!!}" title="">
						<i class="fa fa-newspaper-o" aria-hidden="true"></i> <span>{{$item->Ten}}</span>
					</a>
				</li>
				@endforeach
			</div>
			@endif
		</div>
	</div>
    <div class="link-home margintop">
    	<div class="link-icon col-xs-3 col-md-3 text-center">
    		<span>
    			<a href="" title="">
    				<img src="pages/image/book.png" alt="">
    			</a>
    		</span>
    		<br>
    		<span>
    			<a href="" title="">{{trans('content.incubate')}}</a>
    		</span>
    	</div>
    	<div class="link-icon col-xs-3 col-md-3 text-center">
    		<span>
    			<a href="{!!url('cong-nghe')!!}" title="">
    				<img src="pages/image/hatnhan.png" alt="">
    			</a>
    		</span>
    		<br>
    		<span>
    			<a href="{!!url('cong-nghe')!!}" title="">{{trans('content.technology')}}</a>
    		</span>
    	</div>
    	<div class="link-icon col-xs-3 col-md-3 text-center">
    		<span>
    			<a href="{!!url('tin-tuc/khoi-nghiep')!!}" title="">
    				<img src="pages/image/uomtao.png" alt="">
    			</a>
    		</span>
    		<br>
    		<span>
    			<a href="{!!url('tin-tuc/khoi-nghiep')!!}" title="">{{trans('content.start_up')}}</a>
    		</span>
    	</div>
    	<div class="link-icon col-xs-3 col-md-3 text-center">
    		<span>
    			<a href="http://csdl.ntbic.com" title="">
    				<img src="pages/image/dulieu.png" alt="">
    			</a>
    		</span>
    		<br>
    		<span>
    			<a href="http://csdl.ntbic.com" title="">{{trans('content.database')}}</a>
    		</span>
    	</div>
    </div>
    <div class="clearfix"></div>
    <!-- đối tác -->
	<div class="padding-top-20">
		<div class="doitac">
			<a href="" title="">{{trans('content.partner')}}</a>
		</div>
		<div class="padding-top-20">
			<div class="clearfix"></div>
        	<div class="row padding-top-20"">
        	  <div class="col-md-1 col-xs-1 "></div>
        	  @foreach($logodoitac as $item)
        	  <div class="col-md-2 col-xs-2 "><a href="{{url($item->Link)}}" class="thumbnail"><img src="{{url('assets/upload/logo_doitac/'.$item->HinhAnh)}}" alt="Image" style="max-width:100%;"></a></div>
        	  @endforeach       	  
        	</div><!--.row-->  
		</div>
	</div>
</div>
@endsection