@extends('website.layout2')
@section('link')
<link rel="stylesheet" href="{{ asset('user_asset/css/vendor/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{ asset('user_asset/css/vendor/swiper.min.css')}}">
<link rel="stylesheet" href="{{ asset('user_asset/css/vendor/aos.min.css')}}">
<link rel="stylesheet" href="{{ asset('user_asset/css/main.css')}}">
<link rel="stylesheet" href="{{ asset('user_asset/css/layouts/default-nav.css')}}">
<link rel="stylesheet" href="{{ asset('user_asset/css/layouts/default-footer.css')}}">
<link rel="stylesheet" href="{{ asset('user_asset/css/components/common-banner.css')}}">
<link rel="stylesheet" href="{{ asset('user_asset/css/components/pagination.css')}}">
<link rel="stylesheet" href="{{ asset('user_asset/css/themes/common.css')}}">
<link rel="stylesheet" href="{{ asset('user_asset/css/themes/button.css')}}">
<link rel="stylesheet" href="{{ asset('user_asset/css/pages/product-details.css')}}">
<link rel="stylesheet" href="{{ asset('user_asset/css/fonts/dairy-fonts.css')}}">
@endsection
@section('content')
<section class="common_banner--wrapper">
            <div class="container">
               <div class="row">
                  <div class="col-12">
                     <h1 class="banner_title">Product Details</h1>
                     <nav class="breadcum_wrapper">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="demo-pages/index.html">Home</a></li>
                           <li class="breadcrumb-item active">Product Details</li>
                        </ol>
                     </nav>
                  </div>
               </div>
            </div>
         </section>



<section class="product_details--wrapper">
            <div class="container">
               <div class="row">
                  <div class="col-lg-7">
                     <div class="product_details_slider--wrapper">
                        <div class="swiper_product--wrapper">
                           <div class="swiper-container gallery-top">
                           <div class="swiper-wrapper">
                     @foreach ($images as $im)
                     <div class="swiper-slide">
                        <img data-src="{{ asset($im->images)}}" alt="item" class="lazyload" width="600" height="397">
                     </div>
                     @endforeach
                  </div>
                           </div>
                        </div>
                        <div class="horizontal_link--wrapper">
                           <div class="swiper-container gallery-thumbs">
                           <div class="swiper-wrapper">
                     @foreach ($images as $im)
                     <div class="swiper-slide">
                        <img data-src="{{ asset($im->images)}}" alt="item-link" class="lazyload" width="102" height="102">
                     </div>
                     @endforeach
                  </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-5">
                     <div class="product_details_info--wrapper">
                        <div class="share_title--wrapper">
                           <h1 class="product_title">{{ $detail->product_name }}</h1>
                        </div>
                        <p>{!! $detail->description !!}</p>
                        <span class="mrp_wrapper">MRP: ₹   {{$detail->mrp}}</span>
                        <span class="price_wrapper">Price: ₹  {{$detail->retail}}</span>
                        <div class="avalibility_and_features--wrapper">
                           <div class="avalability_wrapper">
                           @php $stock = ($detail->quantity >= 1) ? "Instock" : "Outstock" ;
                                $color = ($detail->quantity >= 1) ? "green" : "red" ;
                           @endphp
                              <span class="avalible_brands" >Availability: <span class="status_ok" style="color:{{$color}};">{{$stock}}</span></span>
                              <span class="avalible_brands">Brand: <span class="status_ok">{{$detail->mrp}}</span></span>
                              <div class="weights_wrapper">
                                 <span class="weights">Weight (g):</span>
                                 <div class="weights_in_grams weights_avb">100</div>
                                 <div class="weights_in_grams">150</div>
                                 <div class="weights_in_grams">200</div>
                              </div>
                           </div>
                        </div>
                        <div class="add_cart_and_quantity--wrapper">
                           <div class="quantity add_quantity">
                              <a href="#" class="quantity-status quantity__minus"><span>-</span></a>
                              <input name="quantity" type="text" class="quantity__input" value="0" disabled>
                              <a href="#" class="quantity-status quantity__plus"><span>+</span></a>
                           </div>
                           <a href="cart-page-v2.html" class="add_to_cart--btn">ADD TO CART</a>
                           <a class="like_wrapper" href="#" onclick="document.getElementById('wishlist_form_{{ $detail->product_id }}').submit(); return false;">
                                 <form id="wishlist_form_{{ $detail->product_id }}" method="POST" action="{{ route('add_wishlist') }}">
                                    @csrf
                                    <input name="product_id" type="hidden" value="{{ $detail->product_id }}">
                                    <img src="{{ asset('user_asset/images/svg/arrival-like.svg') }}" alt="heart" width="23" height="20">
                                 </form>
                              </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>





<section class="product_details_tab--wrapper">
   <div class="horizontal_line"></div>
   <div class="container">
      <div class="product_tabs--wrapper">
         <ul class="nav tab_btns" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
               <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Description</a>
            </li>
        
         </ul>
         <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
               <div class="description_wrapper">
                  <p>
                     {!! $detail->description !!}
                  </p>
               </div>
            </div>
        
         </div>
      </div>
   </div>
   <div class="horizontal_line"></div>
</section>
<section class="related_products--wrapper">
   <div class="container">
      <h2 class="related_products--title">
         <span class="related">Related Products</span>
      </h2>
      <div class="row" data-aos="fade-up">
         <div class="row inner_grid--row">
            @php 
            $related_product = App\Models\ProductModel::where('category_id', $detail->category_id)
               ->where('product_id', '!=', $detail->product_id)
               ->get();
            @endphp
            @foreach($related_product as $relate)
            <div class="col-md-6 col-xl-4 grid_col">
               <div class="grid_col--wrapper" data-aos="fade-up">
                  <div class="discount_like--wrapper">
                     <span class="discount_wrapper"></span>
                     <a class="like_wrapper" href="#" onclick="document.getElementById('wishlist_form_{{ $relate->product_id }}').submit(); return false;">
                        <form id="wishlist_form_{{ $relate->product_id }}" method="POST" action="{{ route('add_wishlist') }}">
                           @csrf
                           <input name="product_id" type="hidden" value="{{ $relate->product_id }}">
                           <img src="{{ asset('user_asset/images/svg/arrival-like.svg') }}" alt="heart" width="23" height="20">
                        </form>
                     </a>
                  </div>
                  <div class="product_img--item">
                     <a href="{{ route('product_details', ['id' => $relate->product_id]) }}">
                        <img src="{{ asset($relate->image) }}" alt="items">
                     </a>
                  </div>
                  <div class="product_title_with_price--wrapper">
                     <h3 class="product_item--title">{{ $relate->product_name }}</h3>
                  </div>
                  <div class="order_placement--wrapper">
                     <div class="order_wrapper">
                        <span class="product_item--price">₹ {{ $relate->retail }}</span>
                     </div>
                     <span class="product_item--price">{{ $relate->weight }}</span>
                  </div>
                  <div class="buy_now--wrapper">
                     <a href="cart-page-v2.html" class="buy_now--btn">ADD TO CART</a>
                  </div>
               </div>
            </div>
            @endforeach
            <div class="col-12">
               <div class="row row_pagination">
                  <div class="col-md-7">
                     <div class="product_pagination--wrapper">
                        <ul class="pagination">
                           <li class="page-item disabled">
                              <a class="page-link" href="#" tabindex="-1">
                              <img data-src="{{ asset('user_asset/images/svg/product-arrow-left.svg') }}" alt="arrow-left" class="lazyload" width="10" height="10">
                              </a>
                           </li>
                           <li class="page-item active">
                              <a class="page-link" href="#">1</a>
                           </li>
                           <!-- Uncomment if needed
                           <li class="page-item">
                              <a class="page-link" href="#">2</a>
                           </li>
                           <li class="page-item">
                              <a class="page-link" href="#">3</a>
                           </li>
                           <li class="page-item">
                              <a class="page-link" href="#">4</a>
                           </li>
                           <li class="page-item">
                              <a class="page-link" href="#">5</a>
                           </li>
                           <li class="page-item">
                              <a class="page-link" href="#">6</a>
                           </li>
                           -->
                           <li class="page-item">
                              <a class="page-link" href="#">
                              <img data-src="{{ asset('user_asset/images/svg/product-arrow-right.svg') }}" alt="arrow-right" class="lazyload" width="10" height="10">
                              </a>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-md-5">
                     <div class="paginate_items--wrapper">
                        <span class="showing_items--wrapper">
                        Showing
                        <span class="showing_no--from">1</span>-<span class="showing_no--to">6</span>
                        of
                        <span class="showing_total--items">20</span>
                        results
                        </span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

@endsection
@section('script')
<script src="{{ asset('user_asset/js/vendor/jquery-3.5.1.min.js')}}"></script>
<script src="{{ asset('user_asset/js/vendor/bootstrap.min.js')}}"></script>
<script src="{{ asset('user_asset/js/vendor/bowser.min.js')}}"></script>
<script src="{{ asset('user_asset/js/vendor/lazysizes.min.js')}}"></script>
<script src="{{ asset('user_asset/js/vendor/swiper.min.js')}}"></script>
<script src="{{ asset('user_asset/js/vendor/aos.min.js')}}"></script>
<script src="{{ asset('user_asset/js/vendor/aos.init.js')}}"></script>
<script src="{{ asset('user_asset/js/pages/increment-decrement.js')}}"></script>
<script src="{{ asset('user_asset/js/pages/product-swiper.js')}}"></script>
<script src="{{ asset('user_asset/js/main.js')}}"></script>

<script>
   document.addEventListener('DOMContentLoaded', () => {
       const itemsPerPage = 10; // Number of items to display per page
       const items = Array.from(document.querySelectorAll('.grid_col')); // Convert NodeList to Array
       const totalItems = items.length;
       const totalPages = Math.ceil(totalItems / itemsPerPage);
       
       const paginationList = document.querySelector('.pagination');
       const showingFrom = document.querySelector('.showing_no--from');
       const showingTo = document.querySelector('.showing_no--to');
       const showingTotal = document.querySelector('.showing_total--items');
   
       function showPage(page) {
           items.forEach((item, index) => {
               item.style.display = (index >= (page - 1) * itemsPerPage && index < page * itemsPerPage) ? 'block' : 'none';
           });
           updatePagination(page);
           updateItemCount(page);
       }
   
       function updatePagination(currentPage) {
           const pageItems = paginationList.querySelectorAll('.page-item');
           pageItems.forEach((item, index) => {
               if (index === 0) {
                   item.classList.toggle('disabled', currentPage === 1); // Disable "Previous" if on the first page
               } else if (index === pageItems.length - 1) {
                   item.classList.toggle('disabled', currentPage === totalPages); // Disable "Next" if on the last page
               } else {
                   item.classList.toggle('active', item.textContent == currentPage); // Highlight current page
               }
           });
       }
   
       function updateItemCount(currentPage) {
           const start = (currentPage - 1) * itemsPerPage + 1;
           const end = Math.min(currentPage * itemsPerPage, totalItems);
           showingFrom.textContent = start;
           showingTo.textContent = end;
           showingTotal.textContent = totalItems;
       }
   
       function createPagination() {
           // Remove existing page links except the previous and next buttons
           paginationList.innerHTML = '';
           
           const prevPageItem = document.createElement('li');
           prevPageItem.className = 'page-item';
           prevPageItem.innerHTML = '<a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a>';
           prevPageItem.addEventListener('click', (event) => {
               event.preventDefault();
               const currentPage = parseInt(paginationList.querySelector('.page-item.active .page-link').textContent);
               if (currentPage > 1) showPage(currentPage - 1);
           });
           paginationList.appendChild(prevPageItem);
           
           for (let i = 1; i <= totalPages; i++) {
               const pageItem = document.createElement('li');
               pageItem.className = 'page-item';
               if (i === 1) pageItem.classList.add('active');
   
               const pageLink = document.createElement('a');
               pageLink.className = 'page-link';
               pageLink.href = '#';
               pageLink.textContent = i;
               pageLink.addEventListener('click', (event) => {
                   event.preventDefault();
                   showPage(i);
               });
   
               pageItem.appendChild(pageLink);
               paginationList.appendChild(pageItem);
           }
   
           const nextPageItem = document.createElement('li');
           nextPageItem.className = 'page-item';
           nextPageItem.innerHTML = '<a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a>';
           nextPageItem.addEventListener('click', (event) => {
               event.preventDefault();
               const currentPage = parseInt(paginationList.querySelector('.page-item.active .page-link').textContent);
               if (currentPage < totalPages) showPage(currentPage + 1);
           });
           paginationList.appendChild(nextPageItem);
       }
   
       createPagination();
       showPage(1);
   });
</script>
@endsection