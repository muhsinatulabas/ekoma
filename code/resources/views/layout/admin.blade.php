<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="{{asset('admin-page/assets/node_modules/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin-page/assets/node_modules/simple-line-icons/css/simple-line-icons.css')}}">
  <link rel="stylesheet" href="{{asset('admin-page/assets/node_modules/sweetalert/sweetalert2.min.css')}}" />
  <link rel="stylesheet" href="{{asset('admin-page/assets/node_modules/flag-icon-css/css/flag-icon.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin-page/assets/node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin-page/assets/node_modules/font-awesome/css/font-awesome.min.css')}}" />
  <link rel="stylesheet" href="{{asset('admin-page/assets/node_modules/jquery-bar-rating/dist/themes/fontawesome-stars.css')}}">
  <link rel="stylesheet" href="{{asset('admin-page/assets/node_modules/ti-icons/css/themify-icons.css')}} ">
  <link rel="stylesheet" href="{{asset('admin-page/assets/node_modules/icheck/skins/all.css')}}" />
  <link rel="stylesheet" href="{{asset('admin-page/assets/node_modules/select2/dist/css/select2.min.css')}}" />
  <link rel="stylesheet" href="{{asset('admin-page/assets/node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}" />
  <link rel="stylesheet" href="{{asset('admin-page/assets/node_modules/dropify/dist/css/dropify.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin-page/assets/node_modules/magnific-popup/magnific-popup.css')}}">
  <link rel="stylesheet" href="{{asset('admin-page/assets/css/style.css')}} ">
  <link rel="stylesheet" href="{{asset('admin-page/assets/css/custom.css')}} ">
  @yield('css')
</head>
<body class="sidebar-fixed">
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-brand-wrapper">
        <img src="{{asset('admin-page/assets/images/logo-ekonomi-maju.png')}}" style="width:100%" alt="logo"/>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown d-none d-lg-flex">
            <a class="nav-link nav-btn" href="#">
              <span class="btn">Administrator</span>
            </a>
          </li>
          <li class="nav-item dropdown d-none d-lg-flex">
            <a class="nav-link nav-btn" href="{{url('admin/logout')}}">
              <i class="icon-lock"></i>
            </a>
          </li>
        </ul>

      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="row row-offcanvas row-offcanvas-right">
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          {{-- <div style="padding-left:40px;padding-right:40px;width:100%;text-align:center">
            <img src="{{asset('admin-page/assets/images/logo-lpnu.png')}}" style="width:100%;;margin-bottom:20px;margin-top:20px">
          </div> --}}
          <ul class="nav">
            <li class="nav-item @if($page=='Dashboard') active @endif">
              <a class="nav-link" href="{{url('admin')}}">
                <i class="icon-screen-desktop menu-icon"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item @if($page=='Data Master') active @endif">
              <a class="nav-link" data-toggle="collapse" href="#data-master" aria-expanded="false" aria-controls="page-layouts">
                <i class="icon-folder menu-icon"></i>
                <span class="menu-title">Data Master</span>
              </a>
              <div class="collapse" id="data-master">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{url('admin/master/user')}}">User Admin</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{url('admin/master/kategori')}}">Kategori</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{url('admin/master/modul')}}">Modul</a></li>
                </ul>
              </div>
            </li>

            @foreach ($modul as $key => $value)
              <li class="nav-item @if($page==$value->nama_modul) active @endif">
                @if($value->url=='#')
                <a class="nav-link" data-toggle="collapse" href="#page-{{$value->id}}" aria-expanded="false" aria-controls="page-layouts">
                  <i class="{{$value->icon}} menu-icon"></i>
                  <span class="menu-title">{{$value->nama_modul}}</span>
                </a>
                <div class="collapse" id="page-{{$value->id}}">
                  <ul class="nav flex-column sub-menu">
                    @foreach ($value->submodul as $key2 => $value2)
                    <li class="nav-item"> <a class="nav-link" href="{{url('admin/'.$value2->url)}}">{{$value2->nama_modul}}</a></li>
                    @endforeach
                  </ul>
                </div>
                @else
                <a class="nav-link" href="{{url('admin/'.$value->url)}}">
                  <i class="{{$value->icon}} menu-icon"></i>
                  <span class="menu-title">{{$value->nama_modul}}</span>
                </a>
                @endif
              </li>
            @endforeach
          </ul>
        </nav>
        <div class="content-wrapper">
          @yield('content')
        </div>
        <footer class="footer">
          <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018 <a href="#">Ekonomi Maju</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Suuported by LPNU JAWA TIMUR</span>
          </div>
        </footer>

      </div>
    </div>
  </div>


  <script src="{{asset('admin-page/assets/node_modules/jquery/dist/jquery.min.js')}} "></script>
  <script src="{{asset('admin-page/assets/node_modules/popper.js/dist/umd/popper.min.js')}}"></script>
  <script src="{{asset('admin-page/assets/node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('admin-page/assets/node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js')}}"></script>
  <script src="{{asset('admin-page/assets/node_modules/jquery-bar-rating/dist/jquery.barrating.min.js')}}"></script>
  <script src="{{asset('admin-page/assets/node_modules/select2/dist/js/select2.min.js')}}"></script>
  <script src="{{asset('admin-page/assets/node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{asset('admin-page/assets/node_modules/icheck/icheck.min.js')}}"></script>
  <script src="{{asset('admin-page/assets/node_modules/dropify/dist/js/dropify.min.js')}}"></script>
  <script src="{{asset('admin-page/assets/node_modules/sweetalert/sweetalert.min.js')}}"></script>
  <script src="{{asset('admin-page/assets/node_modules/magnific-popup/jquery.magnific-popup.js')}}"></script>
  <script src="{{asset('admin-page/assets/node_modules/tinymce/tinymce.min.js')}}"></script>
  {{-- <script src="{{asset('admin-page/assets/js/off-canvas.js')}}"></script> --}}
  {{-- <script src="{{asset('admin-page/assets/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('admin-page/assets/js/misc.js')}}"></script>
  <script src="{{asset('admin-page/assets/js/settings.js')}}"></script>
  <script src="{{asset('admin-page/assets/js/todolist.js')}}"></script>
  <script src="{{asset('admin-page/assets/js/tooltips.js')}}"></script>
  <script src="{{asset('admin-page/assets/js/dashboard.js')}}"></script> --}}
  <script>
    $(function(){
      tinymce.init({
    		selector: '.tinymce',
    		height: 150,
    		menubar: false,
    		plugins: [
    			'advlist autolink lists link image charmap print preview anchor textcolor',
    			'searchreplace visualblocks code fullscreen',
    			'insertdatetime media table contextmenu paste code help'
    		],
    		toolbar: 'undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist ',
    	});
      $('.icheck-square input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square',
        increaseArea: '20%'
      });
      $('.select2').select2();
      $('.datepicker').datepicker({
        autoclose: true,
        showOtherMonths: true,
        selectOtherMonths: true,
        format: "dd-mm-yyyy",
      });
      $(".datepicker-month").datepicker({
        autoclose: true,
        format: "mm-yyyy",
        startView: "months",
        minViewMode: "months"
      });
      $('.dropify').dropify({
        messages: {
          'default': 'Drag and drop a file here or click',
          'replace': 'Drag and drop or click to replace',
          'remove':  'Remove',
          'error':   'Ooops, something wrong happended.'
        }
      });
      $('.parent-container').magnificPopup({
        delegate: '.gallery-list', // child items selector, by clicking on it popup will open
        gallery: {
          enabled: true
        },
        type: 'image'
      });
    });

    @if(\Illuminate\Support\Facades\Session::has('message'))
	    swal({
	      icon: '{{ \Illuminate\Support\Facades\Session::get('message_type') }}',
	      text: '{{ \Illuminate\Support\Facades\Session::get('message') }}',
	      button: false,
	      timer: 1500
	    });
    @endif

    // konfirmasi logout
    function confirmLogout(){
      swal({
        title: "Are you sure?",
        text: "Apakah anda yakin ingin keluar ini",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          $('#logout').submit();
        }else {

        }
      });
    }

    // Konfirmasi Hapus
    function confirmDelete(id){
     // event.stopPropagation();
     swal({
       title: "Are you sure?",
       text: "Apakah anda yakin ingin menghapus data ini",
       icon: "warning",
       buttons: true,
       dangerMode: true,
     })
     .then((willDelete) => {
        if (willDelete) {
          $('#hapus'+id).submit();
        } else {

        }
      });
    }
  </script>
  @yield('js')
</body>
</html>
