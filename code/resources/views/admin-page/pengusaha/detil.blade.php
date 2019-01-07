@php($page='Pengusaha NU')
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
  .header-pengusaha{
    background:rgb(230, 230, 230);
    background-image:url('{{asset('website/assets/images/pattern.png')}}');
    height: 200px;
    margin:-30px;
    position: relative;
  }
  .avatar-pengusaha{
    width:150px;
    position:absolute;
    bottom:-60px;
    left:30px;
  }
  .nama-pengusaha{
    width:100%;
    position:absolute;
    left:200px;
    bottom:5px;
    font-size:30px;
    font-weight:bold;
    line-height:25px
  }
  .title{
    width:100%;
    position:absolute;
    left:200px;
    bottom:-50px;
  }
  .tombol-tambah{
    position:absolute;
    right:20px;
    top:20px;
  }
  </style>
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="header-pengusaha">
          <div class="avatar-pengusaha">
            <div class="frame-avatar" style="background-image:url('{{asset('storage/'.$data['pengusaha']->foto)}}')"></div>
          </div>
          <div class="nama-pengusaha">
            <div>{{$data['pengusaha']->nama_lengkap}}</div>
            <label style="padding:5px;font-size:11px;background:{{$data['pengusaha']->color}};color:#fff;line-height:normal">{{$data['pengusaha']->level_pengusaha}}</label>
          </div>
          <div class="title">
            {{$data['pengusaha']->title}}<br>
            @if($data['pengusaha']->fid_pc_lpnu==0)PW LPNU Jawa Timur @else{{$data['pengusaha']->nama_cabang}}@endif
          </div>
          <div class="tombol-tambah"><a href="#modalPerusahaan"  data-toggle="modal"class="btn btn-primary pull-right" style="margin-bottom:20px">TAMBAH UNIT USAHA</a></div>
        </div>
        <div style="margin-top:100px"></div>
        <div class="row">
          <div class="col-md-4">
            <div class="wrapper about-user">
              <h4 class="card-title mt-4 mb-3">About</h4>
              <p>{{$data['pengusaha']->deskripsi}}</p>
              <hr>
              <div class="form-group">
                <label>NIK</label>
                <div>{{$data['pengusaha']->nik}}</div>
                <hr>
              </div>
              <div class="form-group">
                <label>Email</label>
                <div>{{$data['pengusaha']->email}}</div>
                <hr>
              </div>
              <div class="form-group">
                <label>No Handphone</label>
                <div>{{$data['pengusaha']->no_hp}}</div>
                <hr>
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <div>{{$data['pengusaha']->alamat}}</div>
                <hr>
              </div>
            </div>
          </div>
          <div class="col-md-8" style="padding-left:50px">
            <h4 class="card-title mt-4 mb-3">Perusahaan / Unit Usaha</h4>
            <table class="table table-hover">
              <tbody>
                @foreach ($data['perusahaan'] as $key => $value)
                  <tr>
                    <td width="100px"><div class="frame-avatar" style="background-image:url('{{asset('storage/'.$value->logo_perusahaan)}}')"></div></td>
                    <td>
                      <div style="margin-bottom:10px;font-size:20px;font-weight:600">{{$value->nama_perusahaan}}</div>
                      <div style="margin-bottom:5px;line-height:20px">{{$value->deskripsi}}</div>
                    </td>
                    <td style="width:1px;white-space:nowrap">
                      <a href="javascript:;" onclick="editPerusahaan('{{$value->id}}')"  class="btn-table"><i class="ti ti-pencil-alt"></i></a>
                      <a href="javascript:;" onclick="confirmDelete('{{$value->id}}')" class="btn-table"><i class="ti ti-trash"></i></a>
                      <form action="{{url('admin/pengusaha/detil/'.$id.'/proses/delete='.$value->id)}}" method="post" id="hapus{{$value->id}}">{{ csrf_field()}}</form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>

          </div>
        </div>

      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="modalPerusahaan">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="title">TAMBAH PERUSAHAAN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="view-body">
        <form action="{{url('admin/pengusaha/detil/'.$id.'/proses')}}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="modal-body">
            <div class="form-group">
              <label>Logo Perusahaan</label>
              <input type="file" class="dropify" name="logo" id="modal_logo">
            </div>
            <div class="form-group">
              <label> Nama Perusahaan </label>
              <input type="text" class="form-control" name="nama_perusahaan" id="modal_nama">
            </div>
            <div class="form-group">
              <label> Badan Hukum </label>
              <input type="text" class="form-control" name="badan_hukum" id="modal_badan_hukum">
            </div>
            <div class="form-group">
              <label> Deskripsi</label>
              <textarea class="form-control" name="deskripsi" id="modal_deskripsi"></textarea>
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


@endsection
@section('js')
<script>
  function editPerusahaan(id){
    $.get("{{ url('api/perusahaan') }}/"+id,function(result){
      $('#modal_nama').val(result.nama_perusahaan);
      $('#modal_badan_hukum').val(result.badan_hukum);
      $('#modal_deskripsi').val(result.deskripsi);

      $('#modal_id').val(id);

      $('#title').html('EDIT PERUSAHAAN');
      $('#modalPerusahaan').modal('show');
    });
  }
</script>
@endsection
