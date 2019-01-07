@php($menu='tentang-kami')
@extends('layout.main')
@section('css')
<style>
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
.frame-image-kotak {
  background-color:#347630;
  width: 60px;
  height: 60px; /* 1:1 Aspect Ratio */
  position: relative; /* If you want text inside of it */
  background-position: 50% 50%;
  background-repeat:no-repeat;
  background-size:cover;
  float: left;
}
</style>
@endsection
@section('content')
@include('include.function')
<div class="page_header clearfix page_margin_top">
	<div class="page_header_left">
		<h1 class="page_title">PC - LPNU</h1>
	</div>
</div>
<div class="divider_block clearfix" style="position:relative;;margin-bottom:50px">
  <hr class="divider" style="width:100%;">
  <hr class="divider subheader_arrow" style="position:absolute;left:40px">
</div>
<div class="page_layout clearfix">
  <div class="row">
    <div class="column column_2_3">
      <ul class="blog big" style="margin-top:-30px">
        @foreach ($data['posting'] as $key => $value)
          <li class="post">
            <a href="{{url('')}}">
              <div class="frame-image-blog" style="background-image:url('{{asset('storage/'.$value->file)}}') ;float:left"></div>
            </a>
            <div class="post_content">
              <h3><a href="{{url('')}}">{{$value->judul}}</a></h3>
            </div>
            <div class="post-detil">
              <span style="color:#3d8000">@if($value->fid_pc_lpnu==0)PW LPNU Jawa Timur @else{{$value->nama_cabang}}@endif</span>,
              {{dateFormat($value->tanggal,'d/m/Y')}}, {{dateFormat($value->tanggal,'H:i:s')}}
            </div>

            <div class="post_content">
            {!!substr($value->content,0,150)!!}...<span style="font-size:12px;font-weight:bold">(Sumber : {{$value->sumber}})</span>
            </div>
          </li>
        @endforeach
      </ul>
    </div>
    <div class="column column_1_3">
      <h4 class="box_header">DATA PC LPNU</h4>
      <ul class="list no_border spacing">
        @foreach ($data['pc-lpnu'] as $key => $value)
          <li class="bullet style_2"><a href="{{url('pc-lpnu/'.$value->id)}}">{{$value->nama_cabang}}</a></li>
        @endforeach
			</ul>

      <h4 class="box_header page_margin_top_section">PENGUSAHA NU</h4>
      <div class="vertical_carousel_container clearfix">
  			<ul class="blog small vertical_carousel autoplay-1 scroll-1 navigation-1 easing-easeInOutQuint duration-750">
          @foreach($data['pengusaha'] as $key => $value)
        	<li class="post">
  					<a href="{{url('')}}">
  						<div class="frame-image-kotak" style="background-image:url('{{asset('website/assets/images/image1.jpg')}}')"><img src=""></div>
  					</a>
  					<div class="post_content">
  						<h4 style="font-weight:500"><a href="{{url('')}}">{{$value->nama_lengkap}}</a></h4>
              <div style="color:#838383;margin-bottom:5px">{{$value->title}}</div>
              <div style="color:#347630">@if($value->fid_pc_lpnu==0) PW LPNU Jawa Timur @else{{$value->nama_cabang}}@endif</div>
  					</div>
  				</li>
          @endforeach
  			</ul>
  		</div>
    </div>
  </div>
</div>

@endsection
@section('js')

@endsection
