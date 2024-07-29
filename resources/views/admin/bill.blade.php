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
                  <h4 class="mb-sm-0">Bill List</h4>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-lg-12">
               <div class="card">
                  <div class="card-header">
                     <h4 class="card-title mb-0">Bill List</h4>
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
                              </div>
                           </div>
                        </div>
                        <div class="table-responsive table-card mt-3 mb-1">
                           <table class="table align-middle table-nowrap " id="customerTable">
                              <thead class="table-light">
                                 <tr>
                                    <th class="sort text-center" data-sort="1">Sl.no</th>
                                    <th class="sort text-center" data-sort="2">Invoice</th>
                                    <th class="sort text-center" data-sort="3">User</th>
                                    <th class="sort text-center" data-sort="4">Email</th>
                                    <th class="sort text-center" data-sort="5">Phone</th>
                                    <th class="sort text-center" data-sort="6">status</th>
                                    <th class="sort text-center" data-sort="7">Total</th>
                                    <th class="sort text-center" data-sort="">Bill</th>
                                 </tr>
                              </thead>
                              <tbody class="list form-check-all">
                                 @php
                                 $c=1;
                                 @endphp
                                 @foreach ($all_order as $all)
                                 @php $user_data = App\Models\User::where('user_id',$all->user_id)->first() @endphp
                                 <tr>
                                    <td class="1 text-center">{{ $c++ }}</td>
                                    <td class="2 text-center">{{ $all->billing_id }}</td>
                                    <td class="3 text-center">{{ $user_data->username }}</td>
                                    <td class="4 text-center">{{ $user_data->email }}</td>
                                    <td class="5 text-center">{{ $user_data->phone }}</td>
                                    
                                    <td class="6 text-center">
                                       <span class="badge rounded-pill bg-{{($all->status == 'Delivered') ? 'success' : 'danger'}} p-2">{{ $all->status }}</span>
                                    </td>
                                    <td class="7 text-center">{{ $all->total }}</td>
                                    <td>
                                       <div class="d-flex justify-content-center gap-2">
                                          <div class="edit">
                                             <a href="{{ route('bill_detail', ['bill_id' => $all->billing_id, 'user_id' => $user_data->user_id]) }}" class="btn btn-sm btn-success edit-item-btn edit_info">View</a>
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
                                 <p class="text-muted mb-0">We've searched more than {{App\Models\OrderPlacedModel::count()}} Orders We did not find any orders for you search.</p>
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
                        <!-- Confirmation Modal -->
                        <div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="statusModalLabel" aria-hidden="true">
                           <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <h5 class="modal-title" id="statusModalLabel">Confirm Status Change</h5>
                                    <button type="button"  class="btn btn-danger close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                 </div>
                                 <div class="modal-body">
                                    Are you sure you want to change the status to <span id="selectedStatus"></span>?
                                 </div>
                                 <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" id="modalCancelButton">Cancel</button>
                                    <button type="button" class="btn btn-success" id="modalConfirmButton">Confirm</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- end col -->
            </div>
            <!-- end col -->
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

@endsection