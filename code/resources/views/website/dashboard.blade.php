@php($menu='dashboard')
@extends('layout.main')
@section('css')
<style>
.divider.last {
  width: auto;
}

</style>
@endsection
@section('content')
@include('include.function')
<div class="row page_margin_top">
  <div class="column column_2_3">
    {{--SLIDER NEWS--}}
    <div class="caroufredsel_wrapper caroufredsel_wrapper_small_slider">
      <ul class="small_slider id-small_slider">
        @foreach ($data['headline-post'] as $key => $value)
          <li class="slide">
            <a href="{{url('post-detil/'.strtolower($value->nama_modul).'/'.$value->id)}}">
              <div class="frame-image-slide " style="background-image:url('{{asset('storage/'.$value->file)}}')"><img src=''></div>
            </a>
  					<div class="slider_content_box">
  						<ul class="post_details simple">
  							<li class="category"><a href="{{url('post/'.strtolower($value->nama_modul).'/list')}}">{{$value->nama_modul}}</a></li>
  							<li class="date">{{tgl_indo($value->tanggal)}}</li>
  						</ul>
  						<h2><a href="{{url('post-detil/'.strtolower($value->nama_modul).'/'.$value->id)}}">{{$value->judul}}</a></h2>
  					</div>
  				</li>
        @endforeach
      </ul>
    </div>
    <div id="small_slider" class='slider_posts_list_container small'></div>

    {{--BERITA TERKINI--}}
    <h4 class="box_header page_margin_top_section">Berita Terikini</h4>
    <div class="row">
      @foreach ($data['berita-post-single'] as $key => $value)
      <ul class="blog column column_1_2">
        <li class="post">
          <a href="{{url('post-detil/'.strtolower($value->nama_modul).'/'.$value->id)}}">
            <div class="frame-image-blog blog-list" style="background-image:url('{{asset('storage/'.$value->file)}}')"></div>
          </a>
          <h2><a href="{{url('post-detil/'.strtolower($value->nama_modul).'/'.$value->id)}}" >{{$value->judul}}</a></h2>
          <ul class="post_details simple">
            <li class="category">{{tgl_indo($value->tanggal)}}</li>
            <li class="date">{{dateFormat($value->tanggal,'H:i:s')}}</li>
          </ul>
          <br>
          <div>{!!substr($value->content,0,250)!!}</div>
          <a class="read_more" href="{{url('post-detil/'.strtolower($value->nama_modul).'/'.$value->id)}}"><span class="arrow"></span><span>READ MORE</span></a>
        </li>
      </ul>
      @endforeach

			<div class="column column_1_2">
				<ul class="blog small clearfix">
          @foreach ($data['berita-post'] as $key => $value)
					<li class="post">
						<a href="{{url('post-detil/'.strtolower($value->nama_modul).'/'.$value->id)}}">
              <div class="frame-image-kotak" style="background-image:url('{{asset('storage/'.$value->file)}}')"></div>
            </a>
						<div class="post_content">
							<h5><a href="{{url('post-detil/'.strtolower($value->nama_modul).'/'.$value->id)}}">{{$value->judul}}</a></h5>
							<ul class="post_details simple">
								<li class="category">{{tgl_indo($value->tanggal)}}</li>
								<li class="date">{{dateFormat($value->tanggal,'H:i:s')}}</li>
							</ul>
						</div>
					</li>
          @endforeach
        </ul>
      </div>
    </div>

    <div class="advertising"></div>
    {{--AGENDA TERKINI--}}
    <h4 class="box_header page_margin_top_section">Agenda</h4>
    <div class="row">
      @foreach ($data['agenda-post-single'] as $key => $value)
      <ul class="blog column column_1_2">
        <li class="post">
          <a href="{{url('post-detil/'.strtolower($value->nama_modul).'/'.$value->id)}}">
            <div class="frame-image-blog blog-list" style="background-image:url('{{asset('storage/'.$value->file)}}')"></div>
          </a>
          <h2><a href="{{url('post-detil/'.strtolower($value->nama_modul).'/'.$value->id)}}" >{{$value->judul}}</a></h2>
          <ul class="post_details simple">
            <li class="category">{{tgl_indo($value->tanggal)}}</li>
            <li class="date">{{dateFormat($value->tanggal,'H:i:s')}}</li>
          </ul>
          <br>
          <div>{!!substr($value->content,0,250)!!}</div>
          <a class="read_more" href="{{url('post-detil/'.strtolower($value->nama_modul).'/'.$value->id)}}"><span class="arrow"></span><span>READ MORE</span></a>
        </li>
      </ul>
      @endforeach

			<div class="column column_1_2">
				<ul class="blog small clearfix">
          @foreach ($data['agenda-post'] as $key => $value)
					<li class="post">
						<a href="{{url('post-detil/'.strtolower($value->nama_modul).'/'.$value->id)}}">
              <div class="frame-image-kotak" style="background-image:url('{{asset('storage/'.$value->file)}}')"></div>
            </a>
						<div class="post_content">
							<h5><a href="{{url('post-detil/'.strtolower($value->nama_modul).'/'.$value->id)}}">{{$value->judul}}</a></h5>
							<ul class="post_details simple">
								<li class="category">{{tgl_indo($value->tanggal)}}</li>
								<li class="date">{{dateFormat($value->tanggal,'H:i:s')}}</li>
							</ul>
						</div>
					</li>
          @endforeach
        </ul>
      </div>
    </div>

  </div>
  <div class="column column_1_3">
    {{--Quote--}}
    <div class="horizontal_carousel_container big">
			<ul class="blog horizontal_carousel visible-1 autoplay-0 scroll-1 navigation-1 easing-easeInOutQuint duration-750">
        @foreach ($data['quote'] as $key => $value)
          <li class="post">
            <img src="">
            <p style="font-size:18px;width:280px;margin:0px;padding:0px">{{$value->quote}}</p>
            <div class="divider_block clearfix" style="margin-top:10px;margin-bottom:30px">
              <hr class="divider" style="width:1000px;">
              <hr class="divider subheader_arrow" style="position:absolute;left:40px">
            </div>
            <div class="avatar-quote" style="background-image:url('{{asset('storage/'.$value->foto)}}')"></div>
            <div class="author-quote">
              <div style="font-weight:bold;margin-bottom:5px">{{$value->nama_lengkap}}</div>
              <span style="font-style:italic;font-size:12px;color:#6b6b6b">{{$value->jabatan}}</span>
            </div>
          </li>
        @endforeach
      </ul>
    </div>

    {{--Ekonomi Pesantren--}}
    <h4 class="box_header page_margin_top_section">Ekonomi Pesantren</h4>
    <ul class="blog small_margin clearfix">
      <li class="post">
        <a href="{{url('')}}">
          <img src='{{asset('website/assets/images/samples/510x187/image_12.jpg')}}' alt='img'>
        </a>
        <div class="post_content">
          <h5>
            <a href="{{url('')}}" >Lorem Ipsum is simply dummy text of the printing and typesetting industry.</a>
          </h5>
          <ul class="post_details simple">
            <li class="category"><a href="{{url('')}}" >EKONOMI</a></li>
            <li class="date">10:11 PM, Feb 02</li>
          </ul>
        </div>
      </li>
    </ul>

    <div class="vertical_carousel_container clearfix">
			<ul class="blog small vertical_carousel autoplay-1 scroll-1 navigation-1 easing-easeInOutQuint duration-750">
      @foreach ($data['pesantren-post'] as $key => $value)
        <li class="post">
					<a href="{{url('post-detil/'.strtolower($value->nama_modul).'/'.$value->id)}}">
						<div class="frame-image-kotak" style="background-image:url('{{asset('storage/'.$value->file)}}')"><img src=""></div>
					</a>
					<div class="post_content">
						<h5>
							<a href="{{url('post-detil/'.strtolower($value->nama_modul).'/'.$value->id)}}">{{$value->judul}}</a>
						</h5>
            <ul class="post_details simple">
              <li class="category">{{tgl_indo($value->tanggal)}}</li>
              <li class="date">{{dateFormat($value->tanggal,'H:i:s')}}</li>
            </ul>
					</div>
				</li>
      @endforeach
			</ul>
		</div>

    {{--Startup--}}
    <h4 class="box_header page_margin_top_section">Koperasi</h4>
    <ul class="blog small_margin clearfix">
      <li class="post">
        <a href="{{url('')}}">
          <img src='{{asset('website/assets/images/samples/510x187/image_12.jpg')}}' alt='img'>
        </a>
        <div class="post_content">
          <h5>
            <a href="{{url('')}}">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</a>
          </h5>
          <ul class="post_details simple">
            <li class="category"><a href="{{url('')}}" >EKONOMI</a></li>
            <li class="date">10:11 PM, Feb 02</li>
          </ul>
        </div>
      </li>
    </ul>

    <div class="vertical_carousel_container clearfix">
			<ul class="blog small vertical_carousel autoplay-1 scroll-1 navigation-1 easing-easeInOutQuint duration-750">
        @foreach ($data['koperasi-post'] as $key => $value)
          <li class="post">
  					<a href="{{url('post-detil/'.strtolower($value->nama_modul).'/'.$value->id)}}">
  						<div class="frame-image-kotak" style="background-image:url('{{asset('storage/'.$value->file)}}')"><img src=""></div>
  					</a>
  					<div class="post_content">
  						<h5>
  							<a href="{{url('post-detil/'.strtolower($value->nama_modul).'/'.$value->id)}}">{{$value->judul}}</a>
  						</h5>
              <ul class="post_details simple">
                <li class="category">{{tgl_indo($value->tanggal)}}</li>
                <li class="date">{{dateFormat($value->tanggal,'H:i:s')}}</li>
              </ul>
  					</div>
  				</li>
        @endforeach
			</ul>
		</div>

  </div>
</div>
@endsection
@section('js')

@endsection
