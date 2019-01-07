<!DOCTYPE html>
<html>
	<head>
		<title>Ekonomi Maju | LPNU JATIM</title>
		<!--meta-->
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.2" />
		<meta name="format-detection" content="telephone=no" />
		<meta name="keywords" content="Ekonomi, LPNU JATIM, Entrepreneur, Pesantren, Wirausaha" />
		<meta name="description" content="Portal Berita Ekonomi LPNU JATIM" />
		<!--style-->
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,700' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="{{asset('website/assets/style/reset.css')}}">
		{{-- <link rel="stylesheet" type="text/css" href="{{asset('website/assets/bootstrap/css/bootstrap.css')}}"> --}}
		<link rel="stylesheet" type="text/css" href="{{asset('website/assets/style/superfish.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('website/assets/style/prettyPhoto.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('website/assets/style/jquery.qtip.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('website/assets/style/style.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('website/assets/style/menu_styles.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('website/assets/style/animations.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('website/assets/style/responsive.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('website/assets/style/odometer-theme-default.css')}}">
		{{-- <link rel="shortcut icon" href="images/favicon.ico"> --}}
    <style>
    {{--MENU STYLE--}}
    .header_container {
      background: url("{{asset('website/assets/images/pattern.png')}}");
      background-color: #fff;
      padding-bottom: 0px;
    }
    .menu_container .sf-menu li ul li a:hover,
    .menu_container .sf-menu li ul li.selected a,
    .menu_container .sf-menu li.submenu ul li a:hover,
    .menu_container .sf-menu li.submenu:hover ul li.selected a,
    .menu_container .sf-menu li.submenu:hover ul li.selected ul li a:hover,
    .menu_container .sf-menu li.submenu:hover ul li ul li.selected a,
    .menu_container .sf-menu li.submenu:hover ul li.selected ul li.selected a,
    .menu_container .sf-menu li:hover ul li.sfHover>a {
      background-color: #347630;
      color: #FFF;
    }
    .menu_container .sf-menu li:hover ul a,
    .menu_container .sf-menu li.submenu:hover ul a,
    .menu_container .sf-menu li ul li a,
    .menu_container .sf-menu li.submenu:hover ul li.selected ul li a {
      border: none;
      color: #ffffff;
      background-color: #245710;
    }
    .menu_container {
      border-top: 3px solid #347630;
      border-bottom: 1px solid #347630;
      background: #01762f;
    }
    .sf-menu li.submenu a {
      background-color: transparent;
    }
    .sf-menu li:hover, .sf-menu li.selected, .sf-menu li.submenu:hover {
      background-color: #055600;
      border-top-color: #245710;
      border-bottom-color: #245710;
    }
    .sf-menu li, .sf-menu li:hover, .sf-menu li.sfHover, .sf-menu a:focus, .sf-menu a:hover, .sf-menu a:active {
      background: none #347630;
    }
    .sf-menu li {
      height: 42px;
      border: none;
      border-top: 3px solid #347630;
      border-bottom: 1px solid #347630;
      padding-right: 15px;
    }
    .sf-menu li a, .sf-menu li a:visited {
      color: #ffffff;
    }
    .sf-menu li:hover, .sf-menu li.sfHover, .sf-menu a:focus, .sf-menu a:hover, .sf-menu a:active {
      background: none #245710;
    }

    {{--BLOG STYLE--}}
    .post .with_number a {
      float: left;
      width: 280px;
    }
    .frame-image-blog{
      background-color:#347630;
      width: 100%;
      padding-top: 65%; /* 1:1 Aspect Ratio */
      position: relative; /* If you want text inside of it */
      background-position: 50% 50%;
      background-repeat:no-repeat;
      background-size:cover;
    }
    .box_header {
      background: #F0F0F0;
      border-left: 3px solid #347630;
      padding: 8px 15px 11px;
    }
    .blog ul.post_details.simple li.category, .blog ul.post_details.simple li.category a {
      color: #347630;
    }
    .read_more .arrow {
      background: #347630 url({{asset('website/assets/images/icons/navigation/call_to_action_arrow.png')}}) no-repeat;
    }
    .post_details li.category {
      font-weight: bold;
      background: #347630;
      padding: 14px 15px 13px 14px;
    }

    {{---SLIDER--}}
    .frame-image-slide {
      background-color:#347630;
      width: 100%;
      padding-top: 60%; /* 1:1 Aspect Ratio */
      position: relative; /* If you want text inside of it */
      background-position: 50% 50%;
      background-repeat:no-repeat;
      background-size:cover;
    }
    .frame-image-kotak {
      background-color:#347630;
      width: 100px;
      height: 100px; /* 1:1 Aspect Ratio */
      position: relative; /* If you want text inside of it */
      background-position: 50% 50%;
      background-repeat:no-repeat;
      background-size:cover;
      float: left;
    }
    .slider_navigation .slider_control a:hover, a.slider_control:hover{
    	background-color: #347630;
    }
    .slider_posts_list .slider_posts_list_bar{
      background-color:#347630
    }
    .slider_content_box h2 a{
      font-size:25px
    }
    .slider_content_box h2 a:hover{
      text-decoration: none;
    }

    .author-quote{
      color:#000;
      margin-top:0px
    }
    .avatar-quote{
      background:#c6c6c6;
      width: 80px;
      height: 80px; /* 1:1 Aspect Ratio */
      position: relative; /* If you want text inside of it */
      background-position: 50% 50%;
      background-repeat:no-repeat;
      background-size:cover;
      float: left;
      margin-right: 10px
    }
    .advertising{
      height:150px;
      width: 100%;
      background: #a7a7a7;
      margin-top:50px;
    }
		.page_layout p{
			font-size: 16px
		}
		.pagination li a:hover, .pagination li.selected a {
	    color: #FFF;
	    background-color: #347630;
		}
		.tabs_navigation li a:hover, .tabs_navigation li a.selected, .tabs_navigation li.ui-tabs-active a {
	    background: #347630;
	    color: #FFF;
		}
		.tabs_navigation li.ui-tabs-active span {
	    display: inline;
	    position: relative;
	    border-style: solid;
	    border-width: 9px 9px 0;
	    border-color: #347630 transparent;
	    bottom: -9px;
		}
		.page_layout{
			min-height: 300px
		}
    </style>
    @yield('css')
	</head>
	<body class="">
		<div class="site_container">
			<div class="header_top_bar_container clearfix">
				<div class="header_top_bar">
					<form class="search">
						<input type="text" autocomplete="off" placeholder="Search..." value="Search..." class="search_input hint">
						<input type="submit" class="search_submit" value="">
						<input type="hidden" name="page" value="search">
					</form>
					<ul class="social_icons clearfix dark">
						<li><a target="_blank" href="" class="social_icon facebook" title="facebook">&nbsp;</a></li>
					</ul>
					{{-- <div class="latest_news_scrolling_list_container">
						<ul>
							<li class="category">BERITA TERKINI</li>
							<li class="left"><a href="index-page=home_7.html#"></a></li>
							<li class="right"><a href="index-page=home_7.html#"></a></li>
							<li class="posts">
								<ul class="latest_news_scrolling_list">
									<li><a href="index-page=post.html" title="">Climate Change Debate While Britain Floods</a></li>
									<li><a href="index-page=post.html" title="">The Public Health Crisis Hiding in Our Food</a></li>
									<li><a href="index-page=post.html" title="">Nuclear Fusion Closer to Becoming a Reality</a></li>
								</ul>
							</li>
							<li class="date">
								<abbr title="04 Apr 2014" class="timeago current">04 Apr 2014</abbr>
								<abbr title="04 May 2014" class="timeago">04 May 2014</abbr>
								<abbr title="04 June 2014" class="timeago">04 June 2014</abbr>
							</li>
						</ul>
					</div> --}}
				</div>
			</div>
			<div class="header_container">
				<div class="header clearfix">
					<div class="logo">
						<a href="{{url('')}}">
              <img src="{{asset('website/assets/images/logo-ekonomi-maju.png')}}" style="height:150px">
            </a>
					</div>
				</div>
			</div>
			<div class="menu_container sticky clearfix">
				<nav>
          <ul class="sf-menu">
            <li class="@if($menu=='dashboard') selected @endif"><a href="{{url('')}}">Home</a></li>
            <li class="submenu @if($menu=='tentang-kami') selected @endif">
              <a href="#" title="Pages">Tentang Kami</a>
              <ul>
                <li><a href="{{url('about/selayang-pandang')}}">Selayang Pandang</a></li>
                <li><a href="{{url('about/visi-misi')}}">Visi dan Misi</a></li>
                <li><a href="{{url('about/pengurus')}}">Susunan Pengurus</a></li>
                <li><a href="{{url('about/program')}}">Program Kerja</a></li>
								<li><a href="{{url('pc-lpnu')}}">PC LPNU</a></li>
                <li><a href="{{url('about/gallery')}}">Gallery</a></li>
              </ul>
            </li>
						<li class="@if($menu=='pengusaha') selected @endif"><a href="{{url('pengusaha/list')}}">Pengusaha NU</a></li>
            <li class="@if($menu=='berita') selected @endif"><a href="{{url('post/berita/list')}}">Berita</a></li>
            <li class="@if($menu=='agenda') selected @endif"><a href="{{url('post/agenda/list')}}">Agenda</a></li>
            <li class="@if($menu=='artikel') selected @endif"><a href="{{url('post/artikel/list')}}">Artikel</a></li>
            <li class="@if($menu=='video') selected @endif"><a href="{{url('post/video/list')}}">Video</a></li>
            <li class="@if($menu=='infografis') selected @endif"><a href="{{url('post/infografis/list')}}">Infografis</a></li>
            {{-- <li class="@if($menu=='kontak') selected @endif"><a href="{{url('kontak')}}">Kontak Kami</a></li> --}}
          </ul>
        </nav>
        <div class="mobile_menu_container">
        	<a href="index-page=home_7.html#" class="mobile-menu-switch">
        		<span class="line"></span>
        		<span class="line"></span>
        		<span class="line"></span>
        	</a>
	        <div class="mobile-menu-divider"></div>
          <nav>
            <ul class="mobile-menu">
              <li class="submenu selected">
                <a href="index-page=home.html" title="Home">Home</a>
              </li>
              <li class="submenu">
                <a href="index-page=about.html" title="Pages">Pages</a>
                <ul>
                  <li><a href="index-page=about.html" title="About Style 1">About Style 1</a></li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <div class="page">
        <div class="page_layout clearfix">
          @yield('content')
        </div>
      </div>
      <div class="footer_container">
				<div class="footer clearfix">
					<div class="row page_margin_top_section">
						<div class="column column_3_4">
							<ul class="footer_menu">
                <li><h4><a href="{{url('')}}" >Ekonomi Pesantren</a></h4></li>
								<li><h4><a href="{{url('')}}" >Startup</a></h4></li>
                <li><h4><a href="{{url('')}}" >Investasi</a></h4></li>
                <li><h4><a href="{{url('')}}" >Ekspor Impor</a></h4></li>
                <li><h4><a href="{{url('')}}" >Koperasi</a></h4></li>
							</ul>
						</div>
						<div class="column column_1_4">
							<a class="scroll_top" href="#top" title="Scroll to top">Top</a>
						</div>
					</div>
					<div class="row copyright_row">
						<div class="column column_2_3">
							© Copyright LPNU JATIM
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="background_overlay"></div>
		<!--js-->
		<script type="text/javascript" src="{{asset('website/assets/js/jquery-1.12.4.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('website/assets/js/jquery-migrate-1.4.1.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('website/assets/bootstrap/js/bootstrap.js')}}"></script>
		<script type="text/javascript" src="{{asset('website/assets/js/jquery.ba-bbq.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('website/assets/js/jquery-ui-1.11.1.custom.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('website/assets/js/jquery.easing.1.3.js')}}"></script>
		<script type="text/javascript" src="{{asset('website/assets/js/jquery.carouFredSel-6.2.1-packed.js')}}"></script>
		<script type="text/javascript" src="{{asset('website/assets/js/jquery.touchSwipe.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('website/assets/js/jquery.transit.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('website/assets/js/jquery.sliderControl.js')}}"></script>
		<script type="text/javascript" src="{{asset('website/assets/js/jquery.timeago.js')}}"></script>
		<script type="text/javascript" src="{{asset('website/assets/js/jquery.hint.js')}}"></script>
		<script type="text/javascript" src="{{asset('website/assets/js/jquery.prettyPhoto.js')}}"></script>
		<script type="text/javascript" src="{{asset('website/assets/js/jquery.qtip.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('website/assets/js/jquery.blockUI.js')}}"></script>
		<script type="text/javascript" src="{{asset('website/assets/js/main.js')}}"></script>
		<script type="text/javascript" src="{{asset('website/assets/js/odometer.min.js')}}"></script>
    @yield('js')
	</body>
</html>
