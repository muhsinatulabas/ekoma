@php($page='PC LPNU')
@extends('layout.admin')
@section('title')
Admin Page| Ekonomi Maju
@endsection
@section('css')

@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-6">
        <form action="{{ url('admin/pc-lpnu/search') }}" method="post">
          <div class="input-group">
            {{ csrf_field() }}
            @php($searchArray = explode("=",$search))
            <input type="text" class="form-control" name="search" placeholder="Cari Data PC LPNU" @if($search != 'all') value="{{ $searchArray[1] }}" @endif>
            <span class="input-group-append">
  						<button class="btn btn-primary" type="submit">Search</button>
  					</span>
          </div>
        </form>
      </div>
      <div class="col-md-6">
        <a href="{{url('admin/pc-lpnu/form')}}" class="btn btn-primary pull-right">TAMBAH</a>
      </div>
    </div>
    <hr>
    <div class="card">
      <div class="card-body">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th width="50px">No</th>
              <th>Nama Cabang</th>
              <th>Ketua PC LPNU</th>
              <th>Email</th>
              <th>Handphone</th>
              <th>Alamat</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data['data'] as $key => $value)
              <tr>
                <td>{{(($data['pageposition']-1)*10)+($key+1)}}</td>
                <td>{{$value->nama_cabang}}</td>
                <td>{{$value->ketua}}</td>
                <td>{{$value->email}}</td>
                <td>{{$value->no_hp}}</td>
                <td>{{$value->alamat}}</td>
                <td style="width:1px;white-space:nowrap">
                  <a href="{{url('admin/pc-lpnu/form/edit/'.$value->id)}}" class="btn-table" ><i class="ti ti-pencil-alt"></i></a>
                  <a href="javascript:;" onclick="confirmDelete('{{$value->id}}')" class="btn-table" ><i class="ti ti-trash"></i></a>
                  <form action="{{url('admin/pc-lpnu/proses/delete/'.$value->id)}}" method="post" id="hapus{{$value->id}}">{{ csrf_field()}}</form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        <hr>
        @php($pageurl = url('admin/master/pc-lpnu'))
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
