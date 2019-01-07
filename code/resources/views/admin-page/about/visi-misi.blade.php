@php($page='Tentang Kami')
@extends('layout.admin')
@section('title')
  Admin Page | Ekonomi Maju
@endsection
@section('css')
<style>

</style>
@endsection
@section('content')
  @include('include.function')
  <div class="row">
    <div class="col-md-12">
      <h4>Visi dan Misi</h4>
      <div class="card">
        <div class="card-body">
          <form action="{{url('admin/about/proses/visi-misi/simpan')}}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
            <label>Visi</label>
            <textarea class="tinymce form-control" name="visi"  >{{$data['visi']->content}}</textarea>
            </div>
            <div class="form-group">
            <label>Misi</label>
            <textarea class="tinymce form-control" name="misi"  >{{$data['misi']->content}}</textarea>
            </div>
            <button class="btn btn-primary btn-block">SIMPAN</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('js')

@endsection
