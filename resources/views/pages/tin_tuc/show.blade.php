@extends('pages.layout.index')
<html ... xmlns:fb="http://ogp.me/ns/fb#">
<meta property="fb:app_id" content="679916892204765" />
<meta property="fb:admins" content="100005319492123"/>
@section('content')
<div class="col-md-9 col-sm-9  main-left">
	<ul class="breadcrumb">
		<li><a href="{{route('home')}}">{{trans('header.home')}}</a></li>
		<li><a href="">{{trans('header.news')}}</a></li>
		<li><a href="">{{$tenlt}}</a></li>
	</ul>
	<div class=" col-md-12 col-sm-12  detailsNew">
		<!--header details news-->
    	<div class="header-news">
    		<div class="row">
	    		<h3 class="title-detail-news col-md-12 col-sm-12">
		    		{{$tintuc->Ten}}
		    	</h3>
	    	</div>
	    	<div class="row col-md-12 col-sm-12">
		    	<div class="date-detail-news ">
		    		<i class="fa fa-calendar" aria-hidden="true"></i>
		    		<span>{{substr($tintuc->updated_at,0,11)}} | {{substr($tintuc->updated_at,11,13)}} GMT+7</span>
		    	</div>
	    	</div>
	    	<div class="row col-md-12 col-sm-12">
		    	<div  class="share-detail-news ">
			    	<ul class="list-inline" >
	  					<li id="plug">
	  						<div class="fb-like" data-href="{!!url('tin-tuc/'.$lt.'/'.$tintuc->slug) !!}" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="true"></div>
	  					</li>
					</ul>
		    	</div>
	    	</div>
    	</div>
    	<!--content detail news-->
    	<!--<div class="content-detail-news">-->
    	<div class="row col-md-12 col-sm-12">
    		<div class="content-detail-news ">
    			{!!$tintuc->NoiDung!!}
    		</div>
    	</div>
    	<!--footer news-->
    	<div class="row col-md-12 col-sm-12" >
    		<div class="footer-detail-news">
    			<div  class="share-detail-news">
			    	<ul class="list-inline" >
	  					<li id="plug">
	  						<div class="fb-like" data-href="{!!url('tin-tuc/'.$lt.'/'.$tintuc->slug) !!}" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="true"></div>
	  					</li>
	  					<i class="fa fa-pencil" aria-hidden="true"> Bộ khoa học và Công nghệ</i>
					</ul>
		    	</div>
		    	<div class="people-write">
		    	</div>	
    		</div>
    	</div>
    	<!--coment-->
    	<div class="other-news col-md-12 col-sm-12">
    		<div class=row>
	    		<h4 id="name-div-other-news">
	    			Bình luận
	    		</h4>
	    		<!--plugin comment facebook-->
	    		<!-- <div class="fb-comments" data-href="{!!url('tin-tuc/'.$lt.'/'.$tintuc->slug) !!}" data-numposts="5"></div> -->
	    		<div class="fb-comments" data-href="{!!url('tin-tuc/'.$lt.'/'.$tintuc->slug) !!}" data-width="100%" data-numposts="5"></div>
    		</div>
    	</div>
    	<!--other news-->
    	<div class="other-news col-md-12 col-sm-12">
    		<div class=row>
	    		<h4 id="name-div-other-news">
	    			TIN LIÊN QUAN
	    		</h4>
    		</div>
    	</div>
    	<div class="row">
    		<div class="row list-other-news col-md-12 col-sm-12">
    			@foreach($tinlienquan as $item)    		
				<div class="col-md-3 ">
				    <div class="thumbnail" style="height: 200px">			      
				        <img src="assets/upload/tin_tuc/{{$item->HinhAnh}}" alt="Lights" style="width:100%; height: 100px;">
			        	<h3>
			        		<div class="name-news">
								<a href="tin-tuc/{{$lt}}/{{$item->slug}}" title="{{$item->Ten}}">  <strong> {{ $item->Ten }} </strong></a>
							</div>
			        	</h3>
			        	<p  class="date">
			        	</p>
				    </div>
				</div>
				@endforeach
    		</div>	
    	</div>
	</div>
</div>
@endsection

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.10&appId=679916892204765";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>