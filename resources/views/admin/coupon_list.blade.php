@extends('admin.layout')
@section('link')
<!-- Sweet Alert css-->
<link href="{{ asset('admin_asset/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
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
         <div class="row">
            <div class="col-12">
               <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                  <h4 class="mb-sm-0">Coupon List</h4>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-lg-12">
               <div class="card">
                  <div class="card-header">
                     <h4 class="card-title mb-0">Coupon List</h4>
                  </div>
                  <!-- end card header -->
                  <div class="card-body">
                     <div class="listjs-table" id="customerList">
                        <div class="row g-4 mb-3">
                           <div class="col-sm">
                              <div class="d-flex justify-content-sm-between">
                                 <div class="search-box ms-2">
                                    <input type="text" class="form-control search" placeholder="Search...">
                                    <i class="ri-search-line search-icon"></i>
                                 </div>
                                 <div class="">
                                    <a href="{{ route('coupon') }}"  data-key="t-analytics" class="btn btn-success"> Add Coupon </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="table-responsive table-card mt-3 mb-1">
                           <table class="table align-middle table-nowrap " id="customerTable">
                              <thead class="table-light">
                                 <tr>
                                    <th class="sort text-center" data-sort="1">Sl.no</th>
                                    <th class="sort text-center" data-sort="2">Coupon code</th>
                                    <th class="sort text-center" data-sort="3">Coupon amount</th>
                                    <th class="sort text-center" >Action</th>
                                 </tr>
                              </thead>
                              <tbody class="list form-check-all">
                                 @php
                                 $c=1;
                                 @endphp
                                 @foreach ($all_data as $all)
                                 <tr>
                                    <td class="1 text-center">{{ $c++ }}</td>
                                    <td class="2 text-center">{{ $all->coupon_code }}</td>
                                    <td class="3 text-center">{{ $all->coupon_amount }}</td>
                                    <td class="text-center">
                                       <div class="d-flex justify-content-center gap-2">
                                          <div class="edit">
                                             <a href="" class="edit_info" data-bs-toggle="modal" data-bs-target="#showModal" data-id="{{ $all->id }}" data-coupon_code="{{ $all->coupon_code }}" data-coupon_amount="{{ $all->coupon_amount }}"><i class="ri-pencil-fill fs-16"></i></a>
                                          </div>
                                        
                                          <div class="remove">
                                             <a class="text-danger delete-btn" data-bs-toggle="modal" data-bs-target="#deleteRecordModal" data-id="{{ $all->id }}"><i class="ri-delete-bin-5-fill fs-16"></i></a>
                                          </div>
                                       </div>
                                    </td>
                                 </tr>
                                 @endforeach
                              </tbody>
                           </table>
                           <div class="noresult" style="display: none">
                              <div class="text-center">
                                 <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px"></lord-icon>
                                 <h5 class="mt-2">Sorry! No Result Found</h5>
                                 <p class="text-muted mb-0">We've searched more than {{ App\Models\CouponModel::count() }}  Coupons We did not find any coupon details for you search.</p>
                              </div>
                           </div>
                        </div>
                        <div class="d-flex justify-content-end">
                           <div class="pagination-wrap hstack gap-2">
                              <a class="page-item pagination-prev disabled" href="javascript:void(0);">
                              Previous
                              </a>
                              <ul class="pagination listjs-pagination mb-0"></ul>
                              <a class="page-item pagination-next" href="javascript:void(0);">
                              Next
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
            
               </div>
               <!-- end col -->
            </div>
            <!-- end col -->
         </div>
         <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>
            <form class="tablelist-form" method="post" id="couponForm" action="{{ route('change_coupon') }}">
                @csrf
                <div class="modal-body">
                    <div class="mb-3" id="modal-id" style="display:none;">
                        <label for="id-field" class="form-label">ID</label>
                        <input type="text" id="id" name="id" class="form-control" readonly />
                    </div>
                    <div class="mb-3">
                        <label for="category-field" class="form-label">Coupon code</label>
                        <input type="text" id="coupon_code" class="form-control"  readonly/>
                    </div>
                    <div class="mb-3">
                        <label for="category-field" class="form-label">Coupon amount</label>
                        <input type="text" id="coupon_amount" name="coupon_amount" class="form-control" placeholder="Enter coupon amount"  />
                        <span class="text-danger" id="coupon_amount_error"></span>

                    </div>
                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" id="add-btn">Change</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
         <div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
               <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>
                  </div>
                  <form method="POST" action="{{ route('delete_coupon') }}">
                     @csrf
                     <div class="modal-body">
                        <div class="mt-2 text-center">
                           <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                           <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                              <h4>Are you Sure ?</h4>
                              <p class="text-muted mx-4 mb-0">Are you Sure You want to Remove this Record ? </p>
                           </div>
                        </div>
                        <input id="delete_id" type="hidden" name="id" class="form-control">
                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                           <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                           <button type="submit" class="btn w-sm btn-danger">Yes, Delete It!</button>
                        </div>
                     </div>
                  </form>
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
<!-- prismjs plugin -->
<script src="{{ asset('admin_asset/libs/prismjs/prism.js') }}"></script>
<script src="{{ asset('admin_asset/libs/list.js/list.min.js') }}"></script>
<script src="{{ asset('admin_asset/libs/list.pagination.js/list.pagination.min.js') }}"></script>
<!-- listjs init -->
<script src="{{ asset('admin_asset/js/pages/listjs.init.js') }}"></script>
<!-- Sweet Alerts js -->
<script src="{{ asset('admin_asset/libs/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- App js -->
<script src="{{ asset('admin_asset/js/app.js') }}"></script>
<script type="text/javascript">
   $(document).ready(function() {
       $(document).on('click', '.delete-btn', function() {
           var dt_id = $(this).data("id");
           $("#delete_id").val(dt_id);
       });
   });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '.edit_info', function() {
            var dt_id = $(this).data("id");
            $("#id").val(dt_id);
            var coupon_amount = $(this).data("coupon_amount");
            $("#coupon_amount").val(coupon_amount);
            var coupon_code = $(this).data("coupon_code");
            $("#coupon_code").val(coupon_code);
        });
    });
</script>
<script>
$(document).ready(function() {
    $('#couponForm').on('submit', function(e) {
        let valid = true;

        // Clear previous error messages
        $('.text-danger').text('');

        let couponAmount = $('#coupon_amount').val().trim();

        if (couponAmount === '') {
            $('#coupon_amount_error').text('Enter coupon amount.');
            valid = false;
        }
        else if (isNaN(couponAmount) || parseFloat(couponAmount) <= 0) {
            $('#coupon_amount_error').text('Enter a valid positive number for coupon amount.');
            valid = false;
        }

        const submitButton = $('#couponForm button[type="submit"]');
        if (!valid) {
            submitButton.prop('disabled', true); 
            e.preventDefault(); 
        } else {
            submitButton.prop('disabled', false); 
        }
    });

    $('#couponForm input').on('input', function() {
        $('#couponForm button[type="submit"]').prop('disabled', false);
    });
});
</script>

@endsection