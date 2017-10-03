<header id="header" class="header">
</header><!-- /header -->

<nav class="navbar navbar-default bg-navbar">
  	<div class="container-fluid">
  		<div class="navbar-header">
	      	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>                        
	     	 </button>
	     	 <a class="home-icon" href="/">
	     	 	<img src="pages/image/home.png" alt="">
	     	 </a>
	    </div>
	    <div class="collapse navbar-collapse"  id="myNavbar">
		    <ul class="nav navbar-nav">
		      	<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">{{trans('header.about')}}<span class="caret"></span></a>
			        <ul class="dropdown-menu sub-menu">
			          <li><a href="{!! url('gioi-thieu-chung') !!}">{{trans('header.overview')}}</a></li>
			          <li><a href="{!! url('vi-tri-chuc-nang') !!}">{{trans('header.position_function')}}</a></li>
			          <li><a href="{!! url('su-menh-tam-nhin') !!}">{{trans('header.mission_vision')}}</a></li>
			          <li><a href="{!! url('co-cau') !!}">{{trans('header.structure')}}</a></li>
			          <li><a href="{!! url('doi-ngu-trung-tam') !!}">{{trans('header.expert')}}</a></li>
			          <li><a href="{!! url('chuyen-gia') !!}">{{trans('header.rules')}}</a></li>
			          <li><a href="{!! url('cau-hoi-thuong-gap') !!}">{{trans('header.faq')}}</a></li>
			          <li><a href="{!! url('tuyen-dung') !!}">{{trans('header.recruitment')}}</a></li>
			          
			        </ul>
				</li>
		      	<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="{!! url('tin-tuc') !!}">{{trans('header.news')}}<span class="caret"></span></a>
			        <ul class="dropdown-menu sub-menu">
								@foreach($loaitin as $item)
			          <li><a href="{!! url('tin-tuc/'.$item->slug) !!}">{{$item->Ten}}</a></li>
			          
								@endforeach
			        </ul>
				</li>
		      	<li><a href="{!! url('su-kien') !!}">{{trans('header.events')}}</a></li>
		      	<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="{!! url('doi-tac') !!}">{{trans('header.partners')}} <span class="caret"></span></a>
			        <ul class="dropdown-menu sub-menu">
			          <!--<li><a href="{!! url('doi-tac/doi-tac-to-chuc') !!}">Đối tác tổ chức</a></li>
			          <li><a href="{!! url('doi-tac/doi-tac-doanh-nghiep') !!}">Đối tác doanh nghiệp</a></li>
			          <li><a href="{!! url('doi-tac/doi-tac-ca-nhan') !!}">Đối tác cá nhân</a></li>-->
								@foreach($loaidoitac as $item)
			          <li><a href="{!! url('doi-tac/'.$item->slug) !!}">{{$item->Ten}}</a></li>
								@endforeach
			        </ul>
				</li>
		      	<li><a href="{!! url('http://csdl.ntbic.com/') !!}">{{trans('header.datas')}}</a></li>
		      	<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="{!! url('http://ntbic.com/') !!}">{{trans('header.incubate')}}<span class="caret"></span></a>
			      <!--   <ul class="dropdown-menu sub-menu">
			          <li><a href="{!! url('http://ntbic.com/') !!}">Ươm tạo trực tiếp</a></li>
			          <li><a href="{!! url('http://ntbic.com/') !!}">Ươm tạo ảo</a></li>
			          <li><a href="{!! url('http://ntbic.com/') !!}">Thủ tục ươm tạo</a></li>
			        </ul> -->
				</li>
		      	<li><a href="cong-nghe">{{trans('header.technology')}}</a></li>
		      	<li><a href="{!! url('lien-he') !!}">{{trans('header.contact')}}</a></li>
		    </ul>
		    <form action="{!! url('search') !!}" class="navbar-form navbar-left">
		      <div class="input-group">
		        <input type="text" class="form-control" name="text_search" placeholder="Search" value="@if(isset($text_search)){{$text_search}}@endif">
		        <div class="input-group-btn">
		          	<button class="btn btn-default" type="submit">
		            	<i class="glyphicon glyphicon-search"></i>
		          	</button>
		        </div>
		      </div>
		    </form>
	    </div>
  	</div>
</nav> <!-- navigation -->
<div class="">
	<div class="BG_Menu">
	    <div class="Menu_Mini">
	        <ul class="UL_Menu_Mini" style="display: block;">
				<li class="LI_Menu_Mini">|</li>
				<li class="LI_Menu_Mini">
					<img src="pages/image/icon/hoidap.gif" /><a href="{!!url('cau-hoi-thuong-gap')!!}">{{trans('header.question')}}</a>
				</li>

				<li class="LI_Menu_Mini">|</li>
				<li class="LI_Menu_Mini">
					@if (!Auth::check())
						<img src="pages/image/icon/poll.gif" /><a href="{{route('login')}}">{{trans('header.login')}}</a>
					@else
						<img src="pages/image/icon/poll.gif" /><a href="{{route('logout')}}">{{trans('header.logout')}}</a>
					@endif
				</li>

				<li class="LI_Menu_Mini">|</li>
				<li class="LI_Menu_Mini" >
					@if ($locale == 'en')
 						<img src="pages/image/icon/tiengviet.gif" /><a id="locale" href="#" data-locale="vi"> Tiếng việt </a>
 					@else
 						<img src="pages/image/icon/tienganh.gif" /><a id="locale" href="#" data-locale="en"> English </a>
 					@endif
  				</li>
 				<li class="LI_Menu_Mini">|</li>
			</ul>
	    </div>
	</div>
</div>
