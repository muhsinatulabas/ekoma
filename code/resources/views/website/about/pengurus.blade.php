@php($menu='tentang-kami')
@extends('layout.main')
@section('css')
  <style>
  .divider.last {
    width: auto;
  }
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
<div class="page_header clearfix page_margin_top">
	<div class="page_header_left">
		<h1 class="page_title">Susunan Pengurus</h1>
	</div>
</div>

<div class="divider_block clearfix" style="position:relative;;margin-bottom:50px">
  <hr class="divider" style="width:100%;">
  <hr class="divider subheader_arrow" style="position:absolute;left:40px">
</div>

<div class="page_layout clearfix">

  @foreach ($data as $key => $value)
    <h4 class="box_header page_margin_top_section">{{$value->jabatan}}</h4>
    <div class="row page_margin_top_section">
    @foreach ($value->pengurus as $key => $value)
      <div class="column column_1_4">
        <a href="{{url('about/pengurus')}}">
    			<div class="frame-image-avatar2" style="background-image:url('{{asset('storage/'.$value->foto)}}');"></div>
    		</a>
        <div style="text-align:center">
          <h4 style="margin-top:10px"><a href="">{{$value->nama_lengkap}}</a></h4>
          <span style="color:#347630">{{$value->jabatan}}</span>
        </div>
      </div>
    @endforeach
    </div>
  @endforeach

</div>

@endsection
@section('js')

@endsection
