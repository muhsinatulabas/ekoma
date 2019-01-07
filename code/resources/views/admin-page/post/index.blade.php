@php($page=$title_post)
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
  @include('include.function')
  <div class="row">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-6">
          <form action="{{ url('admin/post/'.$post.'/search') }}" method="post">
            <div class="input-group">
              {{ csrf_field() }}
              @php($searchArray = explode("=",$search))
              <input type="text" class="form-control" name="search" placeholder="Cari Data {{$title_post}}" @if($search != 'all') value="{{ $searchArray[1] }}" @endif>
              <span class="input-group-append">
    						<button class="btn btn-primary" type="submit">Search</button>
    					</span>
            </div>
            <input type="hidden" name="url" value="admin/post/{{$post}}/list/{{$kategori}}/{{$pc_lpnu}}">
          </form>
        </div>
        <div class="col-md-6">
          <a href="{{url('admin/post/'.$post.'/form')}}" class="btn btn-primary pull-right">TAMBAH</a>
        </div>
      </div>
      <hr>
      <div class="card">
        <div class="card-body">
          <form action="{{ url('admin/post/'.$post.'/filter') }}" method="post" >
            {{ csrf_field() }}
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Kategori</label>
                  <select class="select2 form-control" name="kategori" onchange="javascript:submit()">
                    <option value="all">Semua Kategori</option>
                    @foreach ($master['kategori'] as $key => $value)
                      <option value="{{$value->id}}" @if($kategori==$value->id) selected @endif>{{$value->nama_kategori}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>PC LPNU</label>
                  <select class="select2 form-control" name="pc_lpnu" onchange="javascript:submit()">
                    <option value="all" @if($pc_lpnu=='all') selected @endif>Semua PC LPNU</option>
                    <option value="0" @if($pc_lpnu=='0') selected @endif>LPNU Jawa Timur</option>
                    @foreach ($master['pc-lpnu'] as $key => $value)
                      <option value="{{$value->id}}" @if($pc_lpnu==$value->id) selected @endif>{{$value->nama_cabang}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
          </form>
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th width="50px">No</th>
                <th width="200px">Cover</th>
                <th>Judul {{$title_post}}</th>
                <th>Informasi {{$title_post}}</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data['data'] as $key => $value)
                <tr>
                  <td>{{(($data['pageposition']-1)*10)+($key+1)}}</td>
                  <td><div class="frame-image" style="background-image:url('{{asset('storage/'.$value->file)}}')"></div></td>
                  <td>
                    <h4>{{$value->judul}} @if($value->headline==1)<div class="badge badge-pill badge-success"><i class="fa fa-star"></i></div> @endif</h4>
                    <div class="content">{!!substr($value->content,0,300)!!}</div>
                  </td>
                  <td style="white-space:nowrap" >
                    <div style="margin-bottom:5px;font-weight:bold">{{$value->nama_lengkap}}</div>
                    <div style="margin-bottom:5px">@if($value->fid_pc_lpnu==0) PW LPNU Jawa Timur @else {{$value->nama_cabang}} @endif</div>
                    <div>{{tgl_indo($value->tanggal)}}, {{dateFormat($value->tanggal,"H:i:s")}}</div>
                    <hr>
                    <div>Sumber : {{$value->sumber}}</div>
                  </td>
                  <td style="white-space:nowrap">
                    <a href="{{url('admin/post/'.$post.'/form/edit='.$value->id)}}" class="btn-table"><i class="ti ti-pencil-alt"></i></a>
                    <a href="javascript:;" onclick="confirmDelete('{{$value->id}}')" class="btn-table"><i class="ti ti-trash"></i></a>
                    <form action="{{url('admin/post/'.$post.'/proses/delete='.$value->id)}}" method="post" id="hapus{{$value->id}}">{{ csrf_field()}}</form>
                  </td>
                </tr>
              @endforeach

            </tbody>
          </table>
          <hr>
          @php($pageurl = url('admin/post/'.$post.'/list/'.$kategori.'/'.$pc_lpnu))
          @include('include.pagination')
        </div>
      </div>
    </div>
  </div>
@endsection
@section('js')

@endsection
