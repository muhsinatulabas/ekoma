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
    <div class="row">
      <div class="col-md-6">
        <form action="{{ url('admin/pengusaha/search') }}" method="post">
          <div class="input-group">
            {{ csrf_field() }}
            @php($searchArray = explode("=",$search))
            <input type="text" class="form-control" name="search" placeholder="Cari Data Pengusaha NU" @if($search != 'all') value="{{ $searchArray[1] }}" @endif>
            <span class="input-group-append">
  						<button class="btn btn-primary" type="submit">Search</button>
  					</span>
          </div>
          <input type="hidden" name="url" value="admin/pengusaha/list">
        </form>
      </div>
      <div class="col-md-6">
        <a href="{{url('admin/pengusaha/form')}}"  class="btn btn-primary pull-right">TAMBAH</a>
      </div>
    </div>
    <hr>
    <div class="card">
      <div class="card-body">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th width="50px">No</th>
              <th width="130px">Foto Profil</th>
              <th>Nama Lengkap</th>
              <th>Informasi Kontak</th>
              <th>PC LPNU</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data['data'] as $key => $value)
              <tr>
                <td>{{(($data['pageposition']-1)*10)+($key+1)}}</td>
                <td>
                  <div class="frame-avatar" style="background-image:url('{{asset('storage/'.$value->foto)}}')"></div>
                </td>
                <td>
                  <div style="margin-bottom:8px;font-weight:bold">{{$value->nama_lengkap}}</div>
                  <div style="margin-bottom:10px;">{{$value->title}}</div>
                  <label style="padding:8px;background:{{$value->color}};color:#fff">{{$value->level_pengusaha}}</label>

                </td>
                <td>
                  <div style="margin-bottom:5px">{{$value->email}}</div>
                  <div style="margin-bottom:5px">{{$value->no_hp}}</div>
                  <div style="margin-bottom:5px">{{$value->alamat}}</div>
                </td>
                <td>@if($value->fid_pc_lpnu==0) PW LPNU Jawa Timur @else{{$value->nama_cabang}}@endif</td>
                <td style="width:1px;white-space:nowrap">
                  <a href="{{url('admin/pengusaha/detil/'.$value->id)}}"class="btn-table"><i class="ti ti-search"></i></a>
                  <a href="{{url('admin/pengusaha/form/edit/'.$value->id)}}" class="btn-table"><i class="ti ti-pencil-alt"></i></a>
                  <a href="javascript:;" onclick="confirmDelete('{{$value->id}}')" class="btn-table"><i class="ti ti-trash"></i></a>
                  <form action="{{url('admin/pengusaha/proses/delete/'.$value->id)}}" method="post" id="hapus{{$value->id}}">{{ csrf_field()}}</form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        <hr>
        @php($pageurl = url('admin/pengusaha/list'))
        @include('include.pagination')
      </div>
    </div>
  </div>
</div>
@endsection
@section('js')
<script>

</script>
@endsection
