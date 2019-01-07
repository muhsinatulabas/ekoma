<div class="row page_margin_top_section">
  <div class="column column_2_3">
    <ul class="blog big" style="margin-top:-30px">
      @foreach ($data['data'] as $key => $value)
        <li class="post">
          <a href="{{url('')}}">
            <div class="frame-image-blog" style="background-image:url('{{asset('storage/'.$value->file)}}') ;float:left"></div>
          </a>
          <div class="post_content">
            <h3><a href="{{url('')}}">{{$value->judul}}</a></h3>
          </div>
          <div class="post-detil">
            <span style="color:#3d8000">@if($value->fid_pc_lpnu==0)PW LPNU Jawa Timur @else{{$value->nama_cabang}}@endif</span>,
            {{dateFormat($value->tanggal,'d/m/Y')}}, {{dateFormat($value->tanggal,'H:i:s')}}
          </div>
          <div class="post_content">
          {!!substr($value->content,0,150)!!}...<span style="font-size:12px;font-weight:bold">(Sumber : {{$value->sumber}})</span>
          </div>
        </li>
      @endforeach
    </ul>
    @php($pageurl = url('pc-lpnu/'.$id.'/'.$tab))
    @include('include.pagination-website')
  </div>
  <div class="column column_1_3">
    <h4 class="box_header">Kategori</h4>
    <ul class="list no_border spacing">
      @foreach ($master['kategori'] as $key => $value)
        <li class="bullet style_2"><a href="{{url('pc-lpnu/'.$id.'/berita/'.$value->id)}}">{{$value->nama_kategori}}</a></li>
      @endforeach
    </ul>

    <h4 class="box_header page_margin_top_section">Ekonomi Pesantren</h4>
    <ul class="blog small clearfix">
      @foreach ($data['pesantren'] as $key => $value)
      <li class="post">
        <a href="{{url('')}}">
          <div class="frame-image-kotak" style="background-image:url('{{asset('storage/'.$value->file)}}')"></div>
        </a>
        <div class="post_content">
          <h5><a href="{{url('')}}" >{{$value->judul}}</a></h5>
          <div style="color:#6a6a6a;margin-top:5px;font-size:12px">{{tgl_indo($value->tanggal)}}, {{dateFormat($value->tanggal,'H:i:s')}}</div>
        </div>
      </li>
      @endforeach
    </ul>

    <h4 class="box_header page_margin_top_section">Koperasi</h4>
    <ul class="blog small clearfix">
      @foreach ($data['koperasi'] as $key => $value)
      <li class="post">
        <a href="{{url('')}}">
          <div class="frame-image-kotak" style="background-image:url('{{asset('storage/'.$value->file)}}')"></div>
        </a>
        <div class="post_content">
          <h5><a href="{{url('')}}" >{{$value->judul}}</a></h5>
          <div style="color:#6a6a6a;margin-top:5px;font-size:12px">{{tgl_indo($value->tanggal)}}, {{dateFormat($value->tanggal,'H:i:s')}}</div>
        </div>
      </li>
      @endforeach
    </ul>

    <h4 class="box_header page_margin_top_section">Investasi</h4>
    <ul class="blog small clearfix">
      @foreach ($data['investasi'] as $key => $value)
      <li class="post">
        <a href="{{url('')}}">
          <div class="frame-image-kotak" style="background-image:url('{{asset('storage/'.$value->file)}}')"></div>
        </a>
        <div class="post_content">
          <h5><a href="{{url('')}}" >{{$value->judul}}</a></h5>
          <div style="color:#6a6a6a;margin-top:5px;font-size:12px">{{tgl_indo($value->tanggal)}}, {{dateFormat($value->tanggal,'H:i:s')}}</div>
        </div>
      </li>
      @endforeach
    </ul>
  </div>
</div>
