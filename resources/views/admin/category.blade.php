
@extends('admin.layout')
@section('link')
<!-- Layout config Js -->
<script src="{{ asset('admin_asset/js/layout.js') }}"></script>
<!-- Bootstrap Css -->
<link href="{{ asset('admin_asset/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="{{ asset('admin_asset/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="{{ asset('admin_asset/css/app.min.css') }}" rel="stylesheet" type="text/css" />
<!-- custom Css-->
<link href="{{ asset('admin_asset/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="main-content">
   <div class="page-content">
      <div class="container-fluid">
         <!-- start page title -->
         <div class="row">
            <div class="col-12">
               <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                  <h4 class="mb-sm-0">Add Category</h4>
                  <div class="page-title-right">
                     <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Category</li>
                     </ol>
                  </div>
               </div>
            </div>
         </div>
         <!-- end page title -->
         <div class="row">
            <div class="col-lg-12">
               <div class="card">
                  <div class="card-header align-items-center d-flex">
                     <h4 class="card-title mb-0 flex-grow-1">Add Category</h4>
                  </div>
                  <!-- end card header -->
                  <div class="card-body">
                     <div class="live-preview">
                        <form class="row g-3" method="POST" action={{ route('add_category') }}>
                            @csrf
                           <div class="col-md-4">
                              <label class="form-label">Category</label>
                              <input type="text" class="form-control" name="category" value="{{ old('category') }}">
                              @error('category')<div class="text-danger">{{ $message }}</div>@enderror
                           </div>
                           <div class="col-12">
                              <button class="btn btn-primary" type="submit">Submit form</button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
            <!-- end col -->
         </div>
         <!-- end row -->
         <!-- end main content-->
      </div>
   </div>
</div>
@endsection
<!-- JAVASCRIPT -->
@section('script')
<script src="{{ asset('admin_asset/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin_asset/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('admin_asset/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ asset('admin_asset/libs/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('admin_asset/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
<script src="{{ asset('admin_asset/js/plugins.js') }}"></script>
<!-- prismjs plugin -->
<script src="{{ asset('admin_asset/libs/prismjs/prism.js') }}"></script>
<script src="{{ asset('admin_asset/js/pages/form-validation.init.js') }}"></script>
<script src="{{ asset('admin_asset/js/app.js') }}"></script>
@endsection
</body>
<!-- Mirrored from themesbrand.com/velzon/html/default/forms-validation.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 30 Oct 2023 11:50:52 GMT -->
</html>

