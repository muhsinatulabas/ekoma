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
      <h4>Selayang Pandang</h4>
      <div class="card">
        <div class="card-body">
          <form action="{{url('admin/about/proses/selayang-pandang/simpan')}}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
            <textarea class="tinymce form-control" name="selayang"  >{{$data['selayang-pandang']->content}}</textarea>
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
