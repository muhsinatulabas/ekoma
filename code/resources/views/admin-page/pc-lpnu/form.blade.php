@php($page='PC LPNU')
@extends('layout.admin')
@section('title')
Admin Page | Ekonomi Maju
@endsection
@section('css')

@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <form action="{{url('admin/pc-lpnu/proses/'.$action.'/'.$id)}}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="card-body">
        <div class="form-group">
          <label> Nama Cabang </label>
          <input type="text" class="form-control" name="nama_cabang" value="@if(!empty($data)){{$data->nama_cabang}} @endif">
        </div>
        <div class="form-group">
          <label>Deskripsi</label>
          <textarea class="tinymce form-control" name="deskripsi" >@if(!empty($data)){{$data->deskripsi}}@endif</textarea>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label> Foto Ketua PC LPNU </label>
              <input type="file" class="dropify form-control" name="foto-ketua" data-default-file="@if(!empty($data)){{asset('storage/'.$data->foto_ketua)}}@endif">
            </div>
            <div class="form-group">
              <label> Ketua PC LPNU </label>
              <input type="text" class="form-control" name="ketua" value="@if(!empty($data)){{$data->ketua}} @endif">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label> Email </label>
              <input type="text" class="form-control" name="email" value="@if(!empty($data)){{$data->email}} @endif">
            </div>
            <div class="form-group">
              <label> Nomor HP </label>
              <input type="text" class="form-control" name="hp" value="@if(!empty($data)){{$data->no_hp}} @endif">
            </div>
            <div class="form-group">
              <label> Alamat Kantor </label>
              <textarea class="form-control" name="alamat" style="height:120px">@if(!empty($data)){{$data->alamat}} @endif</textarea>
            </div>
          </div>
        </div>
        <hr>
        <div class="pull-right">
          <button class="btn btn-primary">SIMPAN</button>
          <a href="{{url('admin/pc-lpnu/list')}}" class="btn btn-secondary">CANCEL</a>
        </div>
        <br>
      </div>
    </div>
  </div>
</div>
@endsection
@section('js')
<script>

</script>
@endsection
