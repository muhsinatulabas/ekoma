@php($menu='tentang-kami')
@extends('layout.main')
@section('css')
<style>
.page_header_left {
  width: 100%;
}
.frame-image-avatar {
  background-color:#347630;
  width: 60px;
  height: 60px; /* 1:1 Aspect Ratio */
  position: relative; /* If you want text inside of it */
  background-position: 50% 50%;
  background-repeat:no-repeat;
  background-size:cover;
  float: left;
}
.frame-image-avatar2 {
  background-color:#347630;
  width: 100%;
  padding-top:100%; /* 1:1 Aspect Ratio */
  position: relative; /* If you want text inside of it */
  background-position: 50% 50%;
  background-repeat:no-repeat;
  background-size:cover;
}
table tr td{
  vertical-align: top;
}
.frame-image-blog{
  background-color:#347630;
  width: 250px;
  height:180px;
  padding-top:0px; /* 1:1 Aspect Ratio */
  position: relative; /* If you want text inside of it */
  background-position: 50% 50%;
  background-repeat:no-repeat;
  background-size:cover;
}
.post-detil{
  color:#636363;
  margin-left: 30px;
  margin-top:10px;
  float: left;
}
.blog.big .post_content {
  width: 350px;
  margin-left: 30px;
}
.post p {
  margin-top:0px;
}
.row{
  margin-left:-15px;
  margin-right:-20px
}
.column {
  float: left;
  margin-left:0px;
  padding-left: 15px;
  padding-right: 15px;
  margin-bottom: 35px
}
</style>
@endsection
@section('content')
@include('include.function')
<div class="page_header clearfix page_margin_top">
	<div class="page_header_left">
		<h1 class="page_title">{{$data['informasi']->nama_cabang}}</h1>
	</div>
</div>
<div class="divider_block clearfix" style="position:relative;;margin-bottom:50px">
  <hr class="divider" style="width:100%;">
  <hr class="divider subheader_arrow" style="position:absolute;left:40px">
</div>
<div class="page_layout clearfix">
  <ul class="tabs_navigation clearfix">
		<li class="@if($tab=='profil') ui-tabs-active @endif"><a href="{{url('pc-lpnu/'.$id.'/profil')}}">Profil</a><span></span></li>
		<li class="@if($tab=='berita') ui-tabs-active @endif"><a href="{{url('pc-lpnu/'.$id.'/berita')}}">Berita</a><span></span></li>
    <li class="@if($tab=='agenda') ui-tabs-active @endif"><a href="{{url('pc-lpnu/'.$id.'/agenda')}}">Agenda</a><span></span></li>
    <li class="@if($tab=='pengusaha') ui-tabs-active @endif"><a href="{{url('pc-lpnu/'.$id.'/pengusaha')}}">Pengusaha</a><span></span></li>
	</ul>
  @include('website.pc-lpnu.'.$tab)
</div>

@endsection
@section('js')

@endsection
