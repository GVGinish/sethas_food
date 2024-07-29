@extends('website.layout2')

@section('link')
<link rel="stylesheet" href="{{ asset('user_asset/css/vendor/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('user_asset/css/vendor/swiper.min.css')}}">
<link rel="stylesheet" href="{{ asset('user_asset/css/vendor/aos.min.css') }}">
<link rel="stylesheet" href="{{ asset('user_asset/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('user_asset/css/layouts/default-nav.css') }}">
<link rel="stylesheet" href="{{ asset('user_asset/css/layouts/default-footer.css') }}">
<link rel="stylesheet" href="{{ asset('user_asset/css/components/common-banner.css') }}">
<link rel="stylesheet" href="{{ asset('user_asset/css/components/product-listing-sidebar.css') }}">
<link rel="stylesheet" href="{{ asset('user_asset/css/themes/common.css') }}">
<link rel="stylesheet" href="{{ asset('user_asset/css/themes/button.css') }}">
<link rel="stylesheet" href="{{ asset('user_asset/css/pages/product-listing-grid.css') }}">
<link rel="stylesheet" href="{{ asset('user_asset/css/fonts/dairy-fonts.css') }}">
@endsection

@section('content')
<section class="common_banner--wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="banner_title">Our Products</h1>
                <nav class="breadcum_wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Our Products</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<section class="product_listing_grid--wrapper">
    <div class="container">
        <div class="row main_row">
            <div class="col-lg-3">
                <div class="product_widget--wrapper">
                    <aside class="product_widgets">
                        <h1 class="product_widgets--title">Categories</h1>
                        <ul class="product_widgets_list--wrapper">
                            <li class="product_widgets--list">
                                <label class="widget_label">
                                    <a href="{{ route('Products', ['id' => 'All']) }}" class="category-link">All</a>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            @foreach($category_list as $list)
                            <li class="product_widgets--list">
                                <label class="widget_label">
                                    <a href="{{ route('Products', ['id' => $list->category]) }}" class="category-link" data-category="{{ $list->category }}">
                                        {{ $list->category }}
                                    </a>
                                    <input type="checkbox" id="checkbox-{{ $list->category }}" class="category-checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            @endforeach
                        </ul>
                    </aside>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="product_grid--wrapper">
                    <div class="row inner_row">
                        <div class="col-sm-4">
                            <div class="product_title--wrapper">
                                <h1 class="product_title">{{ $category }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="row inner_grid--row">
                        @foreach ($all_pro as $all)
                        <a href="{{ route('product_details', ['id' => $all->product_id]) }}">
                           <div class="col-md-6 col-xl-4 grid_col">
                                 <div class="grid_col--wrapper" data-aos="fade-up">
                                       <div class="discount_like--wrapper">
                                          <span class="discount_wrapper"></span>
                                          <a class="like_wrapper" href="#" onclick="document.getElementById('wishlist_form_{{ $all->product_id }}').submit(); return false;">
                                             <form id="wishlist_form_{{ $all->product_id }}" method="POST" action="{{ route('add_wishlist') }}">
                                                   @csrf
                                                   <input name="product_id" type="hidden" value="{{ $all->product_id }}">
                                                   <img src="{{ asset('user_asset/images/svg/arrival-like.svg') }}" alt="heart" width="23" height="20">
                                             </form>
                                          </a>
                                       </div>
                                        <a href="{{ route('product_details', ['id' => $all->product_id]) }}">
                                          <div class="product_img--item">
                                             <img src="{{ asset($all->image) }}" alt="items">
                                          </div>
                                       </a>
                                       <div class="product_title_with_price--wrapper">
                                          <h3 class="product_item--title">{{ $all->product_name }}</h3>
                                       </div>
                                       <div class="order_placement--wrapper">
                                          <div class="order_wrapper">
                                             <span class="product_item--price">₹ {{ $all->retail }}</span>
                                          </div>
                                          <span class="product_item--price">{{ $all->weight }}</span>
                                       </div>
                                       <div class="buy_now--wrapper">
                                          <a class="buy_now--btn" href="#" onclick="document.getElementById('Cart_form_{{ $all->product_id }}').submit(); return false;">
                                             ADD TO CART
                                          </a>
                                          <form id="Cart_form_{{ $all->product_id }}" method="POST" action="{{ route('add_to_cart') }}" style="display:none;">
                                             @csrf
                                             <input name="product_id" type="hidden" value="{{ $all->product_id }}">
                                          </form>
                                       </div>
                                 </div>
                              </a>
                           </div>
                        </a>
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
                                            <!-- Add more pagination items here as needed -->
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
        </div>
    </div>
</section>
@endsection

@section('script')
<script src="{{ asset('user_asset/js/vendor/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('user_asset/js/vendor/bootstrap.min.js') }}"></script>
<script src="{{ asset('user_asset/js/vendor/bowser.min.js') }}"></script>
<script src="{{ asset('user_asset/js/vendor/lazysizes.min.js') }}"></script>
<script src="{{ asset('user_asset/js/vendor/aos.min.js') }}"></script>
<script src="{{ asset('user_asset/js/vendor/aos.init.js') }}"></script>
<script src="{{ asset('user_asset/js/pages/increment-decrement.js') }}"></script>
<script src="{{ asset('user_asset/js/main.js') }}"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const itemsPerPage = 10;
    const items = Array.from(document.querySelectorAll('.grid_col')); 
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
                item.classList.toggle('disabled', currentPage === 1); 
            } else if (index === pageItems.length - 1) {
                item.classList.toggle('disabled', currentPage === totalPages); 
            }
            item.classList.toggle('active', parseInt(item.textContent) === currentPage);
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
<script>
document.addEventListener('DOMContentLoaded', () => {
    function handleCategoryLinkClick(event) {
        event.preventDefault(); 

        const link = event.target.closest('.category-link');

        if (link) {
            const category = link.getAttribute('data-category');
            const checkbox = document.getElementById('checkbox-' + category);

            if (checkbox) {
                checkbox.checked = true;
            }

            window.location.href = link.href;
        }
    }

    const categoryLinks = document.querySelectorAll('.category-link');
    categoryLinks.forEach(link => {
        link.addEventListener('click', handleCategoryLinkClick);
    });
});
</script>
@endsection
