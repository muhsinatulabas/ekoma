@php($page='Data Master')
@extends('layout.admin')
@section('title')
Data User | Ekonomi Maju
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
        <form action="{{ url('admin/master/user/search') }}" method="post">
          <div class="input-group">
            {{ csrf_field() }}
            @php($searchArray = explode("=",$search))
            <input type="text" class="form-control" name="search" placeholder="Cari Data User" @if($search != 'all') value="{{ $searchArray[1] }}" @endif>
            <span class="input-group-append">
  						<button class="btn btn-primary" type="submit">Search</button>
  					</span>
          </div>
        </form>
      </div>
      <div class="col-md-6">
        <a href="#modalUser"  data-toggle="modal"class="btn btn-primary pull-right">TAMBAH</a>
        <div class="modal fade" id="modalUser">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="title">TAMBAH USER</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="view-body">
                <form action="{{url('admin/master/user/proses')}}" method="POST">
                  {{ csrf_field() }}
                  <div class="modal-body">
                    <div class="form-group">
                      <label> Nama Lengkap </label>
                      <input type="text" class="form-control" name="nama_lengkap" id="modal_nama">
                    </div>
                    <div class="form-group">
                      <label> Username </label>
                      <input type="text" class="form-control" name="username" id="modal_username">
                    </div>
                    <div class="form-group">
                      <label> Password </label>
                      <input type="text" class="form-control" name="password">
                      <div style="color:#b50000;font-size:11px;font-style:italic" id="note" >Kosongi jika password tidak berubah</div>
                    </div>
                    <div class="form-group">
                      <label> Email </label>
                      <input type="text" class="form-control" name="email" id="modal_email">
                    </div>
                    <div class="form-group">
                      <label> Nomor HP </label>
                      <input type="text" class="form-control" name="hp" id="modal_hp">
                    </div>
                    <div class="form-group">
                      <label> Hak Akses </label>
                      <select name="hak_akses" class="select2" style="width:100%" id="modal_hakakses">
                        @foreach ($master['hak-akses'] as $key => $value)
                          <option value="{{$value->id}}" >{{$value->hak_akses}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label>PC LPNU</label>
                      <select name="pc_lpnu" class="select2" style="width:100%" id="modal_pc_lpnu">
                        <option value="0" >PW LPNU Jawa Timur</option>
                        @foreach ($master['pc-lpnu'] as $key => $value)
                          <option value="{{$value->id}}" >{{$value->nama_cabang}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <input type="hidden" name="id" id="modal_id" value="0">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <hr>
    <div class="card">
      <div class="card-body">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th width="50px">No</th>
              <th>Nama Lengkap</th>
              <th>Hak Akses</th>
              <th>Username</th>
              <th>Email</th>
              <th>Handphone</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data['data'] as $key => $value)
              <tr>
                <td>{{(($data['pageposition']-1)*10)+($key+1)}}</td>
                <td>{{$value->nama_lengkap}}</td>
                <td>{{$value->hak_akses}}<br>@if($value->fid_pc_lpnu==0) PW LPNU Jawa Timur @else{{$value->nama_cabang}}@endif</td>
                <td>{{$value->username}}</td>
                <td>{{$value->email}}</td>
                <td>{{$value->no_hp}}</td>
                <td style="width:1px;white-space:nowrap">
                  <a href="javascript:;" onclick="editUser('{{$value->id}}')"  class="btn-table" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit User"><i class="ti ti-pencil-alt"></i></a>
                  <a href="javascript:;" onclick="confirmDelete('{{$value->id}}')" class="btn-table" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus User"><i class="ti ti-trash"></i></a>
                  <form action="{{url('admin/master/user/proses/delete='.$value->id)}}" method="post" id="hapus{{$value->id}}">{{ csrf_field()}}</form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        <hr>
        @php($pageurl = url('admin/master/user'))
        @include('include.pagination')
      </div>
    </div>
  </div>
</div>
@endsection
@section('js')
<script>
  $('#note').hide();
  function editUser(id){
    $.get("{{ url('api/user') }}/"+id,function(result){
      $('#modal_nama').val(result.nama_lengkap);
      $('#modal_username').val(result.username);
      $('#modal_email').val(result.email);
      $('#modal_hp').val(result.no_hp);
      $('#modal_id').val(id);

      $('#modal_hakakses').val(result.fid_hak_akses);
      $('#modal_hakakses').select2();

      $('#modal_pc_lpnu').val(result.fid_pc_lpnu);
      $('#modal_pc_lpnu').select2();

      $('#note').show();
      $('#title').html('EDIT USER');
      $('#modalUser').modal('show');
    });
  }
</script>
@endsection
