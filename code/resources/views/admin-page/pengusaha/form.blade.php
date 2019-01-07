@php($page='Pengusaha NU')
@extends('layout.admin')
@section('title')
Admin Page | Ekonomi Maju
@endsection
@section('css')
  <style>
  .table tr td{
    vertical-align: top
  }
  .content p{
    line-height: 18px
  }
  </style>
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <form action="{{url('admin/pengusaha/proses/'.$action.'/'.$id)}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Foto Profil</label>
              <input type="file" class="dropify" name="foto">
            </div>
            <div class="form-group">
              <label> Nama Lengkap </label>
              <input type="text" class="form-control" name="nama_lengkap" value="@if(!empty($data)){{$data->nama_lengkap}}@endif" >
            </div>
            <div class="form-group">
              <label> NIK </label>
              <input type="text" class="form-control" name="nik" value="@if(!empty($data)){{$data->nik}}@endif">
            </div>
            <div class="form-group">
              <label> Title </label>
              <input type="text" class="form-control" name="title" value="@if(!empty($data)){{$data->title}}@endif">
            </div>
            <div class="form-group">
              <label> Level Pengusaha</label>
              <select name="level_pengusaha" class="select2" style="width:100%">
                @foreach ($master['level-pengusaha'] as $key => $value)
                  <option value="{{$value->id}}" @if(!empty($data)) @if($data->fid_level_pengusaha==$value->id) selected @endif @endif >{{$value->level_pengusaha}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>PC LPNU</label>
              <select name="pc_lpnu" class="select2" style="width:100%">
                <option value="0" >PW LPNU Jawa Timur</option>
                @foreach ($master['pc-lpnu'] as $key => $value)
                  <option value="{{$value->id}}" @if(!empty($data)) @if($data->fid_pc_lpnu==$value->id) selected @endif @endif >{{$value->nama_cabang}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label> Deskripsi </label>
              <textarea type="text" class="form-control" name="deskripsi" style="height:200px">@if(!empty($data)){{$data->deskripsi}}@endif</textarea>
            </div>
            <div class="form-group">
              <label> Email </label>
              <input type="text" class="form-control" name="email" value="@if(!empty($data)){{$data->email}}@endif">
            </div>
            <div class="form-group">
              <label> Nomor HP </label>
              <input type="text" class="form-control" name="hp" value="@if(!empty($data)){{$data->no_hp}}@endif">
            </div>
            <div class="form-group">
              <label>Alamat </label>
              <textarea class="form-control" name="alamat" style="height:120px">@if(!empty($data)){{$data->alamat}}@endif</textarea>
            </div>
          </div>
      </div>
      <hr>
      <div class="pull-right">
        <button class="btn btn-primary">SIMPAN</button>
        <a href="{{url('admin/pengusaha/list')}}" class="btn btn-secondary">CANCEL</a>
      </div>
    </div>
  </div>
  </form>
</div>
@endsection
@section('js')
<script>

</script>
@endsection
