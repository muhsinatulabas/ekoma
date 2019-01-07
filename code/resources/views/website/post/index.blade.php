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
.title-post{
  height:40px;
  overflow: hidden;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  line-height: 19px;
  -webkit-box-orient: vertical;
}
.play-botton{
  opacity: 0.7;
  height:50%;
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  margin-left: auto;
  margin-right: auto;
  margin-top: auto;
  margin-bottom: auto;
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
  @if($post=='video')
  <div class="row">
    @foreach ($data['data'] as $key => $value)
		<div class="column column_1_4">
      <a href="{{url('post-detil/'.$post.'/'.$value->id)}}">
        <div class="frame-image-video" style="background-image:url('{{asset('storage/'.$value->file)}}');">
          <img src="{{asset('website/assets/images/play-button.png')}}" class="play-botton">
        </div>
      </a>
      <div class="post_content">
        <h5 class="title-post"><a href="{{url('post-detil/'.$post.'/'.$value->id)}}">{{$value->judul}}</a></h5>
        <div style="color:#3d8000;padding-top:5px">{{dateFormat($value->tanggal,'d/m/Y')}}, {{dateFormat($value->tanggal,'H:i:s')}}</div>
      </div>
    </div>
    @endforeach
  </div>
  <div class="column">
    @php($pageurl = url('post/'.$post))
    @include('include.pagination-website')
  </div>
  @elseif($post=='infografis')
    <div class="row">
      @foreach ($data['data'] as $key => $value)
  		<div class="column column_1_4">
        <a href="{{url('post-detil/'.$post.'/'.$value->id)}}">
          <div class="frame-image-infografis" style="background-image:url('{{asset('storage/'.$value->file)}}');">
            <img src="{{asset('website/assets/images/play-button.png')}}" class="play-botton">
          </div>
        </a>
        <div class="post_content">
          <h5 class="title-post"><a href="{{url('post-detil/'.$post.'/'.$value->id)}}">{{$value->judul}}</a></h5>
          <div style="color:#3d8000;padding-top:5px">{{dateFormat($value->tanggal,'d/m/Y')}}, {{dateFormat($value->tanggal,'H:i:s')}}</div>
        </div>
      </div>
      @endforeach
    </div>
    <div class="column">
      @php($pageurl = url('post/'.$post))
      @include('include.pagination-website')
    </div>
  @else
  <div class="row">
		<div class="column column_2_3">
      <ul class="blog big" style="margin-top:-30px">
        @foreach ($data['data'] as $key => $value)
          <li class="post">
            <a href="{{url('post-detil/'.$post.'/'.$value->id)}}">
              <div class="frame-image-blog" style="background-image:url('{{asset('storage/'.$value->file)}}') ;float:left"></div>
            </a>
            <div class="post_content">
              <h3><a href="{{url('post-detil/'.$post.'/'.$value->id)}}">{{$value->judul}}</a></h3>
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
      <div class="column">
        @php($pageurl = url('post/'.$post))
        @include('include.pagination-website')
      </div>
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
        @foreach ($data_kategori['pesantren'] as $key => $value)
        <li class="post">
          <a href="{{url('post-detil/'.$post.'/'.$value->id)}}">
            <div class="frame-image-kotak" style="background-image:url('{{asset('storage/'.$value->file)}}')"></div>
          </a>
          <div class="post_content">
            <h5><a href="{{url('post-detil/'.$post.'/'.$value->id)}}" >{{$value->judul}}</a></h5>
            <div style="color:#6a6a6a;margin-top:5px;font-size:12px">{{tgl_indo($value->tanggal)}}, {{dateFormat($value->tanggal,'H:i:s')}}</div>
          </div>
        </li>
        @endforeach
      </ul>

      <h4 class="box_header page_margin_top_section">Koperasi</h4>
      <ul class="blog small clearfix">
        @foreach ($data_kategori['koperasi'] as $key => $value)
        <li class="post">
          <a href="{{url('post-detil/'.$post.'/'.$value->id)}}">
            <div class="frame-image-kotak" style="background-image:url('{{asset('storage/'.$value->file)}}')"></div>
          </a>
          <div class="post_content">
            <h5><a href="{{url('post-detil/'.$post.'/'.$value->id)}}" >{{$value->judul}}</a></h5>
            <div style="color:#6a6a6a;margin-top:5px;font-size:12px">{{tgl_indo($value->tanggal)}}, {{dateFormat($value->tanggal,'H:i:s')}}</div>
          </div>
        </li>
        @endforeach
      </ul>

      <h4 class="box_header page_margin_top_section">Investasi</h4>
      <ul class="blog small clearfix">
        @foreach ($data_kategori['investasi'] as $key => $value)
        <li class="post">
          <a href="{{url('post-detil/'.$post.'/'.$value->id)}}">
            <div class="frame-image-kotak" style="background-image:url('{{asset('storage/'.$value->file)}}')"></div>
          </a>
          <div class="post_content">
            <h5><a href="{{url('post-detil/'.$post.'/'.$value->id)}}" >{{$value->judul}}</a></h5>
            <div style="color:#6a6a6a;margin-top:5px;font-size:12px">{{tgl_indo($value->tanggal)}}, {{dateFormat($value->tanggal,'H:i:s')}}</div>
          </div>
        </li>
        @endforeach
      </ul>
    </div>
  </div>
  @endif
</div>

@endsection
@section('js')

@endsection
