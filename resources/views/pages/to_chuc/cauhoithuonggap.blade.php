@extends('pages.layout.index-lienhe')
@section('content')
<div class="col-md-12">
    <ul class="breadcrumb">
        <li><a href="#">Trang chủ</a></li>
        <li><a href="#">Tổ chức</a></li>
        <li>Câu hỏi thường gặp</li>
    </ul>
	<div class=" tochuc col-md-12 col-sm-12"><h4 >Câu hỏi thường gặp</h4></div>
    @foreach( $cauhoi as $item)
    @if(!empty($item))
    <button class="accordion">{{$item->CauHoi}}</button>
    <div class="panel">
      <p style="padding-top:10px;">{!!$item->CauTraLoi!!}</p>
    </div>
    @endif
    @endforeach
</div>
@endsection