@php($page='Data Master')
@extends('layout.admin')
@section('title')
Data Modul | Ekonomi Maju
@endsection
@section('css')

@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-6">

      </div>
      <div class="col-md-6">
        <a href="#modalModul"  data-toggle="modal"class="btn btn-primary pull-right">TAMBAH</a>
        <div class="modal fade" id="modalModul">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="title">TAMBAH MODUL</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="view-body">
                <form action="{{url('admin/master/modul/proses')}}" method="POST">
                  {{ csrf_field() }}
                  <div class="modal-body">
                    <div class="form-group">
                      <label> Nama Modul </label>
                      <input type="text" class="form-control" name="nama_modul" id="modal_nama">
                    </div>
                    <div class="form-group">
                      <label> Icon </label>
                      <input type="text" class="form-control" name="icon" id="modal_icon">
                    </div>
                    <div class="form-group">
                      <label> Parent Modul </label>
                      <select name="parent_modul" class="select2" style="width:100%" id="modal_parent">
                        @foreach ($master['hak-akses'] as $key => $value)
                          <option value="{{$value->id}}" >{{$value->hak_akses}}</option>
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
              <th>Nama Modul</th>
              <th>Parent Modul</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $key => $value)
              <tr>
                <td>{{$key+1}}</td>
                <td>{{$value->nama_modul}}</td>
                <td>{{$value->parent_modul}}</td>
                <td style="width:1px;white-space:nowrap">
                  <a href="javascript:;" onclick="editModul('{{$value->id}}')"  class="btn-table" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Modul"><i class="ti ti-pencil-alt"></i></a>
                  <a href="javascript:;" onclick="confirmDelete('{{$value->id}}')" class="btn-table" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus Modul"><i class="ti ti-trash"></i></a>
                  <form action="{{url('admin/master/modul/proses/delete='.$value->id)}}" method="post" id="hapus{{$value->id}}">{{ csrf_field()}}</form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
@section('js')
<script>
  function editModul(id){
    $.get("{{ url('api/modul') }}/"+id,function(result){
      $('#modal_nama').val(result.nama_modul);
      $('#modal_icon').val(result.icon);
      $('#modal_id').val(id);

      $('#modal_parent').val(result.parent);
      $('#modal_parent').select2();

      $('#title').html('EDIT MODUL');
      $('#modalModul').modal('show');
    });
  }
</script>
@endsection
