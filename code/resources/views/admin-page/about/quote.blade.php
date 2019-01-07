@php($page='Quote')
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
        <form action="{{ url('admin/quote/search') }}" method="post">
          <div class="input-group">
            {{ csrf_field() }}
            @php($searchArray = explode("=",$search))
            <input type="text" class="form-control" name="search" placeholder="Cari Data Quote" @if($search != 'all') value="{{ $searchArray[1] }}" @endif>
            <span class="input-group-append">
  						<button class="btn btn-primary" type="submit">Search</button>
  					</span>
          </div>
        </form>
      </div>
      <div class="col-md-6">
        <a href="#modalQuote"  data-toggle="modal"class="btn btn-primary pull-right">TAMBAH</a>
        <div class="modal fade" id="modalQuote">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="title">TAMBAH QUOTE</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="view-body">
                <form action="{{url('admin/quote/proses')}}" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="modal-body">
                    <div class="form-group">
                      <label>Quote</label>
                      <textarea class="form-control" name="quote" id="modal_quote" style="height:200px"></textarea>
                    </div>
                    <div class="form-group">
                      <label>Quote Dari</label>
                      <input type="text" class="form-control" name="nama_lengkap" id="modal_nama">
                    </div>

                    <div class="form-group">
                      <label>Sebagai </label>
                      <input type="text" class="form-control" name="jabatan" id="modal_jabatan">
                    </div>
                    <div class="form-group">
                      <label>Foto</label>
                      <input type="file" class="dropify" name="foto" id="modal_foto">
                    </div>
                    <div class="form-group">
                      <label>Tampilkan</label>
                      <select name="tampil" class="select2" style="width:100%" id="modal_tampil">
                        <option value="1" >Tampilkan</option>
                        <option value="0" >Tidak ditampilkan</option>
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
              <th width="130px">Foto</th>
              <th>Quote</th>
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
                  <p>{{$value->quote}}</p>
                  <div style="margin-bottom:8px;font-weight:bold">{{$value->nama_lengkap}}</div>
                  <div style="margin-bottom:10px;">{{$value->jabatan}}</div>
                </td>
                <td style="width:1px;white-space:nowrap">
                  <a href="javascript:;" onclick="editQuote('{{$value->id}}')"  class="btn-table"><i class="ti ti-pencil-alt"></i></a>
                  <a href="javascript:;" onclick="confirmDelete('{{$value->id}}')" class="btn-table"><i class="ti ti-trash"></i></a>
                  <form action="{{url('admin/quote/proses/delete='.$value->id)}}" method="post" id="hapus{{$value->id}}">{{ csrf_field()}}</form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        <hr>
        @php($pageurl = url('admin/quote'))
        @include('include.pagination')
      </div>
    </div>
  </div>
</div>
@endsection
@section('js')
<script>
  function editQuote(id){
    $.get("{{ url('api/quote') }}/"+id,function(result){
      $('#modal_nama').val(result.nama_lengkap);
      $('#modal_jabatan').val(result.jabatan);
      $('#modal_quote').val(result.quote);
      $('#modal_id').val(id);

      $('#modal_tampil').val(result.tampil);
      $('#modal_tampil').select2();

      $('#title').html('EDIT QUOTE');
      $('#modalQuote').modal('show');
    });
  }
</script>
@endsection
