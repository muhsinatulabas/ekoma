@php($menu='pengusaha')
@extends('layout.main')
@section('css')
  <style>
  .divider.last {
    width: auto;
  }
  .page_header_left {
    width: 100%;
  }
  .box-pengusaha{
    background: #f0f0f0;
    min-height: 300px;
    padding: 30px
  }
  .list-info{
    margin-top:10px;
    padding-bottom: 10px;
    border-bottom: #b9b9b9 solid 1px
  }
  .list-info .info{
    color:#333333;
    font-weight:bold;
    font-size: 15px;
    margin-top:5px
  }
  .frame-image-avatar {
    background-color:#347630;
    width: 100%;
    padding-top:100%; /* 1:1 Aspect Ratio */
    position: relative; /* If you want text inside of it */
    background-position: 50% 50%;
    background-repeat:no-repeat;
    background-size:cover;
  }
  .deskripsi{
    margin-top:30px;
    line-height: 23px;
    color:#393939;
    font-size:17px
  }
  .list-perusahaan{
    width:100%;
    margin-top: 20px;
    color: rgb(42, 42, 42);
    min-height:120px;
    border-bottom: 1px solid rgb(235, 235, 235);
    padding-bottom: 10px
  }
  .informasi-perusahaan{
    /* float:left */
    margin-left:120px
  }
  .logo-perusahaan{
    background-color:#f5f5f5;
    width: 100px;
    height: 100px; /* 1:1 Aspect Ratio */
    position: relative; /* If you want text inside of it */
    background-position: 50% 50%;
    background-repeat:no-repeat;
    background-size:cover;
    float: left;
    /* margin-right: 20px; */
  }
  </style>
@endsection
@section('content')
<div class="page_header clearfix page_margin_top">
	<div class="page_header_left">
		<h1 class="page_title">Pengusaha NU</h1>
	</div>
</div>

<div class="divider_block clearfix" style="position:relative;;margin-bottom:50px">
  <hr class="divider" style="width:100%;">
  <hr class="divider subheader_arrow" style="position:absolute;left:40px">
</div>

<div class="page_layout clearfix">
  <div class="row page_margin_top_section">
    <div class="column column_1_3">
      <div class="box-pengusaha">
        <div class="frame-image-avatar" style="background-image:url('{{asset('storage/'.$data['pengusaha']->foto)}}');margin-bottom:50px" ></div>
        <div class="list-info">
          <label>Nama Lengkap</label>
          <div class="info">{{$data['pengusaha']->nama_lengkap}}</div>
        </div>
        <div class="list-info">
          <label>Level Pengusaha</label>
          <div class="info">{{$data['pengusaha']->level_pengusaha}}</div>
        </div>
        <div class="list-info">
          <label>Title</label>
          <div class="info">{{$data['pengusaha']->title}}</div>
        </div>
        <div class="list-info">
          <label>PC LPNU</label>
          <div class="info">@if($data['pengusaha']->fid_pc_lpnu==0) PW LPNU Jawa Timur @else{{$data['pengusaha']->nama_cabang}}@endif</div>
        </div>
        <div class="list-info">
          <label>Email</label>
          <div class="info">{{$data['pengusaha']->email}}</div>
        </div>
        <div class="list-info">
          <label>No Handphone</label>
          <div class="info">{{$data['pengusaha']->no_hp}}</div>
        </div>
        <div class="list-info">
          <label>Alamat</label>
          <div class="info">{{$data['pengusaha']->alamat}}</div>
        </div>
      </div>
    </div>
    <div class="column column_2_3">
      <h4 class="box_header">ABOUT</h4>
      <div class="deskripsi">{{$data['pengusaha']->deskripsi}}</div>
      <h4 class="box_header page_margin_top_section">DATA PERUSAHAAN / UNIT USAHA</h4>
      <div class="list-perusahaan">
      @foreach ($data['perusahaan'] as $key => $value)
        <div class="logo-perusahaan" style="background-image:url('{{asset('storage/'.$value->logo_perusahaan)}}')"></div>
        <div class="informasi-perusahaan">
          <div style="margin-bottom:10px;font-size:20px;font-weight:600">{{$value->nama_perusahaan}}</div>
          <div style="margin-bottom:5px;line-height:20px">{{$value->deskripsi}}</div>
        </div>
      @endforeach
      </div>
    </div>
  </div>
</div>

@endsection
@section('js')

@endsection
