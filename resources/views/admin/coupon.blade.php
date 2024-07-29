



@extends('admin.layout')

@section('link')
<link rel="shortcut icon" href="{{ asset('admin_asset/images/favicon.ico') }}">
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
    <!-- dropzone css -->

@endsection
<style>
    .img-thumbnail {
        max-width: 150px;
        max-height: 150px;
    }
    .image-preview-item {
        position: relative;
        display: inline-block;
        margin-right: 10px;
        margin-bottom: 10px;
    }
    .image-preview-item img {
        max-width: 100px;
        max-height: 100px;
        border: 1px solid #ccc;
        padding: 3px;
    }
    .image-preview-item .cancel-btn {
        position: absolute;
        top: -8px;
        right: -8px;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 50%;
        padding: 5px;
        cursor: pointer;
    }
</style>
@section('content')
<div class="main-content">
   <div class="page-content">
      <div class="container-fluid">
         <!-- start page title -->
         <div class="row">
            <div class="col-12">
               <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                  <h4 class="mb-sm-0">Add Coupon</h4>
                  <div class="page-title-right">
                     <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Add Coupon</li>
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
                     <h4 class="card-title mb-0 flex-grow-1">Add Coupon</h4>
                  </div>
                  <!-- end card header -->
                  <div class="card-body">
                     <div class="live-preview">
                        <form class="row g-3" method="POST" action="{{ route('add_coupon') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6">
                                <label class="form-label">Coupon Code</label>
                                <input type="text" class="form-control" name="coupon_code" placeholder="Enter coupon code e.g(ABD100)" value="{{ old('coupon_code') }}">
                                @error('coupon_code')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Amount</label>
                                <input type="text" class="form-control" name="coupon_amount"  placeholder="Enter amount" value="{{ old('coupon_amount') }}">
                                @error('coupon_amount')<span class="text-danger">{{ $message }}</span>@enderror
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

