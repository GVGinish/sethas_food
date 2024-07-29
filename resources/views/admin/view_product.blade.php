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
<!-- dropzone css -->
<link rel="stylesheet" href="{{ asset('admin_asset/libs/dropzone/dropzone.css') }}" type="text/css" />
<!-- Filepond css -->
<link href="{{ asset('admin_asset/libs/quill/quill.core.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin_asset/libs/quill/quill.bubble.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin_asset/libs/quill/quill.snow.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="main-content">
   <div class="page-content">
      <div class="container-fluid">
         <!-- start page title -->
         <div class="row">
            <div class="col-12">
               <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                  <h4 class="mb-sm-0">View Product</h4>
                  <div class="page-title-right">
                     <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                        <li class="breadcrumb-item active">View Product</li>
                     </ol>
                  </div>
               </div>
            </div>
         </div>
         <!-- end page title -->
         <div class="row">
            <div class="col-lg-12">
               <div class="card">
                  <!-- end card header -->
                  <div class="card-body">
                     <div class="row live-preview">
                           <div class="col-md-6 mb-3">
                              <label class="form-label">Category name</label>
                              <input type="text" class="form-control" value="{{ $edit->category->category }}" readonly>
                              </div>
                           <div class="col-md-6 mb-3">
                              <label class="form-label">Product name</label>
                              <input type="text" class="form-control"  value="{{ $edit->product_name }}" readonly>
                           </div>
                           <div class="col-md-6 mb-3">
                              <label class="form-label">MRP</label>
                              <input type="text" class="form-control" value="{{ $edit->mrp }}" readonly>
                           </div>
                           <div class="col-md-6 mb-3">
                              <label class="form-label">Retail Price</label>
                              <input type="text" class="form-control"  value="{{ $edit->retail }}" readonly>
                           </div>
                           <div class="col-md-6 mb-3">
                              <label class="form-label">Stock</label>
                              <input type="text" class="form-control"  value="{{ $edit->stock }}" readonly>
                           </div>
                           <div class="col-md-6 mb-3">
                              <label class="form-label">Weight</label>
                              <input type="text" class="form-control"  value="{{ $edit->weight }}" readonly>
                           </div>
                           <div class="mt-3 mb-3">
                              <label class="form-label" for="description">Description</label>
                              <div class="snow-editor1" style="height: 300px;">
                                 {!! $edit->description !!}
                              </div>
                           </div>
                           <div class="p-3">
                              <h4>Primary image</h4>
                           </div>
                           <div class="col-lg-12 d-flex justify-content-around text-center">
                              <div class="">
                                     <figure class="figure p-2">
                                        <img src="{{ $edit->image }}" class="figure-img img-fluid rounded" alt="..." width="200px">
                                     </figure>
                              </div>
                           </div>
                        <div class="table-responsive table-card mt-3 mb-1">
                           <div class="p-3">
                              <h4>Secondary images</h4>
                           </div>
                           <div class="col-lg-12 d-flex justify-content-around text-center">
                              @php
                                 $c=1;
                                 $pro_image = App\Models\ImageModel::where('images',"!=",$edit->image)->where('product_id',$edit->product_id)->get() @endphp
                                 @foreach($pro_image as $img)
                                    <figure class="figure p-2">
                                        <img src="{{ $img->images }}" class="figure-img img-fluid rounded" alt="..." >
                                    </figure>
                                 @endforeach
                           </div>
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
<script src="{{ asset('admin_asset/libs/dropzone/dropzone-min.js') }}"></script>
<!-- filepond js -->
<script src="{{ asset('admin_asset/js/pages/form-file-upload.init.js') }}"></script>
<!-- ckeditor -->
<script src="{{ asset('admin_asset/libs/%40ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>
<!-- quill js -->
<script src="{{ asset('admin_asset/libs/quill/quill.min.js') }}"></script>
<!-- init js -->
<script src="{{ asset('admin_asset/js/pages/form-editor.init.js') }}"></script>
<script>
   $(document).ready(function() {
       var quill = new Quill('.snow-editor1', {
           theme: 'snow',
           modules: {
               toolbar: [
                   [{ 'font': [] }],
                   [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                   ['bold', 'italic', 'underline', 'strike'],
                   [{ 'color': [] }, { 'background': [] }],
                   [{ 'script': 'sub'}, { 'script': 'super' }],
                   [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                   [{ 'indent': '-1'}, { 'indent': '+1' }],
                   [{ 'direction': 'rtl' }],
                   [{ 'align': [] }],
                   ['link', 'image', 'video'],
                   ['clean']
               ]
           }
       });
   
   });
</script>
@endsection
</body>
</html>