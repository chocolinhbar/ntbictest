@extends('pages.layout.index')

@section('content')
<div class="col-md-9 col-sm-9  main-left">
	<ul class="breadcrumb">
			<li><a href="#">Trang chủ</a></li>
			<li><a href="#">Tin tức </a></li>
			<!-- <li>Tin tổng hợp</li> -->
	</ul>
	
	<div id="tin_tuc" class="portlet box blue">
        <div class="portlet-title">
            <div class="caption">
                {{trans('header.news')}}: {{$tintuc->total()}} {{trans('content.results')}}
            </div>
             <div class="tools">
                <a href="{!!url('tin-tuc?text_search='.$text_search)!!}" class="show_all" style="color: #FFF"> Xem tất cả</a>
            </div> 
        </div>
        <div class="portlet-body">
             <div class="table-responsive">
                @foreach($tintuc as $item)
                    <?php
                        $loai_tin = App\LoaiTin::find($item->loai_tin_id);
                    ?>
                    <div class=" col-md-12 col-sm-12  listnews_item">
                        <div class="col-md-3 col-sm-3   img_listnews">
                            <img class="img-responsive" src="assets/upload/tin_tuc/{{$item->HinhAnh}}">
                        </div>
                        <div class="col-md-9 col-sm-9   ">
                            <div class="listnews_item_title">
                                <a href="{!!url('tin-tuc/'.$loai_tin->slug.'/'.$item->slug) !!}">{{ $item->Ten }}</a>
                            </div>
                            <div class="listnews_item_description">
                            {!! $item->TomTat !!}
                            </div>
                            <div class="listnews_item_date">
                                <i class="fa fa-calendar" aria-hidden="true"> {{substr($item->updated_at,0,11)}}</i> | 
                                <a href="{!!url('tin-tuc/'.$loai_tin->slug.'/'.$item->slug) !!}">Xem thêm </a>
                            </div>
                        </div>
                    </div>	
                @endforeach
            </div> 
        </div>
    </div>

    <div id="su_kien" class="portlet box blue">
        <div class="portlet-title">
            <div class="caption">
                {{trans('header.events')}}: {{$sukien->total()}} {{trans('content.results')}}
            </div>
             <div class="tools">
                <a href="{!!url('su-kien?text_search='.$text_search)!!}" class="show_all" style="color: #FFF"> Xem tất cả</a>
            </div> 
        </div>
        <div class="portlet-body">
             <div class="table-responsive">
                @foreach($sukien as $item)
                    <div class=" col-md-12 col-sm-12  listnews_item">
                        <div class="col-md-3 col-sm-3   img_listnews">
                            <img class="img-responsive" src="{!! url($item->HinhAnh) !!}">
                        </div>
                        <div class="col-md-9 col-sm-9   ">
                            <div class="listnews_item_title">
                                <a href="{!!url('su-kien/'.$item->slug) !!}">{{ $item->Ten }}</a>
                            </div>
                            <div class="listnews_item_description">
                            {!! $item->TomTat !!}
                            </div>
                            <div class="listnews_item_date">
                                <i class="fa fa-calendar" aria-hidden="true"> {{substr($item->updated_at,0,11)}}</i> | 
                                <a href="{!!url('su-kien/'.$item->slug) !!}">Xem thêm </a>
                            </div>
                        </div>
                    </div>	
                @endforeach
            </div> 
        </div>
    </div>

    <div id="cong_nghe" class="portlet box blue">
        <div class="portlet-title">
            <div class="caption">
                {{trans('header.technology')}}: {{$congnghe->total()}} {{trans('content.results')}}
            </div>
             <div class="tools">
                <a href="{!!url('cong-nghe?text_search='.$text_search)!!}" class="show_all" style="color: #FFF"> Xem tất cả</a>
            </div> 
        </div>
        <div class="portlet-body">
            <div class="table-responsive">
                @foreach($congnghe as $item)
                    <div class=" col-md-12 col-sm-12  listnews_item">
                        <div class="col-md-12 col-sm-12   ">
                            <div class="listnews_item_title">
                                <h4><a href="{!!url('cong-nghe/'.$item->slug) !!}">{{$item->Ten}}</a></h4>
                            </div>
                            <div class="listnews_item_date">
                            <i class="fa fa-calendar" aria-hidden="true"> {{$item->created_at}}</i> | 
                            <a href="{!!url('cong-nghe/'.$item->slug) !!}">Xem thêm </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection