
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
                  <h4 class="mb-sm-0">Add Product</h4>
                  <div class="page-title-right">
                     <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Product</li>
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
                        <form class="row g-3" method="POST" action="{{ route('add_product') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6">
                                <label class="form-label">Category</label>
                                <select class="form-select" name="category_id">
                                    <option selected disabled value="">Choose Category</option>
                                    @foreach ($category as $cat)
                                    <option value="{{ $cat->category_id }}">{{ $cat->category }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Product name</label>
                                <input type="text" class="form-control" name="product_name" value="{{ old('product_name') }}">
                                @error('product_name')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">MRP</label>
                                <input type="text" class="form-control" name="mrp" value="{{ old('mrp') }}">
                                @error('mrp')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Retail Price</label>
                                <input type="text" class="form-control" name="retail" value="{{ old('retail') }}">
                                @error('retail')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Stock</label>
                                <select class="form-control" name="stock">
                                    <option selected disabled>select stock</option>
                                    <option value="Instock" {{ (old('stock') == 'Instock') ? 'selected' : '' }}>Instock</option>
                                    <option value="Out of stock" {{ (old('stock') == 'Out of stock') ? 'selected' : '' }}>Out of stock</option>
                                </select>
                                @error('stock')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Weight</label>
                                <input type="text" class="form-control" name="weight" value="{{ old('weight') }}">
                                @error('weight')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title mb-0">Primary Image</h4>
                                    </div>
                                    <div class="card-body">
                                        <input type="file" accept="image/jpeg, image/png, image/gif" class="form-control" name="primary_image"  onchange="previewImages1(event)">
                                        <div id="image-preview-container1" class="mt-3"></div>
                                        <div id="image-upload-loading1" class="mt-3" style="display: none;">
                                            <span>Loading...</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title mb-0">Secondary Image</h4>
                                    </div>
                                    <div class="card-body">
                                        <input type="file" accept="image/jpeg, image/png, image/gif" class="form-control" name="image[]" multiple onchange="previewImages(event)">
                                        <div id="image-preview-container" class="mt-3"></div>
                                        <div id="image-upload-loading" class="mt-3" style="display: none;">
                                            <span>Loading...</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-3">
                                <label class="form-label" for="description">Description</label>
                                <div class="snow-editor1" style="height: 300px;"></div>
                                <textarea id="description" style="display:none;" name="description">{{ old('description') }}</textarea>
                            </div>
                            @error('description')<span class="text-danger">{{ $message }}</span>@enderror
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
    function previewImages(event) {
        const files = event.target.files;
        const previewContainer = document.getElementById('image-preview-container');
        previewContainer.innerHTML = ''; // Clear previous previews

        for (const file of files) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const imgElement = document.createElement('img');
                imgElement.src = e.target.result;
                imgElement.classList.add('img-thumbnail', 'm-2');
                imgElement.style.maxWidth = '100px'; // Set max width for thumbnails
                previewContainer.appendChild(imgElement);
            };
            reader.readAsDataURL(file);
        }
    }
</script>
<script>
    function previewImages1(event) {
        const files = event.target.files;
        const previewContainer = document.getElementById('image-preview-container1');
        previewContainer.innerHTML = ''; // Clear previous previews

        for (const file of files) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const imgElement = document.createElement('img');
                imgElement.src = e.target.result;
                imgElement.classList.add('img-thumbnail', 'm-2');
                imgElement.style.maxWidth = '100px'; // Set max width for thumbnails
                previewContainer.appendChild(imgElement);
            };
            reader.readAsDataURL(file);
        }
    }
</script>


@endsection
