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
                  <h4 class="mb-sm-0">Product List</h4>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-lg-12">
               <div class="card">
                  <div class="card-header">
                     <h4 class="card-title mb-0">Product List</h4>
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
                                    <a href="{{ route('product') }}"  data-key="t-analytics" class="btn btn-success"> Add Product </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="table-responsive table-card mt-3 mb-1">
                           <table class="table align-middle table-nowrap " id="customerTable">
                              <thead class="table-light">
                                 <tr>
                                    <th class="sort text-center" data-sort="1">Sl.no</th>
                                    <th class="sort text-center" data-sort="2">Category</th>
                                    <th class="sort text-center" data-sort="3">Product Name</th>
                                    <th class="sort text-center" data-sort="4">MRP</th>
                                    <th class="sort text-center" data-sort="5">Retail</th>
                                    <th class="sort text-center" data-sort="6">Weight</th>
                                    <th class="sort text-center" data-sort="7">Stock</th>
                                    <th class="sort text-center" data-sort="8">Image</th>
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
                                    <td class="2 text-center">{{ $all->category->category }}</td>
                                    <td class="3 text-center">{{ $all->product_name }}</td>
                                    <td class="4 text-center">{{ $all->mrp }}</td>
                                    <td class="5 text-center">{{ $all->retail }}</td>
                                    <td class="6 text-center">{{ $all->weight }}</td>
                                    <td class="7 text-center">
                                       <span class="badge rounded-pill bg-{{($all->stock == 'Instock') ? 'success' : 'danger'}} p-2"> {{ $all->stock }}</span>
                                    </td>
                                    <td class="8 text-center">
                                       <img class="" src="{{ $all->image }}" width="50px" height="50px">
                                    </td>
                                    <td class="text-center">
                                       <div class="d-flex justify-content-center gap-2">
                                       <div class="view">
                                          <a href="{{ route('view_product', ['id' => $all->id]) }}"><i class="ri-eye-fill fs-16"></i></a>                                  
                                       </div>
                                          <div class="edit">
                                             <a href="{{ route('edit_product', ['id' => $all->id]) }}"><i class="ri-pencil-fill fs-16"></i></a>
                                          </div>
                                          <div class="remove">
                                             <a class="text-danger delete-btn" data-bs-toggle="modal" data-bs-target="#deleteRecordModal" data-id="{{ $all->id }}" data-product_id="{{ $all->product_id }}"><i class="ri-delete-bin-5-fill fs-16"></i></a>
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
                                 <p class="text-muted mb-0">We've searched more than 150+ Orders We did not find any orders for you search.</p>
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
                  <!-- end card -->
                  <div class="modal fade" id="descriptionModal" tabindex="-1" role="dialog" aria-labelledby="descriptionModalLabel" aria-hidden="true">
                     <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h5 class="modal-title" id="descriptionModalLabel">Description Content</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                           </div>
                           <div class="modal-body">
                              <div class="d-flex">
                                 <div class="flex-shrink-0">
                                    <i class="ri-checkbox-circle-fill text-success"></i>
                                 </div>
                                 <div class="flex-grow-1 ms-2">
                                    <!-- Description will be injected here -->
                                    <div id="modal-description-content"></div>

                                 </div>
                              </div>
                           </div>
                           <div class="modal-footer">
                              <a href="javascript:void(0);" class="btn btn-link link-success fw-medium" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Close</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- end col -->
            </div>
            <!-- end col -->
         </div>
        
         <div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
               <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>
                  </div>
                  <form method="POST" action="{{ route('delete_product') }}">
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
                        <input id="product_id" type="hidden" name="product_id" class="form-control">
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
           var product_id = $(this).data("product_id");
           $("#product_id").val(product_id);
   
       });
   });
</script>
<!-- <script>
    $(document).ready(function() {
        $('.view-description-btn').on('click', function() {
            var description = $(this).data('description');
            $('#modal-description-content').html(description); 
        });
    });
</script> -->
@endsection