<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>{{ $title }}</title>
    <meta name="description" content="{{ $title }}" />
    <meta name="keyword" content="{{ $title }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/images/favicon.png') }}" />

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }} " />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/LineIcons.3.0.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/tiny-slider.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/glightbox.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}" /> 
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.6.3/css/ionicons.min.css">

    @if (App::getLocale() == 'en')
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/rtl.css') }}" />
    @else
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/rtl.css') }}" />
    @endif
    @push('styles')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <style>
        .ui-autocomplete {
            z-index: 1100;
            /* Adjust this value as needed to be higher than the modal */
            margin-right: 200px;
            width: 30%;


        }

        /* Style for the autocomplete container */
        .product-suggestion {
            display: flex;
            /* Use flexbox to arrange image and name in a row */
            flex-direction: row;
            /* Ensure a horizontal layout */
            align-items: center;
            /* Vertically center items within the suggestion container */
            padding: 5px;
            /* Add padding for spacing */
            border-bottom: 1px solid #ccc;
            /* Add a border between suggestions */
        }

        /* Style for the product image */
        .product-image {
            /* width: 50px; */
            /* Adjust the width as needed */
            /* height: 50px; */
            /* Adjust the height as needed */
            margin-right: 10px;
            /* Add margin for spacing between image and name */
        }

        /* Style for the product name */
        .product-name {
            font-weight: bold;
            /* Make the name text bold */
        }
    </style>
 


    @stack('styles')

</head>

<body>
    <!--[if lte IE 9]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->

    <!-- Preloader -->
    <div class="modal fade review-modal" id="SearchModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">

            <div class="modal-content">
                <div class="modal-header">
                    <div class="form-group input-group">
                                 
                        <input class="form-control" type="text"  id="search"
                          placeholder=" انتا بتدور على ايه؟  "    autofocus style="direction: ltr; text-align:right">
                    </div>
                     
                   
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

 
            </div>
        </div>
    </div>

    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>

    <!-- /End Preloader -->

    <!-- Start Header Area -->
    <header class="header">
        <div class="container">
            <div class="wrapper">
                <div class="header-item-left">
                    <a class="navbar-brand" href="{{ Route('home') }}">
                        <img src="{{ asset('frontend/assets/images/logo/logo.png') }}" alt="Logo">
                    </a>
                </div>
                <!-- Section: Navbar Menu -->
                <div class="header-item-center">
                    <div class="overlay"></div>
                    <nav class="menu">
                        <div class="menu-mobile-header">
                            <button type="button" class="menu-mobile-arrow"><i
                                    class="ion ion-ios-arrow-back"></i></button>
                            <div class="menu-mobile-title">aliafandy</div>
                            <button type="button" class="menu-mobile-close"><i class="ion ion-ios-close"></i></button>
                        </div>
                        <ul class="menu-section" style="direction: rtl">
							
                            <li class="menu-item-has-children">
                                <a href="#">حسابي <i class="ion ion-ios-arrow-down"></i></a>
                                <div class="menu-subs menu-column-1">
                                    <ul>
                                        @auth('web')
                                            <li>
                                                <i class="lni lni-user"></i>
                                                <a href="{{ Route('profile.edit') }}">
                                                    {{ Auth::user('user')->first_name }} </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();document.getElementById('logout').submit()">
                                                    <i class="text-danger ti-unlock"></i>
                                                    Sign Out
                                                </a>
                                            </li>


                                            <form method="POST" action="{{ route('logout') }}" id="logout"
                                                style="display:none">
                                                @csrf
                                            </form>
                                        @else
                                            <li>
                                                <a href="{{ Route('login') }}"> <i class="mdi mdi-login"> </i>
                                                    {{ trans('front_home_trans.Sign_In') }}</a>
                                            </li>
                                            <li>
                                                <a
                                                    href="{{ Route('register') }}">{{ trans('front_home_trans.Register') }}</a>
                                            </li>
                                        @endauth

 
                                        
                                        <li class="nav-item"><a href="{{ Route('jobs.create') }}"><i
                                                    class="ion ion-md-checkmark">
                                                </i>الوظائف</a></li>

                                    </ul>
                                </div>
                            </li>
							<li><a href="{{ Route('offers.index') }}">العروض</a></li>
          					<li class="nav-item"><a href="{{ Route('shop_grid.index') }}">
							  معرض المنتجات</a></li>



                            @foreach ($main_categories as $main_category)

                            
                            <li class="menu-item-has-children contacts">   
                                <a href="#">{{ $main_category->name }}  <i class="ion ion-ios-arrow-down"></i></a>
                                <div class="menu-subs menu-column-1">
                                    <ul>
                                        @php
                                        $sub_categories = App\Models\Category::where('parent_id', $main_category->id)->get();
                                        @endphp
                                                                        @foreach ($sub_categories as $sub_category)
                                                                                <li><a href="{{ Route('shop_grid.index', $sub_category->id) }}">{{ $sub_category->name }}</a></li>
                                                                             
                                                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                        @endforeach
                            


                        <li class="menu-item-has-children category_menu ">
                            <a href="#">التصنيفات <i class="ion ion-ios-arrow-down"></i></a>
                            <div class="menu-subs menu-mega menu-column-4" style="direction: rtl">
                                @foreach ($main_categories as $main_category)
                                    <div class="list-item">
                                        <h4 class="title">{{ $main_category->name }}</h4>
                                        <ul>
                                            @php
            $sub_categories = App\Models\Category::where('parent_id', $main_category->id)->get();
            @endphp
                                            @foreach ($sub_categories as $sub_category)
                                                    <li><a href="{{ Route('shop_grid.index', $sub_category->id) }}">{{ $sub_category->name }}</a></li>
                                                 
                                            @endforeach
                                        </ul>
                                    </div>
                                @endforeach
                            </div>
                        </li>

                        <li class="menu-item-has-children contacts  category_menu">
                            <a href="#">تواصل معنا <i class="ion ion-ios-arrow-down"></i></a>
                            <div class="menu-subs menu-column-1">
                                <ul>
                                    <li>
                                        <a href="https://www.facebook.com/profile.php?id=100092454938621"><i
                                                class="lni lni-facebook-filled"></i></a>
                                        <a href="#"><i class="lni lni-youtube"></i></a>
                                        <a href="#"><i class="lni lni-instagram-filled"></i></a>

                                    </li>

                                    <li> <i class="mdi mdi-phone-in-talk"></i> 01555361715 </li>

                                </ul>
                            </div>
                        </li>

                        </ul>
                    </nav>
                    <div class="nav-social">
                        <ul>
                            <li>
                                <a href="https://www.facebook.com/profile.php?id=100092454938621"><i
                                        class="lni lni-facebook-filled"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><i class="lni lni-youtube"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><i class="lni lni-instagram-filled"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><i class="lni lni-phone"></i></a>
                            </li>
                            <li> <i class="mdi mdi-phone-in-talk"></i> 01555361715 </li>



                        </ul>
                    </div>
                </div>

                

                <div class="navbar-cart">
                     <div class="wishlist" style="padding-right: 10px">
                    <button type="button" class="btn   " data-bs-toggle="modal"
                    data-bs-target="#SearchModal">
                    <i class="lni lni-search-alt"></i>
                </button></div>

                    <x-frontend.cart-menu> </x-frontend.cart-menu>
                </div>
                <div class="header-item-right">
                    <button type="button" class="menu-mobile-trigger">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>

            </div>
        </div>
    </header>

    
    <!-- End Header Area -->

    <div style="height:75px;"></div>







    <!-- Start Breadcrumbs -->
    {{ $breadcrumbs ?? '' }}
    <!-- End Breadcrumbs -->



    {{ $slot }}


    <!-- Start Footer Area -->
    <footer class="footer">
  
        <!-- End Footer Top -->


        <!-- Start Footer Middle -->
        <div class="footer-middle">
            <div class="container">
                <div class="bottom-inner">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer f-contact">
                                <h3>Get In Touch With Us</h3>
                                <p class="phone">Phone: 01555361715</p>
                                <p class="mail">
                                    <a href="mailto:support@aliafandy.com">support@aliafandy.com</a>
                                </p>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer our-app">
                                <h3>Our Mobile App</h3>
                                <ul class="app-btn">
                                    <li>
                                        <a href="https://play.google.com/store/apps/details?id=com.aliafandy&pcampaignid=web_share">
                                            <i class="lni lni-play-store"></i>
                                            <span class="small-title">Download on the</span>
                                            <span class="big-title">Google Play</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer f-link">
                                <h3>Information</h3>
                                <ul>
                                    <li><a href="javascript:void(0)">About Us</a></li>
                                    <li><a href="javascript:void(0)">Contact Us</a></li>
                                    <li><a href="javascript:void(0)">Downloads</a></li>
                                    <li><a href="javascript:void(0)">Sitemap</a></li>
                                    <li><a href="javascript:void(0)">FAQs Page</a></li>
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer f-link">
                                <h3>Shop Departments</h3>
                                <ul>
                                    <li><a href="javascript:void(0)">Computers & Accessories</a></li>
                                    <li><a href="javascript:void(0)">Smartphones & Tablets</a></li>
                                    <li><a href="javascript:void(0)">TV, Video & Audio</a></li>
                                    <li><a href="javascript:void(0)">Cameras, Photo & Video</a></li>
                                    <li><a href="javascript:void(0)">Headphones</a></li>
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Middle -->



        <!-- Start Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="inner-content">
                    <div class="row align-items-center">
                        <div class="col-lg-4 col-12">
                            <div class="payment-gateway">
                                <span>We Accept:</span>
                                <img src="{{ asset('frontend/assets/images/footer/credit-cards-footer.png') }}"
                                    alt="#">
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="copyright">
                                <p>Designed and Developed by<a href="https://aliafandy.com/"
                                        rel="nofollow">Aliafandy</a></p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <ul class="socila">
                                <li>
                                    <span>Follow Us On:</span>
                                </li>
                                <li><a href="https://www.facebook.com/profile.php?id=100092454938621"><i
                                            class="lni lni-facebook-filled"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="lni lni-instagram"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="lni lni-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Bottom -->
    </footer>
    <!--/ End Footer Area -->

    <!-- ========================= scroll-top ========================= -->
 
    <!-- ========================= JS here ========================= -->
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/tiny-slider.js') }}"></script> 
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/script.js') }}"></script> 
    <script src="{{ asset('backend/assets/js/jquery-3.6.0.min.js') }}"></script> 
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <script>
            $.noConflict();
            jQuery(document).ready(function($) {
                $("#search").autocomplete({
                    source: function(request, response) {
                        // Send an AJAX request to fetch matching product data
                        $.ajax({
                            url: "{{ route('products.autocomplete') }}", // Replace with the actual route
                            dataType: "json",
                            data: {
                                term: request.term,
                            },
                            success: function(data) {
                                var mappedData = $.map(data, function(item) {
                                    // Create a custom HTML element for each suggestion
                                    var suggestionHtml =
                                        '<div class="product-suggestion">' +
                                        '<div class="product-image-container">' +
                                        '<img width="50" height="50" src="' + item
                                        .image_url +
                                        '" class="product-image" alt="Product Image">' +
                                        '</div>' +
                                        '<div class="product-details">' +
                                        '<div class="product-name">' + item.name +
                                        '</div>' +
                                        '</div>' +
                                        '</div>';
                                    return {
                                        label: item
                                            .name, // Displayed in the autocomplete dropdown
                                        value: item
                                            .id, // Value placed in the input field when selected
                                        html: suggestionHtml, // Custom HTML for the suggestion
                                        slug: item.slug,
                                    };
                                });
                                // Display autocomplete suggestions with custom HTML
                                response(mappedData);
                            },
                        });
                    },
                    minLength: 1,
                    position: {
                        my: "left top+5",
                        at: "left bottom",
                    },
                    width: 300, // Adjust the width as needed
                    autoFill: true,
                    select: function(event, ui) {
                        $("#search").val(ui.item.label); // Set the product name in the input field
                        // Navigate to the product details page
                        window.location.href = "{{ route('products.show_product', '') }}/" + ui.item.slug;
                        // Prevent the default behavior of the autocomplete widget
                        return false;
                    },
                }).data("ui-autocomplete")._renderItem = function(ul, item) {
                    // Append the custom HTML to the autocomplete dropdown
                    return $("<li>")
                        .append(item.html)
                        .appendTo(ul);
                };
            })
        </script>
    <script>
        const navLinks = document.querySelectorAll('.nav-item a');

        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                // Remove active class from all links
                navLinks.forEach(link => link.classList.remove('active'));

                // Add active class to the clicked link
                this.classList.add('active');
            });
        });
    </script>



    @stack('scripts')

</body>

</html>