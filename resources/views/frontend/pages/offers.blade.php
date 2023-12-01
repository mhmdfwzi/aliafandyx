<x-front-layout>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/shop_grid.css') }} " />
    @endpush

    <x-slot name="breadcrumbs">


        <!-- Start Breadcrumbs -->
        <div class="breadcrumbs">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="breadcrumbs-content">
                            <h1 class="page-title">{{ trans('offers_trans.Offers') }}</h1>
                        </div>
                    </div>
                    {{-- <div class="col-lg-6 col-md-6 col-12">
                              <ul class="breadcrumb-nav">
                                  <li><a href="{{ Route('home') }}"><i class="lni lni-home"></i> Home</a></li>
                                  <li><a href="">Shop</a></li>
                                  <li>Shop Grid</li>
                              </ul>
                          </div> --}}
                </div>
            </div>
        </div>
        <!-- End Breadcrumbs -->
    </x-slot>

    <x-frontend.alert type="error" />

    <x-frontend.alert type="success" />

    <!-- Start Product Grids -->
    <section class="product-grids section">
        <div class="container">


            <div class="row">

                <div class="col-lg-3 col-12">

                    <div class="product-sidebar">

                        <!-- Start Product reset -->
                        <div class="single-widget" style="display: flex; justify-content: center; align-items: center;">
                            <div class="button "> <a href="" class="btn"> Reset Filters </a> </div>
                        </div>
                        <!-- End Product reset -->

                        <!-- Start Product search -->
                        <div class="single-widget search">
                            <h3> {{ trans('offers_trans.Search_Product') }} </h3>
                            <form action="#">
                                <input type="text" name="search"id="search"
                                    placeholder=" {{ trans('offers_trans.Search_Here') }} ">
                                {{-- <button type="submit"><i class="lni lni-search-alt"></i></button> --}}
                            </form>
                        </div>
                        <!-- End Product search -->

                        <!-- Start Categories Filter -->
                        <div class="single-widget">
                            <h3>{{ trans('offers_trans.All_Categories') }}</h3>

                            <ul class="list">
                                @foreach ($categories as $category)
                                    @if ($category->parent_id === null)
                                        <li>
                                            {{-- <input type="checkbox" value="{{ $category->id }}" name="category[]"
                                                      class="category" @checked($category_id == $category->id)> --}}
                                            <label for="">{{ $category->name }}
                                                ({{ $category->products()->count() }})</label>

                                            @if ($category->children->count() > 0)
                                                <ul class="list" style="margin-left: 10px;">
                                                    @foreach ($category->children as $child)
                                                        <li class="m-0">
                                                            <input type="checkbox" value="{{ $child->id }}"
                                                                name="category[]" class="category"
                                                                @checked($category_id == $child->id)>
                                                            <label for="">{{ $child->name }}
                                                                ({{ $child->products()->count() }})
                                                            </label>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>

                        <!-- End Categories Filter -->






                        <!-- Start stores Filter -->
                        <div class="single-widget">
                            <h3>All Stores </h3>
                            <ul class="list">
                                @foreach ($stores as $store)
                                    <li>
                                        <input type="checkbox" value="{{ $store->id }}" name="store[]"
                                            class="store" @checked($store_id == $store->id)>
                                        <label for="">{{ $store->name }}
                                            {{-- ({{ $vendor->products()->count() }} ) --}}
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- End stores Filter -->


                        <!-- Start Brand Filter -->
                        <div class="single-widget condition">
                            <h3>Filter by Brand</h3>
                            <ul class="list">
                                @foreach ($brands as $brand)
                                    <li>
                                        {{-- <input type="radio" class="brands" name="brand" value="{{ $brand->id }}"> --}}
                                        <input type="checkbox" value="{{ $brand->id }}" name="brand[]"
                                            class="brand">
                                        <label>
                                            {{ $brand->name }}
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- End Brand Filter -->



                        <!-- Start Price Filter -->
                        <div class="single-widget range">
                            <h3>Price Range</h3>
                            <div class="middle">
                                <div id="multi_range">
                                    <span id="left_value">0</span><span> ~ </span><span id="right_value">10000</span>
                                </div>
                                <div class="multi-range-slider my-2">
                                    <input type="range" id="input_left" class="range_slider" min="0"
                                        max="5000" value="0" onmousemove="left_slider(this.value)">
                                    <input type="range" id="input_right" class="range_slider" min="5000"
                                        max="10000" value="10000" onmousemove="right_slider(this.value)">
                                    <div class="slider">
                                        <div class="track"></div>
                                        <div class="range"></div>
                                        <div class="thumb left"></div>
                                        <div class="thumb right"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Price Filter -->



                    </div>

                </div>
                <!-- End Product Sidebar -->


                <!-- Start Products section -->
                <div class="col-lg-9 col-12">
                    <div class="product-grids-head">
                       

                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-grid"
                                role="tabpanel"aria-labelledby="nav-grid-tab">
                                <div class="show_filtered_products">
                                    {{-- @include('frontend.pages.show_products') --}}


                                    <div class="row show_products">
                                        @forelse ($products as $product)
                                            <div class="col-lg-4 col-md-6 col-12">
                                                <!-- Start Single Product -->
                                                <div class="single-product">
                                                    @if ($product->sale_percent)
                                                            <span class="sale-tag">- {{ $product->sale_percent }} %</span>
                                                        @endif
                                                    <div class="product-image">
                                                         
                                                        <a href="{{ Route('products.show_product', $product->slug) }}">
                                                        <img src="{{ $product->image_url }}" alt="#">
                                                        </a>
                                                    </div>
                                                    <div class="product-info">

                                                        <h4 class="title">
                                                            <a href="{{ Route('products.show_product', $product->slug) }}">{{ $product->name }}</a>
                                                        </h4>
                                                        <span
                                                            class="category"> 
                                                            
                                                            <a
                                                                href="{{ route('offers.index', ['categoryId' => $product->category->id]) }}">
                                                                {{ $product->category->name }}
                                                            </a>
                                                         من: 
                                                            <a
                                                                href="{{ route('offers.store', ['storeId' => $product->store->id]) }}">
                                                                {{ $product->store->name }}
                                                            </a>
                                                        </span>
 
 
                                                        <div class="price">
                                                            <span>{{ Currency::format($product->price) }}</span>
                                                            @if ($product->compare_price)
                                                                <span
                                                                    class="discount-price">{{ Currency::format($product->compare_price) }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Single Product -->
                                            </div>

                                        @empty
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div>
                                                        There are no products
                                                    </div>
                                                </div>
                                            </div>
                                        @endforelse
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <!-- Pagination -->
                                            <div class="pagination center">
                                                <ul class="pagination-list">
                                                    {{ $products->links() }}
                                                </ul>
                                            </div>
                                            <!--/ End Pagination -->
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
    <!-- End Product Grids -->




    @push('scripts')
        <script src="{{ asset('backend/assets/js/jquery-3.6.0.min.js') }}"></script>
        <script>
            const input_left = document.getElementById("input_left");
            const input_right = document.getElementById("input_right");
            const thumb_left = document.querySelector(".slider > .thumb.left");
            const thumb_right = document.querySelector(".slider > .thumb.right");
            const range = document.querySelector(".slider > .range");

            const set_left_value = () => {
                const _this = input_left;
                const [min, max] = [parseInt(_this.min), parseInt(_this.max)];

                _this.value = Math.min(parseInt(_this.value), parseInt(input_right.value) - 1);

                const percent = ((_this.value - min) / (max - min)) * 100;
                thumb_left.style.left = percent + "%";
                range.style.left = percent + "%";
            };
            const set_right_value = () => {
                const _this = input_right;
                const [min, max] = [parseInt(_this.min), parseInt(_this.max)];

                _this.value = Math.max(parseInt(_this.value), parseInt(input_left.value) + 1);

                const percent = ((_this.value - min) / (max - min)) * 100;
                thumb_right.style.right = 100 - percent + "%";
                range.style.right = 100 - percent + "%";
            };

            input_left.addEventListener("input", set_left_value);
            input_right.addEventListener("input", set_right_value);

            function left_slider(value) {
                document.getElementById('left_value').innerHTML = value;
            }

            function right_slider(value) {
                document.getElementById('right_value').innerHTML = value;
            }


            $(document).ready(function() {

                // apply filters function
                function applyFilters() {
                    var category = $('.category:checked').map(function() {
                        return $(this).val();
                    }).get();
                    var brand = $('.brand:checked').map(function() {
                        return $(this).val();
                    }).get();

                    var store = $('.store:checked').map(function() {
                        return $(this).val();
                    }).get();
                    var minPrice = $('#left_value').text();
                    var maxPrice = $('#right_value').text();
                    var search = $('#search').val();
                    var sort = $('#sort').val();

                    $.ajax({
                        url: "{{ route('offers_filters') }}",
                        type: "GET",
                        data: {
                            category: category,
                            brand: brand,
                            store: store,
                            min_price: minPrice,
                            max_price: maxPrice,
                            search: search,
                            sort: sort
                        },
                        success: function(response) {
                            console.log(response.products.data.length);

                            var product_length = response.products.data.length;
                            var products = response.products.data;
                            var html = ''; // Variable to store the updated HTML
                            for (var i = 0; i < product_length; i++) {
                                var product = products[i];
                                console.log(product.sale_percent);
                                // Create HTML elements to display product information
                                var productHtml =
                                        '<div class="col-lg-4 col-md-6 col-12">' +
                                        '<!-- Start Single Product -->' +
                                        '<div class="single-product">';
                                            if (product.sale_percent) {
                                        productHtml += '<span class="sale-tag">- ' + product .sale_percent +
                                            ' %</span>';
                                    }
                                    productHtml +='<div class="product-image">'+                                   
                                    '<a href="' + getProductRoute(product.slug) + '">'+
                                        '<img src="' + product.image_url + '" alt="#">'+
                                        '</a>' +
                                        '</div>' +
                                    '<div class="product-info">' +
                                    '<h4 class="title">' +
                                    '<a href="' + getProductRoute(product.slug) + '">' + product.name +
                                    '</a>' +
                                    '</h4>' +
                                    '<span class="category">' +
                                    '<a href="{{ route('shop_grid.index', ['categoryId' => $product->category->id]) }}">' +
                                    (product.category ? product.category.name : '') +
                                    '</a>' +
                                    ' من:' + 
                                    '<a href="{{ route('shop_grid.indexStore', ['storeId' => $product->store->id]) }}">' +
                                    (product.store ? product.store.name : '') +
                                    '</a>' +
                                    '</span>' +

                                    
                                    '<div class="price">' +
                                    '<span>' + product.formatted_price + '</span>';

                                    if (product.formatted_compare_price > product.formatted_price) {
                                    productHtml += '<span class="discount-price">' + product
                                        .formatted_compare_price +
                                        '</span>';
                                }

                                productHtml +=
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>';

                                html += productHtml;
                            }

                            function getProductRoute(slug) {
                                return '{{ route('products.show_product', '') }}/' + slug;
                            }
                            // Update the HTML with the new results
                            $('.show_products').html(html);

                            // Update pagination links
                            $('.pagination-list').html(response.pagination_links);
                        },
                    });
                }




                function paginate() {

                    $(document).on('click', '.pagination a', function(event) {
                        event.preventDefault();
                        var url = $(this).attr('href');
                        // var category = $('.category:checked').map(function() {return $(this).val(); }).get();
                        getProducts(url);
                    });

                    function getProducts(url) {
                        $.ajax({
                            url: url,
                            type: 'GET',
                            success: function(response) {

                                var product_length = response.products.data.length;

                                var products = response.products.data;

                                // console.log(response.products);

                                var html = ''; // Variable to store the updated HTML

                                for (var i = 0; i < product_length; i++) {
                                    var product = products[i];


                                    // Create HTML elements to display product information
                                    var productHtml =
                                        '<div class="col-lg-4 col-md-6 col-12">' +
                                        '<!-- Start Single Product -->' +
                                        '<div class="single-product">';
                                            if (product.sale_percent) {
                                        productHtml += '<span class="sale-tag">- ' + product .sale_percent +
                                            ' %</span>';
                                    }
                                    productHtml +='<div class="product-image">'+                                   
                                    '<a href="' + getProductRoute(product.slug) + '">'+
                                        '<img src="' + product.image_url + '" alt="#">'+
                                        '</a>' +
                                        '</div>' +
                                    '<div class="product-info">' +
                                    '<h4 class="title">' +
                                    '<a href="' + getProductRoute(product.slug) + '">' + product.name +
                                    '</a>' +
                                    '</h4>' +
                                    '<span class="category">' +
                                    '<a href="{{ route('shop_grid.index', ['categoryId' => $product->category->id]) }}">' +
                                    (product.category ? product.category.name : '') +
                                    '</a>' +
                                    ' من:' + 
                                    '<a href="{{ route('shop_grid.indexStore', ['storeId' => $product->store->id]) }}">' +
                                    (product.store ? product.store.name : '') +
                                    '</a>' +
                                    '</span>' +

 
                                        '<div class="price">' +
                                        '<span>' + product.formatted_price + '</span>';

                                    if (product.formatted_compare_price > product.formatted_price) {
                                        productHtml += '<span class="discount-price">' + product
                                            .formatted_compare_price +
                                            '</span>';
                                    }

                                    productHtml += '</div>' +
                                        '</div>' +
                                        '</div>' +
                                        '</div>' +
                                        '</div>';

                                    html += productHtml;
                                }

                                function getProductRoute(slug) {
                                    return '{{ route('products.show_product', '') }}/' + slug;
                                }

                                // Update the HTML with the new results
                                $('.show_products').html(html);

                                // Update pagination links
                                $('.pagination-list').html(response.pagination_links);

                            },
                        });
                    }
                }



                // Reset filters
                $('.button').on('click', function(e) {
                    e.preventDefault();
                    $('input.category, input.brand , input.store').prop('checked', false);
                    $('#search').val('');
                    applyFilters();
                });

                // Apply search filter
                $('#search').on('keyup', function() {
                    applyFilters();
                });

                // Apply category filter
                $('input.category').on('change', function() {
                    applyFilters();
                    paginate();
                });

                // Apply store filter
                $('input.store').on('change', function() {
                    applyFilters();
                    paginate();
                });

                // Apply brand filter
                $('input.brand').on('change', function() {
                    applyFilters();
                });

                // Apply sort filter
                $('#sort').on('change', function() {
                    applyFilters();
                });

                // Apply price range filter
                $('.range_slider').on('change', function() {
                    applyFilters();
                });

                // Initialize filters
                applyFilters();

                paginate();




            });
        </script>
    @endpush
</x-front-layout>