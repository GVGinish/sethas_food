@extends('admin.layout')

@section('link')
  
      <link href="{{ asset('admin_asset/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet" type="text/css" />
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
                           <h4 class="mb-sm-0">Welcome</h4>
                           <div class="page-title-right">
                              <ol class="breadcrumb m-0">
                                 <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                 <li class="breadcrumb-item active">Analytics</li>
                              </ol>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- end page title -->
                  <div class="row">
                     <div class="col-xxl-5">
                        <div class="d-flex flex-column h-100">
                        
                           <!-- end row-->
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="card card-animate">
                                    <div class="card-body">
                                       <a href="{{route('product_list')}}">
                                       <div class="d-flex justify-content-between">
                                          <div>
                                             <p class="fw-medium text-muted mb-0">Product List</p>
                                             <h2 class="mt-4 ff-secondary fw-semibold">No. <span class="counter-value" data-target="{{App\Models\ProductModel::count()}}">0</span></h2>
                                             <p class="mb-0 text-muted"><span class="badge bg-light text-success mb-0"> <i class="ri-arrow-up-line align-middle"></i> 16.24 % </span> vs. previous month</p>
                                          </div>
                                          <div>
                                             <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-info-subtle rounded-circle fs-2">
                                                <i data-feather="users" class="text-info"></i>
                                                </span>
                                             </div>
                                          </div>
                                       </div>
                                       </a>
                                    </div>
                                    <!-- end card body -->
                                 </div>
                                 <!-- end card-->
                              </div>
                              <!-- end col-->
                              <div class="col-md-6">
                                 <div class="card card-animate">
                                    <div class="card-body">
                                     <a href="{{route('order_list')}}">
                                       <div class="d-flex justify-content-between">
                                          <div>
                                             <p class="fw-medium text-muted mb-0">Order List</p>
                                             <h2 class="mt-4 ff-secondary fw-semibold">No. <span class="counter-value" data-target="{{App\Models\OrderPlacedModel::where('status','Order Placed')->count()}}">0</span></h2>
                                             <p class="mb-0 text-muted"><span class="badge bg-light text-danger mb-0"> <i class="ri-arrow-down-line align-middle"></i> 3.96 % </span> vs. previous month</p>
                                          </div>
                                          <div>
                                             <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-info-subtle rounded-circle fs-2">
                                                <i data-feather="activity" class="text-info"></i>
                                                </span>
                                             </div>
                                          </div>
                                       </div>
                                     </a>
                                    </div>
                                    <!-- end card body -->
                                 </div>
                                 <!-- end card-->
                              </div>
                              <!-- end col-->
                           </div>
                           <!-- end row-->
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="card card-animate">
                                 <a href="{{route('shipped_list')}}">
                                    <div class="card-body">
                                       <div class="d-flex justify-content-between">
                                          <div>
                                             <p class="fw-medium text-muted mb-0">Shipped List</p>
                                             <h2 class="mt-4 ff-secondary fw-semibold">No. <span class="counter-value" data-target="{{App\Models\OrderPlacedModel::where('status','Delivered')->count()}}">0</span></h2>
                                               
                                             </h2>
                                             <p class="mb-0 text-muted"><span class="badge bg-light text-danger mb-0"> <i class="ri-arrow-down-line align-middle"></i> 0.24 % </span> vs. previous month</p>
                                          </div>
                                          <div>
                                             <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-info-subtle rounded-circle fs-2">
                                                <i data-feather="clock" class="text-info"></i>
                                                </span>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    </a>
                                    <!-- end card body -->
                                 </div>
                                 <!-- end card-->
                              </div>
                              <!-- end col-->
                              <div class="col-md-6">
                                 <div class="card card-animate">
                                 <a href="{{route('cancelled_list')}}">
                                    <div class="card-body">
                                       <div class="d-flex justify-content-between">
                                          <div>
                                             <p class="fw-medium text-muted mb-0">Cancelled List</p>
                                             <h2 class="mt-4 ff-secondary fw-semibold">No. <span class="counter-value" data-target="{{App\Models\OrderPlacedModel::where('status','Cancelled')->count()}}">0</span></h2>
                                             <p class="mb-0 text-muted"><span class="badge bg-light text-success mb-0"> <i class="ri-arrow-up-line align-middle"></i> 7.05 % </span> vs. previous month</p>
                                          </div>
                                          <div>
                                             <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-info-subtle rounded-circle fs-2">
                                                <i data-feather="external-link" class="text-info"></i>
                                                </span>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    </a>
                                    <!-- end card body -->
                                 </div>
                                 <!-- end card-->
                              </div>
                              <!-- end col-->
                           </div>
                           <!-- end row-->
                        </div>
                     </div>
              
                  </div>
        
               
               </div>
               <!-- container-fluid -->
            </div>
       
         </div>
      @endsection
  
@section('script')
      <!-- JAVASCRIPT -->
      <script src="{{ asset('admin_asset/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('admin_asset/libs/simplebar/simplebar.min.js') }}"></script>
      <script src="{{ asset('admin_asset/libs/node-waves/waves.min.js') }}"></script>
      <script src="{{ asset('admin_asset/libs/feather-icons/feather.min.js') }}"></script>
      <script src="{{ asset('admin_asset/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
      <script src="{{ asset('admin_asset/js/plugins.js') }}"></script>
      <!-- apexcharts -->
      <!-- <script src="{{ asset('admin_asset/libs/apexcharts/apexcharts.min.js') }}"></script> -->
      <!-- Vector map-->
      <!-- <script src="{{ asset('admin_asset/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
      <script src="{{ asset('admin_asset/libs/jsvectormap/maps/world-merc.js') }}"></script> -->
      <!-- Dashboard init -->
      <!-- <script src="{{ asset('admin_asset/js/pages/dashboard-analytics.init.js') }}"></script> -->
      <!-- App js -->
      <script src="{{ asset('admin_asset/js/app.js') }}"></script>
@endsection