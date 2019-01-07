@php($menu='tentang-kami')
@extends('layout.main')
@section('css')
  <link rel="stylesheet" href="{{asset('admin-page/assets/magnific-popup/magnific-popup.css')}}">
  <style>
  .divider.last {
    width: auto;
  }
  .page_header_left {
    width: 100%;
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
  .folder-gallery{
    text-align: center;
    position: relative;
  }
  .tombol-folder{
    position: absolute;
    left: 0;
    right: 0;
    top:55px;
    margin-left: auto;
    margin-right: auto;
    display:none;
  }

  .title-folder, .caption{
    font-size: 13px;
    height:35px;
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    line-height: 17px;
    -webkit-box-orient: vertical;
  }
  .folder-gallery a, .list-gallery a{
    color:#262626
  }
  .folder-gallery a:hover, .list-gallery a:hover{
    text-decoration: none;
    color:#262626
  }
  .folder-gallery:hover .tombol-folder{
    display:block;
  }

  .frame-image {
    background-color: white;
    width: 100%;
    padding-top: 70%; /* 1:1 Aspect Ratio */
    position: relative; /* If you want text inside of it */
    background-position: 50% 50%;
    background-repeat:no-repeat;
    background-size:cover;
  }

  .overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: rgba(8, 167, 28, 0.84);
    overflow: hidden;
    width: 100%;
    height: 0;
    transition: .5s ease;
  }

  .frame-image:hover .overlay {
    height: 100%;
  }

  .frame-image .text {
    color: white;
    font-size: 13px;
    font-weight: 400;
    position: absolute;
    bottom:10px;
    left:10px
  }

  .frame-image .tombol-gallery {
    font-size: 13px;
    font-weight: 400;
    position: absolute;
    top:10px;
    right:10px
  }
  .frame-image .tombol-gallery a{
    color:#fff
  }
  </style>
@endsection
@section('content')
<div class="page_header clearfix page_margin_top">
	<div class="page_header_left">
		<h1 class="page_title">Gallery</h1>
	</div>
</div>
<div class="divider_block clearfix" style="position:relative;;margin-bottom:50px">
  <hr class="divider" style="width:100%;">
  <hr class="divider subheader_arrow" style="position:absolute;left:40px">
</div>
<div class="page_layout clearfix">
  @if($id=='all')
  <div class="row page_margin_top_section">
    @foreach ($data['data'] as $key => $value)
    <div class="column column_1_4">
      <div class="folder-gallery">
        <a href="{{url('about/gallery/'.$value->id)}}" title="{{$value->album}}">
          <img src="{{asset('admin-page/assets/images/folder_icon.png')}}">
          <div class="title-folder">{{$value->album}}</div>
        </a>
      </div>
    </div>
    @endforeach
  </div>
  @else
  <h4 class="box_header page_margin_top_section">{{$data['nama-album']->album}}</h4>
  <div class="row page_margin_top_section parent-container">
    @foreach ($data['data'] as $key => $value)
    <div class="column column_1_4">
      <a class="gallery-list" href="{{asset('storage/'.$value->foto)}}" title="{{$value->caption}}">
        <div class="list-gallery">
          <div class="frame-image" style="background-image:url('{{asset('storage/'.$value->foto)}}')">
            <div class="overlay">
              <div class="text">{{$value->caption}}</div>
            </div>
          </div>
        </div>
      </a>
    </div>
    @endforeach
  </div>
  @endif
</div>

@endsection
@section('js')
<script type="text/javascript" src="{{asset("admin-page/assets/magnific-popup/jquery.magnific-popup.js")}}"></script>
<script>
$(function(){
  $('.parent-container').magnificPopup({
    delegate: '.gallery-list',
    gallery: {
      enabled: true
    },
    type: 'image'
  });
});
</script>
@endsection
