@php($menu='tentang-kami')
@extends('layout.main')
@section('css')
  <style>
  .divider.last {
    width: auto;
  }
  .page_layout ul{
    list-style: inherit;
    margin: 0px 0px 0px 20px;
    padding: 0px
  }
  .page_layout ul li,.page_layout ol li{
    color:#000;
    font-size: 20px;
    line-height: 30px
  }
  </style>
@endsection
@section('content')
<div class="page_header clearfix page_margin_top">
	<div class="page_header_left">
		<h1 class="page_title">Visi dan Misi</h1>
	</div>
</div>

<div class="divider_block clearfix" style="position:relative;;margin-bottom:50px">
  <hr class="divider" style="width:100%;">
  <hr class="divider subheader_arrow" style="position:absolute;left:40px">
</div>

<div class="page_layout clearfix">
	<div style="margin-bottom:50px">{!!$data['visi']->content!!}</div>
  {!!$data['misi']->content!!}
</div>

@endsection
@section('js')

@endsection
