@php($menu=$post)
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
.frame-image-video{
  background-color:#347630;
  width: 100%;
  padding-top:60%; /* 1:1 Aspect Ratio */
  position: relative; /* If you want text inside of it */
  background-position: 50% 50%;
  background-repeat:no-repeat;
  background-size:cover;
}
.frame-image-infografis{
  background-color:#347630;
  width: 100%;
  padding-top:200%; /* 1:1 Aspect Ratio */
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
  margin-bottom: 25px
}
.iframe-video{
  background-color:#347630;
  width: 100%;
  padding-top:60%; /* 1:1 Aspect Ratio */
  position: relative; /* If you want text inside of it */
}
.embed-responsive {
  position: relative;
  display: block;
  width: 100%;
  padding: 0;
  overflow: hidden;
}

.embed-responsive::before {
  display: block;
  content: "";
}

.embed-responsive .embed-responsive-item,
.embed-responsive iframe,
.embed-responsive embed,
.embed-responsive object,
.embed-responsive video {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 100%;
  border: 0;
}

.embed-responsive-21by9::before {
  padding-top: 42.857143%;
}

.embed-responsive-16by9::before {
  padding-top: 56.25%;
}

.embed-responsive-4by3::before {
  padding-top: 75%;
}

.embed-responsive-1by1::before {
  padding-top: 100%;
}
</style>
@endsection
@section('content')
@include('include.function')
<div class="page_header clearfix page_margin_top">
	<div class="page_header_left">
		<h1 class="page_title">{{$title}}</h1>
	</div>
</div>
<div class="divider_block clearfix" style="position:relative;;margin-bottom:50px">
  <hr class="divider" style="width:100%;">
  <hr class="divider subheader_arrow" style="position:absolute;left:40px">
</div>
<div class="page_layout clearfix">
  <div class="row">

		<div class="column column_2_3">
      @if($post=='video')
      <div class="post single">
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="{{$data['detil']->link_video}}"></iframe>
        </div>
        {{-- <iframe class="iframe-video" src="" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}
        <h2 class="post_title">{{$data['detil']->judul}}</h2>
        <ul class="post_details clearfix">
          <li class="detail date">{{dateFormat($data['detil']->tanggal,'d/m/Y')}}, {{dateFormat($data['detil']->tanggal,'H:i:s')}}</li>
          <li class="detail author">By {{$data['detil']->nama_lengkap}}</li>
        </ul>
        <div class="post_content page_margin_top_section clearfix">
          {!!$data['detil']->content!!}
          <div style="font-size:12px;font-weight:bold;color:#1a1a1a">(Sumber : {{$data['detil']->sumber}})</div>
        </div>
      </div>
      @else
      <div class="post single">
        <h2 class="post_title">{{$data['detil']->judul}}</h2>
        <ul class="post_details clearfix">
          <li class="detail date">{{dateFormat($data['detil']->tanggal,'d/m/Y')}}, {{dateFormat($data['detil']->tanggal,'H:i:s')}}</li>
          <li class="detail author">By {{$data['detil']->nama_lengkap}}</li>
        </ul>
        <img src="{{asset('storage/'.$data['detil']->file)}}" style="display: block;margin-top:20px">
        <div class="post_content page_margin_top_section clearfix">
          {!!$data['detil']->content!!}
          <div style="font-size:12px;font-weight:bold;color:#1a1a1a">(Sumber : {{$data['detil']->sumber}})</div>
        </div>
      </div>
      @endif
    </div>

    <div class="column column_1_3">
      <h4 class="box_header">Kategori {{$title}}</h4>
      <ul class="list no_border spacing">
        @foreach ($master['kategori'] as $key => $value)
          <li class="bullet style_2"><a href="{{url('post/berita/list/'.$value->id)}}">{{$value->nama_kategori}}</a></li>
        @endforeach
			</ul>

      <h4 class="box_header page_margin_top_section">Ekonomi Pesantren</h4>
      <ul class="blog small clearfix">
        @foreach ($data['pesantren'] as $key => $value)
        <li class="post">
          <a href="{{url('')}}">
            <div class="frame-image-kotak" style="background-image:url('{{asset('storage/'.$value->file)}}')"></div>
          </a>
          <div class="post_content">
            <h5><a href="{{url('')}}" >{{$value->judul}}</a></h5>
            <div style="color:#6a6a6a;margin-top:5px;font-size:12px">{{tgl_indo($value->tanggal)}}, {{dateFormat($value->tanggal,'H:i:s')}}</div>
          </div>
        </li>
        @endforeach
      </ul>

      <h4 class="box_header page_margin_top_section">Koperasi</h4>
      <ul class="blog small clearfix">
        @foreach ($data['koperasi'] as $key => $value)
        <li class="post">
          <a href="{{url('')}}">
            <div class="frame-image-kotak" style="background-image:url('{{asset('storage/'.$value->file)}}')"></div>
          </a>
          <div class="post_content">
            <h5><a href="{{url('')}}" >{{$value->judul}}</a></h5>
            <div style="color:#6a6a6a;margin-top:5px;font-size:12px">{{tgl_indo($value->tanggal)}}, {{dateFormat($value->tanggal,'H:i:s')}}</div>
          </div>
        </li>
        @endforeach
      </ul>

      <h4 class="box_header page_margin_top_section">Investasi</h4>
      <ul class="blog small clearfix">
        @foreach ($data['investasi'] as $key => $value)
        <li class="post">
          <a href="{{url('')}}">
            <div class="frame-image-kotak" style="background-image:url('{{asset('storage/'.$value->file)}}')"></div>
          </a>
          <div class="post_content">
            <h5><a href="{{url('')}}" >{{$value->judul}}</a></h5>
            <div style="color:#6a6a6a;margin-top:5px;font-size:12px">{{tgl_indo($value->tanggal)}}, {{dateFormat($value->tanggal,'H:i:s')}}</div>
          </div>
        </li>
        @endforeach
      </ul>
    </div>
  </div>
</div>

@endsection
@section('js')

@endsection
