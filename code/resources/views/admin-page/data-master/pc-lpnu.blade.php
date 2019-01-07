@php($page='Data Master')
@extends('layout.admin')
@section('title')
Data PC LPNU | Ekonomi Maju
@endsection
@section('css')

@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-6">
        <form action="{{ url('admin/master/pc-lpnu/search') }}" method="post">
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
                  <a href="javascript:;" onclick="editPCLPNU('{{$value->id}}')" class="btn-table" ><i class="ti ti-pencil-alt"></i></a>
                  <a href="javascript:;" onclick="confirmDelete('{{$value->id}}')" class="btn-table" ><i class="ti ti-trash"></i></a>
                  <form action="{{url('admin/master/pc-lpnu/proses/delete='.$value->id)}}" method="post" id="hapus{{$value->id}}">{{ csrf_field()}}</form>
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
  function editPCLPNU(id){
    $.get("{{ url('api/pc-lpnu') }}/"+id,function(result){
      $('#modal_nama').val(result.nama_cabang);
      $('#modal_ketua').val(result.ketua);
      $('#modal_email').val(result.email);
      $('#modal_hp').val(result.no_hp);
      $('#modal_alamat').val(result.alamat);
      $('#modal_id').val(id);

      $('#title').html('EDIT PC LPNU');
      $('#modalPCLPNU').modal('show');
    });
  }
</script>
@endsection
