@php($page='Tentang Kami')
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
  .icon-kontak{
    margin-right:10px
  }
  ul{
    padding: 0px;
    margin:0px
  }
  ul li{
    line-height: 25px;
    list-style: none;

  }
  </style>
@endsection
@section('content')
  @include('include.function')
  <div class="row">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-6">
          <form action="{{ url('admin/quote/search') }}" method="post">
            <div class="input-group">
              {{ csrf_field() }}
              @php($searchArray = explode("=",$search))
              <input type="text" class="form-control" name="search" placeholder="Cari Data Pengurus LPNU" @if($search != 'all') value="{{ $searchArray[1] }}" @endif>
              <span class="input-group-append">
    						<button class="btn btn-primary" type="submit">Search</button>
    					</span>
            </div>
          </form>
        </div>
        <div class="col-md-6">
          <a href="#modalPengurus"  data-toggle="modal"class="btn btn-primary pull-right">TAMBAH</a>
          <div class="modal fade" id="modalPengurus">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="title">TAMBAH PENGURUS</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="view-body">
                  <form action="{{url('admin/pengurus/proses')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body">
                      <div class="form-group">
                        <label>Foto</label>
                        <input type="file" class="dropify" name="foto" id="modal_foto">
                      </div>
                      <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama_lengkap" id="modal_nama">
                      </div>
                      <div class="form-group">
                        <label>Jabatan</label>
                        <select name="jabatan" class="select2" style="width:100%" id="modal_jabatan">
                          @foreach ($master['jabatan'] as $key => $value)
                            <option value="{{$value->id}}" >{{$value->jabatan}}</option>
                          @endforeach
                        </select>
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
                        <label> Alamat </label>
                        <textarea class="form-control" name="alamat" id="modal_alamat"></textarea>
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
                <th width="150px">Foto Profil</th>
                <th>Informasi Pengurus</th>
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
                    <div style="margin-bottom:8px;font-weight:bold;font-size:20px">{{$value->nama_lengkap}}</div>
                    <div style="margin-bottom:10px;">{{$value->jabatan}}</div>
                    <ul>
                      <li><i class="icon-kontak icon-phone"></i>{{$value->no_hp}}</li>
                      <li><i class="icon-kontak icon-envelope-letter"></i>{{$value->email}}</li>
                      <li><i class="icon-kontak icon-location-pin"></i>{{$value->alamat}}</li>
                    </ul>
                  </td>
                  <td style="width:1px;white-space:nowrap">
                    <a href="javascript:;" onclick="editPengurus('{{$value->id}}')"  class="btn-table"><i class="ti ti-pencil-alt"></i></a>
                    <a href="javascript:;" onclick="confirmDelete('{{$value->id}}')" class="btn-table"><i class="ti ti-trash"></i></a>
                    <form action="{{url('admin/pengurus/proses/delete='.$value->id)}}" method="post" id="hapus{{$value->id}}">{{ csrf_field()}}</form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          <hr>
          @php($pageurl = url('admin/about/pengusaha/all'))
          @include('include.pagination')
        </div>
      </div>
    </div>
  </div>
@endsection
@section('js')
  <script>
    function editPengurus(id){
      $.get("{{ url('api/pengurus') }}/"+id,function(result){
        $('#modal_nama').val(result.nama_lengkap);
        $('#modal_alamat').val(result.alamat);
        $('#modal_email').val(result.email);
        $('#modal_hp').val(result.no_hp);
        $('#modal_id').val(id);

        $('#modal_jabatan').val(result.fid_jabatan);
        $('#modal_jabatan').select2();

        $('#title').html('EDIT PENGURUS');
        $('#modalPengurus').modal('show');
      });
    }
  </script>
@endsection
