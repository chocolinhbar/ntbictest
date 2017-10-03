<div class="col-md-3 col-sm-3 main-right">
	<div class="img-sidebar padding-top-20">
	@foreach($hinhanhsidebar as $item)
		<a href="{{url($item->Link)}}" title="">
			<img src="{{url($item->HinhAnh)}}" alt="">
		</a>
	@endforeach	
	</div>
	<div class="clearfix padding-top-20"></div>
	<div class="header-blue">
		<a href="" title="" class="group_header_link">{{trans('sidebar.hot_news')}}</a>
		<a href="" title="" class="A_ViewMore">{{trans('sidebar.view_more')}}</a>
	</div>
	<div class="clearfix padding-top-20"></div>
	@foreach($tinnoibat as $item)
	<?php
		$loai_tin = App\LoaiTin::find($item->loai_tin_id);
	?>
	<div class="row padding-top-10">

		<div class="col-md-5 col-xs-5 top_news">
			<a href="{!!url('tin-tuc/'.$loai_tin->slug.'/'.$item->slug) !!}" title="">
				<img src="{!!url('assets/upload/tin_tuc/'.$item->HinhAnh)!!}" alt="">
			</a>
		</div>
		<div class="col-md-7 col-xs-7 top_news_right"> 
			<a href="{!!url('tin-tuc/'.$loai_tin->slug.'/'.$item->slug) !!}" title="">
				<b>{{$item->Ten}}</b>
			</a>
		</div>
	</div>
	@endforeach
</div>