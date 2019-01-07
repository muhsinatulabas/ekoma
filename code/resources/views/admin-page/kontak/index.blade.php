@php($page='Kontak Kami')
@extends('layout.admin')
@section('title')
  Admin Page | Ekonomi Maju
@endsection
@section('css')
<style>
.map{
  height:500px;
  width: 100%;
  background: rgb(213, 213, 213);
  margin-bottom:40px
}
</style>
@endsection
@section('content')
  @include('include.function')
  <div class="row">
    <div class="col-md-12">
      <h4>Kontak Kami</h4>
      <div class="card">
        <div class="card-body">
          <form action="{{url('admin/kontak/proses')}}" method="post">
          {{ csrf_field() }}
          <div class="row">
            <div class="col-md-8">
              <div class="map"></div>
              <div class="form-group">
                <label>Alamat LPNU</label>
                <textarea class="form-control" name="alamat_lpnu">{{$data['alamat-lpnu']}}</textarea>
              </div>
              <div class="form-group">
                <label>Alamat PWNU</label>
                <textarea class="form-control" name="alamat_pwnu">{{$data['alamat-pwnu']}}</textarea>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>No Handphone</label>
                <input type="txt" class="form-control" name="no_hp" value="{{$data['hp']}}">
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="txt" class="form-control" name="email" value="{{$data['email']}}">
              </div>
              <div class="form-group">
                <label>Facebook</label>
                <input type="txt" class="form-control" name="facebook" value="{{$data['facebook']}}">
              </div>
              <div class="form-group">
                <label>Twitter</label>
                <input type="txt" class="form-control" name="twitter" value="{{$data['twitter']}}">
              </div>
              <div class="form-group">
                <label>Instagram</label>
                <input type="txt" class="form-control" name="instagram" value="{{$data['instagram']}}">
              </div>
              <div class="form-group">
                <label>Youtube</label>
                <input type="txt" class="form-control" name="youtube" value="{{$data['youtube']}}">
              </div>
            </div>
          </div>
          <hr>
          <button class="btn btn-primary btn-block">SIMPAN</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('js')

@endsection
