<!doctype html>
<html class="no-js" lang="zxx">
   <head>
      <meta charset="utf-8" />
      <title>Sithas Food Admin Login</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
      <meta content="Themesbrand" name="author" />
      <link rel="shortcut icon" href="{{asset('user_asset/images/vegetable/veg-logo.png')}}">
      <link rel="stylesheet" href="{{ asset('admin_asset/libs/nouislider/nouislider.min.css') }}">
      <link rel="stylesheet" href="{{ asset('admin_asset/libs/gridjs/theme/mermaid.min.css') }}">
      <link href="{{ asset('admin_asset/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet" type="text/css" />
      <!--Swiper slider css-->
      <link href="{{ asset('admin_asset/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css" />
      <!-- Layout config Js -->
      <script src="{{ asset('admin_asset/js/layout.js') }}"></script>
      <!-- Bootstrap Css -->
      <link href="{{ asset('admin_asset/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
      <!-- Icons Css -->
      <link href="{{ asset('admin_asset/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
      <!-- App Css-->
      <link href="{{ asset('admin_asset/css/app.min.css') }}" rel="stylesheet" type="text/css" />
      <link href="{{ asset('admin_asset/css/fullcalender.min.css') }}" rel="stylesheet" type="text/css" />
      <!-- custom Css-->
      <link href="{{ asset('admin_asset/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
      <link rel="shortcut icon" href="{{ asset('user_asset/images/favicon.png')}}">
      <link rel="stylesheet" href="{{ asset('admin_asset/libs/dropzone/dropzone.css') }}" type="text/css" />
      <link href="{{ asset('admin_asset/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
      <link href="{{ asset('admin_asset/libs/dropzone/dropzone.css') }}" rel="stylesheet" type="text/css" />
   </head>
   <style>
      .error{
         color:red;
      }
   </style>

   <body>
      <div class="auth-page-content">
      <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <div class="text-center mt-sm-5 mb-4 text-white-50">
               <div>
             
               </div>
            </div>
         </div>
      </div>

      <div class="row justify-content-center"   >
         <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card">
               <div class="card-body p-4" id="admin_login" >
               <div class="text-center">
                  <a href="{{ asset('adminlogin') }}" class="d-inline-block auth-logo">
                  <img src="{{ asset('user_asset/images/favicon.png')}}" alt="" height="50px">
                  </a>
               </div>
                  <div class="text-center mt-2">
                     <h5 class="text-primary">Admin Sign in</h5>
                  </div>
                  <div class="p-2 mt-4">
                  <form method="POST" action="{{ route('signin_panel') }}">
                  @csrf
                        <div class="mb-3">
                           <label for="username" class="form-label">Username</label>
                           <input type="text" class="form-control"  name="username" placeholder="Enter username" value="admin">
                           @error('username')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-3">
                           <label class="form-label" for="password-input">Password</label>
                           <div class="position-relative auth-pass-inputgroup mb-3">
                              <input type="password" class="form-control pe-5 password-input" placeholder="Enter password" id="password-input" name="password" value="12345">
                              <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                              @error('password')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="mt-4">
                           <button class="btn btn-success w-100" type="submit" >Sign In</button>
                        </div>
                        @if(session('error'))
                        <div class="error_response ml-3 p-3" style="color:red;font-size: 16px;"> {{ session('error') }}</div>
                        @endif

                  </div>
                  </form>


               </div>
            </div>
         </div>
         <!-- end -->
      </div>
      <footer class="footer">
         <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <div class="text-center">
                     <p class="mb-0 text-muted">
                        &copy;
                        <script>document.write(new Date().getFullYear())</script>Sithas Foods Developed by : Relaxplzz Technologies
                     </p>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <script src="{{ asset('admin_asset/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('admin_asset/libs/simplebar/simplebar.min.js') }}"></script>
      <script src="{{ asset('admin_asset/libs/node-waves/waves.min.js') }}"></script>
      <script src="{{ asset('admin_asset/libs/feather-icons/feather.min.js') }}"></script>
      <script src="{{ asset('admin_asset/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
      <script src="{{ asset('admin_asset/js/plugins.js') }}"></script>
      <script src="{{ asset('admin_asset/libs/particles.js/particles.js') }}"></script>
      <script src="{{ asset('admin_asset/js/pages/particles.app.js') }}"></script>
      <script src="{{ asset('admin_asset/js/pages/password-addon.init.js') }}"></script>
      <script src="{{ asset('admin_asset/js/jquery.min.js') }}"></script>


   </body>
</html>

