<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin Page | Ekonomi Maju</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('admin-page/assets/node_modules/mdi/css/materialdesignicons.min.css')}} ">
  <link rel="stylesheet" href="{{asset('admin-page/assets/node_modules/simple-line-icons/css/simple-line-icons.css')}} ">
  <link rel="stylesheet" href="{{asset('admin-page/assets/node_modules/flag-icon-css/css/flag-icon.min.css')}} ">
  <link rel="stylesheet" href="{{asset('admin-page/assets/node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css')}} ">

  <link rel="stylesheet" href="{{asset('admin-page/assets/node_modules/font-awesome/css/font-awesome.min.css')}} " />
  <link rel="stylesheet" href="{{asset('admin-page/assets/node_modules/jquery-bar-rating/dist/themes/fontawesome-stars.css')}} ">

  <link rel="stylesheet" href="{{asset('admin-page/assets/css/style.css')}} ">
  <style>
  .content-wrapper {
    background: #027963;
  }
  </style>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper" >
      <div class="row">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center">
          <div class="row w-100">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-dark text-left p-5" style="color:#fff">
                <img src="{{asset('admin-page/assets/images/logo-ekonomi-maju.png')}}" style="width:100%">
                <form class="pt-5" action="{{url('admin/login/proses')}}" method="post">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <label >Username</label>
                    <input type="text" class="form-control" name="username">
                  </div>
                  <div class="form-group">
                    <label >Password</label>
                    <input type="password" class="form-control" name="password">
                  </div>
                  <button class="btn btn-success btn-block">LOGIN</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- row ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>

  <script src="{{asset('admin-page/assets/node_modules/jquery/dist/jquery.min.js')}} "></script>
  <script src="{{asset('admin-page/assets/node_modules/popper.js/dist/umd/popper.min.js')}} "></script>
  <script src="{{asset('admin-page/assets/node_modules/bootstrap/dist/js/bootstrap.min.js')}} "></script>
  <script src="{{asset('admin-page/assets/node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js')}} "></script>

  <script src="{{asset('admin-page/assets/js/off-canvas.js')}} "></script>
  <script src="{{asset('admin-page/assets/js/hoverable-collapse.js')}} "></script>
  <script src="{{asset('admin-page/assets/js/misc.js')}} "></script>
  <script src="{{asset('admin-page/assets/js/settings.js')}} "></script>
  <script src="{{asset('admin-page/assets/js/todolist.js')}} "></script>

</body>

</html>
