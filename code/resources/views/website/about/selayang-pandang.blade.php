@php($menu='tentang-kami')
@extends('layout.main')
@section('css')
  <style>
  .divider.last {
    width: auto;
  }
  </style>
@endsection
@section('content')
<div class="page_header clearfix page_margin_top">
	<div class="page_header_left">
		<h1 class="page_title">Selayang Pandang</h1>
	</div>
</div>
<div class="divider_block clearfix" style="position:relative;margin-bottom:50px">
  <hr class="divider" style="width:100%;">
  <hr class="divider subheader_arrow" style="position:absolute;left:40px">
</div>
<div class="page_layout clearfix ">
	{!!$data['selayang-pandang']->content!!}
</div>

@endsection
@section('js')

@endsection
