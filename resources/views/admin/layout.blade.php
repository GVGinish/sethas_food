<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">
   <head>
      <meta charset="utf-8" />
      <title>Sithas Food</title>
      <link rel="shortcut icon" href="{{asset('user_asset/images/vegetable/veg-logo.png')}}">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
      <meta content="Themesbrand" name="author" />
      <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
      <meta http-equiv="Pragma" content="no-cache">
      <meta http-equiv="Expires" content="0">
      @yield('link')
   </head>
   <style>
    .alert{
    right: 22px !important;
    top: 16px !important;
    z-index: 109988 !important;
    position: absolute !important;
    }
    @media screen and (max-width:767px){
    .dataTables_wrapper .col-sm-12.col-md-6 {
    margin-bottom: 10px !important;
    }
    div.dataTables_info {
    margin-bottom: 6px !important;
    }
    }
    @media screen and (min-width:768px){
    div.dataTables_paginate {
    margin-top: 10px !important;
    }
    }
 </style>
   <body>
    @if(session('success'))
    <div id="successMessage" class="alert alert-success mt-2">
       {{ session('success') }}
    </div>
    @endif
    @if(session('error'))
    <div id="errorMessage" class="alert alert-danger mt-2">
       {{ session('error') }}
    </div>
    @endif

 
      <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  Are you sure want to logout ?
               </div>
               <div class="modal-footer">
                  <form  action="{{ route('logout') }}" method="POST">
                     @csrf
                     <button type="submit" class="btn btn-primary">Yes</button>
                  </form>
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
               </div>
            </div>
         </div>
      </div>
      <!-- Begin page -->
      <div id="layout-wrapper">
         <header id="page-topbar">
            <div class="layout-width">
               <div class="navbar-header">
                  <div class="d-flex">
                     <!-- LOGO -->
                     <div class="navbar-brand-box horizontal-logo">
                        <a href="{{route('dashboard')}}" class="logo logo-dark">
                        <span class="logo-sm">
                        <img src="{{asset('user_asset/images/vegetable/veg-logo.png')}}" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                        <img src="{{asset('user_asset/images/vegetable/veg-logo.png')}}" alt="" height="100">
                        </span>
                        </a>
                        <a href="{{route('dashboard')}}" class="logo logo-light">
                        <span class="logo-sm">
                        <img src="{{asset('user_asset/images/vegetable/veg-logo.png')}}" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                        <img src="{{asset('user_asset/images/vegetable/veg-logo.png')}}" alt="" height="100">
                        </span>
                        </a>
                     </div>
                     <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger" id="topnav-hamburger-icon">
                     <span class="hamburger-icon">
                     <span></span>
                     <span></span>
                     <span></span>
                     </span>
                     </button>
                  </div>
                  <div class="d-flex align-items-center">
                  <div class="Website" style="margin-right:5px;">
                     <a class="dropdown-item"  href="{{ route('index') }}">
                     <span class="badge rounded-pill bg-success p-2"><i class="bx bx-undo"></i> Website</span>
                     </a>
                  </div>
                  <div class="logout">
                     <a class="dropdown-item"  href="" data-bs-toggle="modal"  data-bs-target="#exampleModal1">
                     <span class="badge rounded-pill bg-danger p-2"><i class="bx bx-power-off me-2"></i> Log Out</span>
                     </a>
                  </div>

                  
                   
                     <div class="ms-1 header-item d-none d-sm-flex">
                        <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" data-toggle="fullscreen">
                        <i class='bx bx-fullscreen fs-22'></i>
                        </button>
                     </div>
                     <div class="ms-1 header-item d-none d-sm-flex">
                        <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode">
                        <i class='bx bx-moon fs-22'></i>
                        </button>
                     </div>
                     <!-- <div class="dropdown topbar-head-dropdown ms-1 header-item" id="notificationDropdown">
                        <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                        <i class='bx bx-bell fs-22'></i>
                        <span class="position-absolute topbar-badge fs-10 translate-middle badge rounded-pill bg-danger">3<span class="visually-hidden">unread messages</span></span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">
                           <div class="dropdown-head bg-primary bg-pattern rounded-top">
                              <div class="p-3">
                                 <div class="row align-items-center">
                                    <div class="col">
                                       <h6 class="m-0 fs-16 fw-semibold text-white"> Notifications </h6>
                                    </div>
                                    <div class="col-auto dropdown-tabs">
                                       <span class="badge bg-light-subtle text-body fs-13"> 4 New</span>
                                    </div>
                                 </div>
                              </div>
                              <div class="px-2 pt-2">
                                 <ul class="nav nav-tabs dropdown-tabs nav-tabs-custom" data-dropdown-tabs="true" id="notificationItemsTab" role="tablist">
                                    <li class="nav-item waves-effect waves-light">
                                       <a class="nav-link active" data-bs-toggle="tab" href="#all-noti-tab" role="tab" aria-selected="true">
                                       All (4)
                                       </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                       <a class="nav-link" data-bs-toggle="tab" href="#messages-tab" role="tab" aria-selected="false">
                                       Messages
                                       </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                       <a class="nav-link" data-bs-toggle="tab" href="#alerts-tab" role="tab" aria-selected="false">
                                       Alerts
                                       </a>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                           <div class="tab-content position-relative" id="notificationItemsTabContent">
                              <div class="tab-pane fade show active py-2 ps-2" id="all-noti-tab" role="tabpanel">
                                 <div data-simplebar style="max-height: 300px;" class="pe-2">
                                    <div class="text-reset notification-item d-block dropdown-item position-relative">
                                       <div class="d-flex">
                                          <div class="avatar-xs me-3 flex-shrink-0">
                                             <span class="avatar-title bg-info-subtle text-info rounded-circle fs-16">
                                             <i class="bx bx-badge-check"></i>
                                             </span>
                                          </div>
                                          <div class="flex-grow-1">
                                             <a href="#!" class="stretched-link">
                                                <h6 class="mt-0 mb-2 lh-base">Your <b>Elite</b> author Graphic
                                                   Optimization <span class="text-secondary">reward</span> is
                                                   ready!
                                                </h6>
                                             </a>
                                             <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                <span><i class="mdi mdi-clock-outline"></i> Just 30 sec ago</span>
                                             </p>
                                          </div>
                                          <div class="px-2 fs-15">
                                             <div class="form-check notification-check">
                                                <input class="form-check-input" type="checkbox" value="" id="all-notification-check01">
                                                <label class="form-check-label" for="all-notification-check01"></label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="text-reset notification-item d-block dropdown-item position-relative">
                                       <div class="d-flex">
                                          <img src="assets/images/users/avatar-2.jpg" class="me-3 rounded-circle avatar-xs flex-shrink-0" alt="user-pic">
                                          <div class="flex-grow-1">
                                             <a href="#!" class="stretched-link">
                                                <h6 class="mt-0 mb-1 fs-13 fw-semibold">Angela Bernier</h6>
                                             </a>
                                             <div class="fs-13 text-muted">
                                                <p class="mb-1">Answered to your comment on the cash flow forecast's
                                                   graph 🔔.
                                                </p>
                                             </div>
                                             <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                <span><i class="mdi mdi-clock-outline"></i> 48 min ago</span>
                                             </p>
                                          </div>
                                          <div class="px-2 fs-15">
                                             <div class="form-check notification-check">
                                                <input class="form-check-input" type="checkbox" value="" id="all-notification-check02">
                                                <label class="form-check-label" for="all-notification-check02"></label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="text-reset notification-item d-block dropdown-item position-relative">
                                       <div class="d-flex">
                                          <div class="avatar-xs me-3 flex-shrink-0">
                                             <span class="avatar-title bg-danger-subtle text-danger rounded-circle fs-16">
                                             <i class='bx bx-message-square-dots'></i>
                                             </span>
                                          </div>
                                          <div class="flex-grow-1">
                                             <a href="#!" class="stretched-link">
                                                <h6 class="mt-0 mb-2 fs-13 lh-base">You have received <b class="text-success">20</b> new messages in the conversation
                                                </h6>
                                             </a>
                                             <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                <span><i class="mdi mdi-clock-outline"></i> 2 hrs ago</span>
                                             </p>
                                          </div>
                                          <div class="px-2 fs-15">
                                             <div class="form-check notification-check">
                                                <input class="form-check-input" type="checkbox" value="" id="all-notification-check03">
                                                <label class="form-check-label" for="all-notification-check03"></label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="text-reset notification-item d-block dropdown-item position-relative">
                                       <div class="d-flex">
                                          <img src="assets/images/users/avatar-8.jpg" class="me-3 rounded-circle avatar-xs flex-shrink-0" alt="user-pic">
                                          <div class="flex-grow-1">
                                             <a href="#!" class="stretched-link">
                                                <h6 class="mt-0 mb-1 fs-13 fw-semibold">Maureen Gibson</h6>
                                             </a>
                                             <div class="fs-13 text-muted">
                                                <p class="mb-1">We talked about a project on linkedin.</p>
                                             </div>
                                             <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                <span><i class="mdi mdi-clock-outline"></i> 4 hrs ago</span>
                                             </p>
                                          </div>
                                          <div class="px-2 fs-15">
                                             <div class="form-check notification-check">
                                                <input class="form-check-input" type="checkbox" value="" id="all-notification-check04">
                                                <label class="form-check-label" for="all-notification-check04"></label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="my-3 text-center view-all">
                                       <button type="button" class="btn btn-soft-success waves-effect waves-light">View
                                       All Notifications <i class="ri-arrow-right-line align-middle"></i></button>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-pane fade py-2 ps-2" id="messages-tab" role="tabpanel" aria-labelledby="messages-tab">
                                 <div data-simplebar style="max-height: 300px;" class="pe-2">
                                    <div class="text-reset notification-item d-block dropdown-item">
                                       <div class="d-flex">
                                          <img src="assets/images/users/avatar-3.jpg" class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                          <div class="flex-grow-1">
                                             <a href="#!" class="stretched-link">
                                                <h6 class="mt-0 mb-1 fs-13 fw-semibold">James Lemire</h6>
                                             </a>
                                             <div class="fs-13 text-muted">
                                                <p class="mb-1">We talked about a project on linkedin.</p>
                                             </div>
                                             <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                <span><i class="mdi mdi-clock-outline"></i> 30 min ago</span>
                                             </p>
                                          </div>
                                          <div class="px-2 fs-15">
                                             <div class="form-check notification-check">
                                                <input class="form-check-input" type="checkbox" value="" id="messages-notification-check01">
                                                <label class="form-check-label" for="messages-notification-check01"></label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="text-reset notification-item d-block dropdown-item">
                                       <div class="d-flex">
                                          <img src="assets/images/users/avatar-2.jpg" class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                          <div class="flex-grow-1">
                                             <a href="#!" class="stretched-link">
                                                <h6 class="mt-0 mb-1 fs-13 fw-semibold">Angela Bernier</h6>
                                             </a>
                                             <div class="fs-13 text-muted">
                                                <p class="mb-1">Answered to your comment on the cash flow forecast's
                                                   graph 🔔.
                                                </p>
                                             </div>
                                             <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                <span><i class="mdi mdi-clock-outline"></i> 2 hrs ago</span>
                                             </p>
                                          </div>
                                          <div class="px-2 fs-15">
                                             <div class="form-check notification-check">
                                                <input class="form-check-input" type="checkbox" value="" id="messages-notification-check02">
                                                <label class="form-check-label" for="messages-notification-check02"></label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="text-reset notification-item d-block dropdown-item">
                                       <div class="d-flex">
                                          <img src="assets/images/users/avatar-6.jpg" class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                          <div class="flex-grow-1">
                                             <a href="#!" class="stretched-link">
                                                <h6 class="mt-0 mb-1 fs-13 fw-semibold">Kenneth Brown</h6>
                                             </a>
                                             <div class="fs-13 text-muted">
                                                <p class="mb-1">Mentionned you in his comment on 📃 invoice #12501.
                                                </p>
                                             </div>
                                             <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                <span><i class="mdi mdi-clock-outline"></i> 10 hrs ago</span>
                                             </p>
                                          </div>
                                          <div class="px-2 fs-15">
                                             <div class="form-check notification-check">
                                                <input class="form-check-input" type="checkbox" value="" id="messages-notification-check03">
                                                <label class="form-check-label" for="messages-notification-check03"></label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="text-reset notification-item d-block dropdown-item">
                                       <div class="d-flex">
                                          <img src="assets/images/users/avatar-8.jpg" class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                          <div class="flex-grow-1">
                                             <a href="#!" class="stretched-link">
                                                <h6 class="mt-0 mb-1 fs-13 fw-semibold">Maureen Gibson</h6>
                                             </a>
                                             <div class="fs-13 text-muted">
                                                <p class="mb-1">We talked about a project on linkedin.</p>
                                             </div>
                                             <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                <span><i class="mdi mdi-clock-outline"></i> 3 days ago</span>
                                             </p>
                                          </div>
                                          <div class="px-2 fs-15">
                                             <div class="form-check notification-check">
                                                <input class="form-check-input" type="checkbox" value="" id="messages-notification-check04">
                                                <label class="form-check-label" for="messages-notification-check04"></label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="my-3 text-center view-all">
                                       <button type="button" class="btn btn-soft-success waves-effect waves-light">View
                                       All Messages <i class="ri-arrow-right-line align-middle"></i></button>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-pane fade p-4" id="alerts-tab" role="tabpanel" aria-labelledby="alerts-tab"></div>
                              <div class="notification-actions" id="notification-actions">
                                 <div class="d-flex text-muted justify-content-center">
                                    Select
                                    <div id="select-content" class="text-body fw-semibold px-1">0</div>
                                    Result <button type="button" class="btn btn-link link-danger p-0 ms-3" data-bs-toggle="modal" data-bs-target="#removeNotificationModal">Remove</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div> -->
                     <div class="dropdown ms-sm-3 header-item topbar-user">
                        <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="d-flex align-items-center">
                        <img class="rounded-circle header-profile-user" src="{{asset('user_asset/images/vegetable/veg-logo.png')}}" alt="Header Avatar">
                        <span class="text-start ms-xl-2">
                        <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">
                        {{ Auth::user()->username;  }} </span>
                        <span class="d-none d-xl-block ms-1 fs-12 user-name-sub-text">Founder</span>
                        </span>
                        </span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                           <!-- item-->
                           <h6 class="dropdown-header">Welcome {{ Auth::user()->username;  }}!</h6>
                            <a class="dropdown-item" href="" data-bs-toggle="modal"  data-bs-target="#exampleModal1"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Logout</span></a>
                           </div>
                     </div>
                  </div>
               </div>
            </div>
         </header>
         <!-- removeNotificationModal -->
     
         <!-- /.modal -->
         <!-- ========== App Menu ========== -->
         <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
               <!-- Dark Logo-->
               <a href="{{route('dashboard')}}" class="logo logo-dark">
               <span class="logo-sm">
               <img src="{{asset('user_asset/images/vegetable/veg-logo.png')}}" alt="" height="22">
               </span>
               <span class="logo-lg">
               <img src="{{asset('user_asset/images/vegetable/veg-logo.png')}}" alt="" height="100">
               </span>
               </a>
               <!-- Light Logo-->
               <a href="{{route('dashboard')}}" class="logo logo-light">
               <span class="logo-sm">
               <img src="{{asset('user_asset/images/vegetable/veg-logo.png')}}" alt="" height="22">
               </span>
               <span class="logo-lg">
               <img src="{{asset('user_asset/images/vegetable/veg-logo.png')}}" alt="" height="100">
               </span>
               </a>
               <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
               <i class="ri-record-circle-line"></i>
               </button>
            </div>
            <div id="scrollbar">
               <div class="container-fluid">
                  <div id="two-column-menu">
                  </div>
                  <ul class="navbar-nav" id="navbar-nav">
                     <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                     <li class="nav-item">
                        <a class="nav-link menu-link {{($page =='category_list') ? 'active' : ''}}" href="#sidebarDashboards" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Category</span>
                        </a>
                        <div class="{{($page =='category_list') ? 'collapse show' : 'collapse'}} menu-dropdown" id="sidebarDashboards">
                           <ul class="nav nav-sm flex-column">

                              <li class="nav-item">
                                 <a href="{{ route('category_list') }}" class="nav-link {{($page =='category_list') ? 'active' : ''}}" data-key="t-crm"> Category List </a>
                              </li>


                           </ul>
                        </div>
                     </li>
                     <!-- end Dashboard Menu -->
                     <li class="nav-item">
                        <a class="nav-link menu-link {{($page =='product_list') ? 'active' : ''}}" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-apps-2-line"></i> <span data-key="t-apps">Products</span>
                        </a>
                        <div class="{{($page =='product_list') ? 'collapse show' : 'collapse'}} menu-dropdown" id="sidebarApps">
                           <ul class="nav nav-sm flex-column">
                              <li class="nav-item">
                                 <a href="{{ route('product_list') }}" class="nav-link {{($page =='product_list') ? 'active' : ''}}" data-key="t-chat"> Product List </a>
                              </li>
                           </ul>
                        </div>
                     </li>


                     <li class="nav-item">
                        <a class="nav-link menu-link {{($page =='order_list'||$page =='shipped_list'||$page =='cancelled_list') ? 'active' : ''}}" href="#OrderManagement" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-apps-2-line"></i> <span data-key="t-apps">Order Management</span>
                        </a>
                        <div class="{{($page =='order_list'||$page =='shipped_list'||$page =='cancelled_list') ? 'collapse show' : 'collapse'}} menu-dropdown" id="OrderManagement">
                           <ul class="nav nav-sm flex-column">
                              <li class="nav-item">
                                 <a href="{{route('order_list')}}" class="nav-link {{($page =='order_list') ? 'active' : ''}}" data-key="t-chat"> Open Order List  </a>
                              </li>
                              <li class="nav-item">
                                 <a href="{{route('shipped_list')}}" class="nav-link {{($page =='shipped_list') ? 'active' : ''}}" data-key="t-chat"> Shipped Order List  </a>
                              </li>
                              <li class="nav-item">
                                 <a href="{{route('cancelled_list')}}" class="nav-link {{($page =='cancelled_list') ? 'active' : ''}}" data-key="t-chat"> Cancelled Order List </a>
                              </li>
                           </ul>
                        </div>
                     </li>

                     <li class="nav-item">
                        <a class="nav-link menu-link {{($page =='coupon_list') ? 'active' : ''}}" href="#CouponManagement" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-apps-2-line"></i> <span data-key="t-apps">Coupon Management</span>
                        </a>
                        <div class="{{($page =='coupon_list') ? 'collapse show' : 'collapse'}} menu-dropdown" id="CouponManagement">
                           <ul class="nav nav-sm flex-column">
                              <li class="nav-item">
                                 <a href="{{route('coupon_list')}}" class="nav-link {{($page =='coupon_list') ? 'active' : ''}}" data-key="t-chat"> Coupon List  </a>
                              </li>
                           </ul>
                        </div>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link menu-link {{($page =='bill') ? 'active' : ''}}" href="#Report" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-apps-2-line"></i> <span data-key="t-apps">Report Management</span>
                        </a>
                        <div class="{{($page =='bill') ? 'collapse show' : 'collapse'}} menu-dropdown" id="Report">
                           <ul class="nav nav-sm flex-column">
                              <li class="nav-item">
                                 <a href="{{route('bill')}}" class="nav-link {{($page =='bill') ? 'active' : ''}}" data-key="t-chat"> Bills </a>
                              </li>
                              <li class="nav-item">
                                 <a href="" class="nav-link" data-key="t-chat"> Reports </a>
                              </li>
                              
                           </ul>
                        </div>
                     </li>




                  </ul>
               </div>
               <!-- Sidebar -->
            </div>
            <div class="sidebar-background"></div>
         </div>
         <!-- Left Sidebar End -->
         <!-- Vertical Overlay-->
         <div class="vertical-overlay"></div>
         <!-- ============================================================== -->
         <!-- Start right Content here -->
         <!-- ============================================================== -->
         @yield('content')

         <!-- end main content-->
      </div>
      <!-- END layout-wrapper -->
      <!--start back-to-top-->
      <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
      <i class="ri-arrow-up-line"></i>
      </button>
      <!--end back-to-top-->
      <!--preloader-->
      <div id="preloader">
         <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
               <span class="visually-hidden">Loading...</span>
            </div>
         </div>
      </div>
      <div class="customizer-setting d-none d-md-block">
         <div class="btn-info rounded-pill shadow-lg btn btn-icon btn-lg p-2" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
            <i class='mdi mdi-spin mdi-cog-outline fs-22'></i>
         </div>
      </div>

      <!-- JAVASCRIPT -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script>
        setTimeout(function() {
            document.getElementById('errorMessage').remove();
        }, 3000);

     </script>
     <script>
        setTimeout(function() {
            document.getElementById('successMessage').remove();
        }, 3000);
     </script>
      @yield('script')



    
   </body>
</html>
