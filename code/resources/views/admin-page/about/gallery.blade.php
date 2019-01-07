@php($page='Tentang Kami')
@extends('layout.admin')
@section('title')
  Admin Page | Ekonomi Maju
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('admin-page/assets/magnific-popup/magnific-popup.css')}}">
<style>
.folder-gallery{
  text-align: center;
  position: relative;
}
.tombol-folder{
  position: absolute;
  left: 0;
  right: 0;
  top:55px;
  margin-left: auto;
  margin-right: auto;
  display:none;
}

.title-folder, .caption{
  font-size: 13px;
  height:35px;
  overflow: hidden;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  line-height: 17px;
  -webkit-box-orient: vertical;
}
.folder-gallery a, .list-gallery a{
  color:#262626
}
.folder-gallery a:hover, .list-gallery a:hover{
  text-decoration: none;
  color:#262626
}
.folder-gallery:hover .tombol-folder{
  display:block;
}

.frame-image {
  background-color: white;
  width: 100%;
  padding-top: 70%; /* 1:1 Aspect Ratio */
  position: relative; /* If you want text inside of it */
  background-position: 50% 50%;
  background-repeat:no-repeat;
  background-size:cover;
}

.overlay {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  background-color: rgba(8, 167, 28, 0.84);
  overflow: hidden;
  width: 100%;
  height: 0;
  transition: .5s ease;
}

.frame-image:hover .overlay {
  height: 100%;
}

.frame-image .text {
  color: white;
  font-size: 13px;
  font-weight: 400;
  position: absolute;
  bottom:10px;
  left:10px
}

.frame-image .tombol-gallery {
  font-size: 13px;
  font-weight: 400;
  position: absolute;
  top:10px;
  right:10px
}
.frame-image .tombol-gallery a{
  color:#fff
}
</style>
@endsection
@section('content')
  @include('include.function')
  <div class="row">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-6">
          @if($id=='all')
          <form action="{{ url('admin/about/gallery/search') }}" method="post">
            <div class="input-group">
              {{ csrf_field() }}
              @php($searchArray = explode("=",$search))
              <input type="text" class="form-control" name="search" placeholder="Cari Folder Gallery" @if($search != 'all') value="{{ $searchArray[1] }}" @endif>
              <span class="input-group-append">
                <button class="btn btn-primary" type="submit">Search</button>
              </span>
            </div>
          </form>
          @else
            <form action="{{ url('admin/about/gallery/'.$id.'/search') }}" method="post">
              <div class="input-group">
                {{ csrf_field() }}
                @php($searchArray = explode("=",$search))
                <input type="text" class="form-control" name="search" placeholder="Cari Foto" @if($search != 'all') value="{{ $searchArray[1] }}" @endif>
                <span class="input-group-append">
                  <button class="btn btn-primary" type="submit">Search</button>
                </span>
              </div>
            </form>
          @endif
        </div>
        <div class="col-md-6">

          <a href="#modalGallery"  data-toggle="modal"class="btn btn-primary pull-right">TAMBAH</a>
          <div class="modal fade" id="modalGallery">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="title">TAMBAH FOLDER</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="view-body">
                  <form action="{{url('admin/gallery/'.$id.'/proses')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body">
                      @if($id=='all')
                      <div class="form-group">
                        <label>Nama Folder</label>
                        <input type="text" class="form-control" name="nama_album" id="modal_album">
                      </div>
                      @else
                      <div id="modal_foto">
                      <div class="form-group">
                        <label>Foto</label>
                        <input type="file" class="dropify" name="foto" >
                      </div>
                      </div>
                      <div class="form-group">
                        <label>Caption</label>
                        <input type="text" class="form-control" name="caption" id="modal_caption">
                      </div>
                      @endif
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
          @if($id=='all')
            <div class="row">
              @foreach ($data['data'] as $key => $value)
              <div class="col-md-2">
                <div class="folder-gallery">
                  <a href="{{url('admin/about/gallery/'.$value->id)}}" title="{{$value->album}}">
                  <img src="{{asset('admin-page/assets/images/folder_icon.png')}}">
                  <div class="title-folder">{{$value->album}}</div>
                  </a>
                  <div class="tombol-folder">
                    <a href="javascript:;" onclick="editAlbum('{{$value->id}}')"  class="btn-table"><i class="ti ti-pencil-alt"></i></a>
                    <a href="javascript:;" onclick="confirmDelete('{{$value->id}}')" class="btn-table"><i class="ti ti-trash"></i></a>
                    <form action="{{url('admin/gallery/'.$id.'/proses/delete='.$value->id)}}" method="post" id="hapus{{$value->id}}">{{ csrf_field()}}</form>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          @else
          <div class="row">
            <div class="col-md-10"><h4>{{$data['nama-album']->album}}</h4></div>
            <div class="col-md-2"><a href="{{url('admin/about/gallery')}}" class="btn btn-primary btn-block">KEMBALI</a></div>
          </div>
          <hr>
          <div class="row parent-container">
            @foreach ($data['data'] as $key => $value)
            <div class="col-md-3">
              <div class="list-gallery">
                <div class="frame-image" style="background-image:url('{{asset('storage/'.$value->foto)}}')">
                  <div class="overlay">
                    <div class="tombol-gallery">
                      <a class="gallery-list btn-table" href="{{asset('storage/'.$value->foto)}}" title="{{$value->caption}}"><i class="ti ti-search"></i></a>
                      <a href="javascript:;" onclick="editGallery('{{$value->id}}')"  class="btn-table"><i class="ti ti-pencil-alt"></i></a>
                      <a href="javascript:;" onclick="confirmDelete('{{$value->id}}')" class="btn-table"><i class="ti ti-trash"></i></a>
                      <form action="{{url('admin/gallery/'.$id.'/proses/delete='.$value->id)}}" method="post" id="hapus{{$value->id}}">{{ csrf_field()}}</form>
                    </div>
                    <div class="text">{{$value->caption}}</div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>
@endsection
@section('js')
  <script type="text/javascript" src="{{asset("admin-page/assets/magnific-popup/jquery.magnific-popup.js")}}"></script>
  <script>
    function editAlbum(id){
      $.get("{{ url('api/album') }}/"+id,function(result){
        $('#modal_album').val(result.album);
        $('#modal_id').val(id);
        $('#title').html('EDIT ALBUM');
        $('#modalGallery').modal('show');
      });
    }
    function editGallery(id){
      $.get("{{ url('api/gallery') }}/"+id,function(result){
        $('#modal_caption').val(result.caption);
        $('#modal_foto').hide();
        $('#modal_id').val(id);
        $('#title').html('EDIT GALLERY');
        $('#modalGallery').modal('show');
      });
    }

    $(function(){
      $('.parent-container').magnificPopup({
        delegate: '.gallery-list',
        gallery: {
          enabled: true
        },
        type: 'image'
      });
    });

  </script>
@endsection
