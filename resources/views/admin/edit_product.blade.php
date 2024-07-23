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
<link rel="stylesheet" href="{{ asset('admin_asset/libs/dropzone/dropzone.css') }}" type="text/css" />
<!-- Filepond css -->
<link href="{{ asset('admin_asset/libs/quill/quill.core.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin_asset/libs/quill/quill.bubble.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin_asset/libs/quill/quill.snow.css') }}" rel="stylesheet" type="text/css" />
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
                  <h4 class="mb-sm-0">Edit Product</h4>
                  <div class="page-title-right">
                     <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Product</li>
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
                     <div class="live-preview">
                        <form class="row g-3" method="POST" action="{{ route('change_product') }}" enctype="multipart/form-data" >
                           @csrf
                           <input name="id" value="{{ $edit->id }}" type="hidden">
                           <div class="col-md-6">
                              <label class="form-label">Category</label>
                              <select class="form-select" name="category_id" >
                                 <option value="{{ $edit->category->category_id }}">{{ $edit->category->category }}</option>
                                 @foreach ($category as $cat)
                                 <option value="{{ $cat->category_id }}">{{ $cat->category }}</option>
                                 @endforeach
                              </select>
                              @error('category_id')<span class="text-danger">{{ $message }}</span>@enderror
                           </div>
                           <div class="col-md-6">
                              <label class="form-label">Product name</label>
                              <input type="text" class="form-control" name="product_name" value="{{ $edit->product_name }}">
                              @error('product_name')<span class="text-danger">{{ $message }}</span>@enderror
                           </div>
                           <div class="col-md-6">
                              <label class="form-label">MRP</label>
                              <input type="text" class="form-control" name="mrp" value="{{ $edit->mrp }}">
                              @error('mrp')<span class="text-danger">{{ $message }}</span>@enderror
                           </div>
                           <div class="col-md-6">
                              <label class="form-label">Retail Price</label>
                              <input type="text" class="form-control" name="retail" value="{{ $edit->retail }}">
                              @error('retail')<span class="text-danger">{{ $message }}</span>@enderror
                           </div>
                           <div class="col-md-6">
                              <label class="form-label">Quantity</label>
                              <input type="text" class="form-control" name="quantity" value="{{ $edit->quantity }}">
                              @error('quantity')<span class="text-danger">{{ $message }}</span>@enderror
                           </div>
                           <div class="col-md-6">
                              <label class="form-label">Weight</label>
                              <input type="text" class="form-control" name="weight" value="{{ $edit->weight }}">
                              @error('weight')<span class="text-danger">{{ $message }}</span>@enderror
                           </div>
                           <div class="mt-3">
                              <label class="form-label" for="description">Description</label>
                              <div class="snow-editor1" style="height: 300px;">
                                 {!! $edit->description !!}
                              </div>
                              <input id="description" type="hidden" name="description" value="{{ $edit->description }}">
                           </div>
                           @error('description')<span class="text-danger">{{ $message }}</span>@enderror
                           <div class="col-lg-12 d-flex justify-content-around text-center">
                              <div class="">
                                 <label>Primary Image</label>
                                 <img src="{{ $edit->image }}" width="200">
                              </div>
                              <div class="">
                                 <div class="form-group mt-5s">
                                    <img id="imagePreview" src="" alt="Image Preview" style="display:none; width: 200px; height: auto; margin-top: 20px;">
                                 </div>
                                 <div class="form-group">
                                    <label for="image">click here to change primary Image</label>
                                    <input type="file" class="form-control" id="image" accept="image/*" name="new_image" onchange="previewImage(event)">
                                 </div>
                              </div>
                           </div>
                           <div class="col-12 text-center mt-5 mb-5">
                              <button class="btn btn-primary" type="submit">Submit form</button>
                           </div>
                        </form>
                        <div class="table-responsive table-card mt-3 mb-1">
                           <div class="p-3">
                              <h4>Secondary images</h4>
                           </div>
                           <table class="table align-middle table-nowrap " id="customerTable">
                              <thead class="table-light">
                                 <tr>
                                    <th class="sort" data-sort="1">Sl.no</th>
                                    <th class="sort" data-sort="2">Image</th>
                                    <th class="sort" data-sort="">Action</th>
                                 </tr>
                              </thead>
                              <tbody class="list form-check-all">
                                 @php
                                 $c=1;
                                 $pro_image = App\Models\ImageModel::where('product_id',$edit->product_id)->get() @endphp
                                 @foreach($pro_image as $img)
                                 <tr>
                                    <td class="1">{{ $c++ }}</td>
                                    <td class="2">
                                       <a href="{{ asset($img->images) }}" target="_blank">
                                       <img src="{{ asset($img->images) }}" width="50px" height="50px" alt="Product Image">
                                       </a>
                                    </td>
                                    <td>
                                       <div class="remove">
                                          <button class="btn btn-sm btn-danger delete-btn" data-bs-toggle="modal" data-bs-target="#deleteRecordModal" data-id="{{ $img->id }}">Remove</button>
                                       </div>
                                    </td>
                                 </tr>
                                 @endforeach
                              </tbody>
                           </table>
                           <div class="form-group text-center">
                           <a type="button" class="btn btn-secondary" id="uploadButton">Click here to add image</a>

                           <div class="form-group mt-5s">
                                    <img id="imagePreview1" src="" alt="Image Preview" style="display:none; width: 200px; height: auto; margin-top: 20px;">
                                 </div>
                                <!-- <label for="image">Add New Image</label> -->
                                <div class="text-center">
                                    <form method="POST" action="{{ route('add_image') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" class="form-control" id="image1" accept="image/*" name="add_image" style="display: none;">
                                    <input type="hidden" name="product_id"  value="{{ $edit->product_id }}">
                                    
                                    <div class="text-center"> 
                                    <button type="submit"  class="btn btn-primary" id="btn_id" style="display:none;">Add</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                           <div class="noresult" style="display: none">
                              <div class="text-center">
                                 <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px"></lord-icon>
                                 <h5 class="mt-2">Sorry! No Result Found</h5>
                                 <p class="text-muted mb-0">We've searched more than 150+ Orders We did not find any orders for you search.</p>
                              </div>
                           </div>
                        </div>
                        <div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-hidden="true">
                           <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>
                                 </div>
                                 <form method="POST" action="{{ route('delete_image') }}">
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
   FilePond.registerPlugin(FilePondPluginImagePreview);
   
   FilePond.parse(document.body);
</script>
<script type="text/javascript">
   $(document).ready(function() {
       $(document).on('click', '.delete-btn', function() {
           var dt_id = $(this).data("id");
           $("#delete_id").val(dt_id);
       });
   });
</script>
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
   
       // Update hidden input on form submission
       $('form').on('submit', function(e) {
           var quillEditorContent = quill.root.innerHTML;
           $('#description').val(quillEditorContent);
       });
   
       $.validator.addMethod("validDescription", function(value, element) {
           var quillEditorContent = quill.root.innerHTML;
           if (quillEditorContent === '<p><br></p>' || quillEditorContent.trim() === '') {
               return false;
           }
           return true;
       }, "Please fill in the description.");
   });
</script>
<script>
   function previewImage(event) {
       var reader = new FileReader();
       reader.onload = function(){
           var output = document.getElementById('imagePreview');
           output.src = reader.result;
           output.style.display = 'block';
       }
       reader.readAsDataURL(event.target.files[0]);
   }
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const uploadButton = document.getElementById('uploadButton');
        const fileInput = document.getElementById('image1');

        uploadButton.addEventListener('click', function() {
            fileInput.click();
        });

        fileInput.addEventListener('change', function() {
            // Optional: Preview the selected image if needed
            const file = fileInput.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('imagePreview1').src = e.target.result;
                    document.getElementById('imagePreview1').style.display = 'block';
                    document.getElementById('btn_id').style.display = 'block';

                    
                  };
                reader.readAsDataURL(file);
            }
        });
    });
</script>

@endsection
</body>
</html>