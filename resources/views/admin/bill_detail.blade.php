@extends('admin.layout')
@section('link')
<script src="{{ asset('admin_asset/js/layout.js') }}"></script>
<link href="{{ asset('admin_asset/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin_asset/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin_asset/css/app.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin_asset/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>

@endsection
@section('content')
<div class="main-content">
   <div class="page-content">
      <div class="container-fluid">
         <!-- start page title -->
         <div class="row">
            <div class="col-12">
               <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                  <h4 class="mb-sm-0">Invoice Details</h4>
                  <div class="page-title-right">
                     <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Invoices</a></li>
                        <li class="breadcrumb-item active">Invoice Details</li>
                     </ol>
                  </div>
               </div>
            </div>
         </div>
         <!-- end page title -->
         <div class="row justify-content-center">
            <div class="col-xxl-9">
               <div class="card" id="demo">
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="card-header border-bottom-dashed p-4">
                           <div class="d-flex">
                              <div class="flex-grow-1">
                                 <img data-src="http://127.0.0.1:8000/user_asset/images/vegetable/veg-logo.png" alt="logo" class=" lazyloaded" width="84" height="85" src="{{asset('user_asset/images/vegetable/veg-logo.png')}}">
                                 <div class="col-6 mt-3">
                                 <h6 class="text-muted text-uppercase fw-semibold mb-3">DELIVERY Address</h6>
                                 <p class="fw-medium mb-2" id="billing-name">Name: {{$user_data->username}}</p>
                                 <p class="text-muted mb-0"><span>Email: </span><span id="billing-tax-no">{{$user_data->email}}</span> </p>
                                 <p class="text-muted mb-1" id="billing-address-line-1"><span>Address: </span>{{$address->address}},{{$address->city}},{{$address->district}},{{$address->state}},{{$address->pincode}}</p>

                              </div>
                              </div>
                              <div class="flex-shrink-0 mt-sm-0 mt-3">
                              <h6><span class="text-muted fw-normal">Address:</span></h6>
                                 <h6><span class="text-muted fw-normal"></span><span id="legal-register-no">Kairali Foods And Beverages</span></h6>
                                 <h6><span class="text-muted fw-normal"></span><span id="legal-register-no">Kodanad P.O,</span></h6>
                                 <h6><span class="text-muted fw-normal"></span><span id="legal-register-no">Koovappady, Perumbavoor,</span></h6>
                                 <h6><span class="text-muted fw-normal"></span><span id="legal-register-no">683544</span></h6>
                              </div>
                           </div>
                        </div>
                        <!--end card-header-->
                     </div>
                     <!--end col-->
                     <div class="col-lg-12">
                        <div class="card-body p-4">
                           <div class="row g-3">
                              <div class="col-lg-3 col-6">
                                 <p class="text-muted mb-2 text-uppercase fw-semibold">Invoice No</p>
                                 <h5 class="fs-14 mb-0">#<span id="invoice-no">{{$bill_id}}</span></h5>
                              </div>
                              <!--end col-->
                              <div class="col-lg-3 col-6">
                                 <p class="text-muted mb-2 text-uppercase fw-semibold">Date</p>
                                 <h5 class="fs-14 mb-0"><span id="invoice-date">{{date('d M Y',strtotime($orderPlaced->created_at))}}</span> <small class="text-muted" id="invoice-time">{{date('H:i A',strtotime($orderPlaced->created_at))}}</small></h5>
                              </div>
                              <!--end col-->
                              <div class="col-lg-3 col-6">
                                 <p class="text-muted mb-2 text-uppercase fw-semibold">Payment Status</p>
                                 <span class="badge bg-{{($orderPlaced->status == 'Delivered') ? 'success' : 'danger' }}-subtle text-{{($orderPlaced->status == 'Delivered') ? 'success' : 'danger' }} fs-11" id="payment-status">{{$orderPlaced->status}}</span>
                              </div>
                              <!--end col-->
                              <div class="col-lg-3 col-6">
                                 <p class="text-muted mb-2 text-uppercase fw-semibold">Total Amount</p>
                                 <h5 class="fs-14 mb-0">₹ <span id="total-amount">{{$orderPlaced->total}}</span></h5>
                              </div>
                              <!--end col-->
                           </div>
                           <!--end row-->
                        </div>
                        <!--end card-body-->
                     </div>
                     <!--end col-->
                     </div>
                     <!--end col-->
                     <div class="col-lg-12">
                        <div class="card-body p-4">
                           <div class="table-responsive">
                              <table class="table table-borderless text-center table-nowrap align-middle mb-0">
                                 <thead>
                                    <tr class="table-active">
                                       <th scope="col" style="width: 50px;">#</th>
                                       <th scope="col">Product Details</th>
                                       <th scope="col">Rate</th>
                                       <th scope="col">Quantity</th>
                                       <th scope="col" class="text-end">Amount</th>
                                    </tr>
                                 </thead>
                                 <tbody id="products-list">
                                    
                                    @foreach($all_order as $all)
                                    <tr>
                                       <th scope="row">{{$c++}}</th>
                                       <td class="text-center">
                                          <span class="fw-medium">{{$all->product_name}}</span>
                                          <p class="text-muted mb-0">{{$all->weight}}</p>
                                       </td>
                                       <td>₹ {{$all->retail}}</td>
                                       <td>{{$all->quantity}}</td>
                                       <td class="text-end">₹ {{$all->total_price}}</td>
                                    </tr>
                                   @endforeach
                               
                                 </tbody>
                              </table>
                              <!--end table-->
                           </div>
                           <div class="border-top border-top-dashed mt-2">
                              <table class="table table-borderless table-nowrap align-middle mb-0 ms-auto" style="width:250px">
                                 <tbody>
                                    <tr>
                                       <td>Sub Total</td>
                                       <td class="text-end">₹ {{$orderPlaced->total}}</td>
                                    </tr>
                     
                                    <!-- <tr>
                                       <td>Shipping Charge</td>
                                       <td class="text-end">$65.00</td>
                                    </tr>  -->
                                    <tr class="border-top border-top-dashed fs-15">
                                       <th scope="row">Total Amount</th>
                                       <th class="text-end">₹ {{$orderPlaced->total}}</th>
                                    </tr>
                                 </tbody>
                              </table>
                              <!--end table-->
                           </div>
                           <div class="mt-3">
                              <h6 class="text-muted text-uppercase fw-semibold mb-3">Payment Details:</h6>
                              <p class="text-muted mb-1">Payment Method: <span class="fw-medium" id="payment-method">Mastercard</span></p>
                              <p class="text-muted mb-1">Card Holder: <span class="fw-medium" id="card-holder-name">David Nichols</span></p>
                              <p class="text-muted mb-1">Card Number: <span class="fw-medium" id="card-number">xxx xxxx xxxx 1234</span></p>
                              <p class="text-muted">Total Amount: <span class="fw-medium" id="">$ </span><span id="card-total-amount">755.96</span></p>
                           </div>
                        
                           <div class="hstack gap-2 justify-content-end d-print-none mt-4" id="download-buttons">
                              <a href="javascript:window.print()" class="btn btn-success"><i class="ri-printer-line align-bottom me-1"></i> Print</a>
                              <a href="javascript:void(0);" id="downloadBtn" class="btn btn-primary"><i class="ri-download-2-line align-bottom me-1"></i> Download</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
@section('script')
<script src="{{ asset('admin_asset/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin_asset/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('admin_asset/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ asset('admin_asset/libs/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('admin_asset/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
<script src="{{ asset('admin_asset/js/plugins.js') }}"></script>
<script src="{{ asset('admin_asset/js/pages/invoicedetails.js') }}"></script>
<script src="{{ asset('admin_asset/js/app.js') }}"></script>


<script>
   document.getElementById('downloadBtn').addEventListener('click', function() {
       var element = document.querySelector('.page-content');
       var buttons = document.getElementById('download-buttons');
       buttons.style.display = 'none';
       
       var opt = {
           margin:       1,
           filename:     'invoice-details.pdf',
           image:        { type: 'jpeg', quality: 0.98 },
           html2canvas:  { scale: 2 },
           jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
       };
       
       html2pdf().from(element).set(opt).save().then(function() {
           buttons.style.display = 'flex';
       });
   });
</script>
@endsection