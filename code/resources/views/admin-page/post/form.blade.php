@php($page=$title_post)
@extends('layout.admin')
@section('title')
  Admin Page | Ekonomi Maju
@endsection
@section('css')
<style>
.table tr td{
  vertical-align: top
}
</style>
@endsection
@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <form action="{{url('admin/post/'.$post.'/proses/'.$parameter)}}" method="post" enctype="multipart/form-data" >
            {{ csrf_field() }}
            <div class="form-group">
              <label>Judul {{$title_post}}</label>
              <input type="text" class="form-control" name="judul" value="@if(!empty($data['post'])){{$data['post']->judul}}@endif">
            </div>
            @if($post=='video')
              <div class="form-group">
                <label>Cover Video</label>
                <input type="file" class="dropify" name="file" data-default-file="@if(!empty($data['post'])){{asset('storage/'.$data['post']->file)}}@endif">
              </div>
              <div class="form-group">
                <label>Link Video Youtube</label>
                <br>
                @if(!empty($data['post']->link_video))
                <iframe style="width:300px;height:200px" src="{{$data['post']->link_video}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                @endif
                <input type="text" class="form-control" name="link_video" value="@if(!empty($data['post'])){{$data['post']->link_video}}@endif">
                <span style="font-size:11px">Contoh : https://www.youtube.com/embed/kode-embed</span>
              </div>
            @else
            <div class="form-group">
              <label>Foto / Gambar</label>
              <input type="file" class="dropify" name="file" data-default-file="@if(!empty($data['post'])){{asset('storage/'.$data['post']->file)}}@endif">
            </div>
            @endif
            <div class="form-group">
              <label>Content</label>
              <textarea class="tinymce form-control" name="content" >@if(!empty($data['post'])){{$data['post']->content}}@endif</textarea>
            </div>
            <div class="form-group">
              <label>Kategori {{$title_post}}</label>
              <select class="select2" name="kategori[]" multiple="multiple" style="width:100%">
                @foreach ($master['kategori'] as $key => $value)
                <option value="{{$value->id}}" {{$value->selected}} >{{$value->nama_kategori}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>PC LPNU</label>
              <select class="select2" name="pc_lpnu" style="width:100%">
                <option value="0">PW LPNU Jawa Timur</option>
                @foreach ($master['pc-lpnu'] as $key => $value)
                <option value="{{$value->id}}" @if(!empty($data['post'])) @if($data['post']->fid_pc_lpnu==$value->id) selected @endif @endif >{{$value->nama_cabang}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Sumber {{$title_post}}</label>
              <input type="text" class="form-control" name="sumber" value="@if(!empty($data['post'])){{$data['post']->sumber}}@endif">
            </div>
            <div class="icheck-square">
              <input tabindex="5" name="headline" value="1" type="checkbox" id="square-checkbox-1" @if(!empty($data['post'])) @if($data['post']->headline==1) checked @endif @endif >
              <label for="square-checkbox-1">Headline Post (Centang jika iya)</label>
            </div>
            <hr>
            <div class="pull-right">
              <button class="btn btn-primary">Simpan</button>
              <a href="{{url('admin/post/'.$post.'/list')}}" class="btn btn-secondary">Tutup</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('js')

@endsection
