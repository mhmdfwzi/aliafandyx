<!-- Start Header Area -->
<header class="header navbar-area">

    <!-- Start Topbar -->
    <div class="topbar">
        <div class="container" style="display: block">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="top-left">
                        <ul class="menu-top-link">
                            {{-- <li> --}}
                            {{-- <ul>
                                          @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                              <li>
                                                  <a rel="alternate" hreflang="{{ $localeCode }}"
                                                      href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                      {{ $properties['native'] }}
                                                  </a>
                                              </li>
                                          @endforeach
                                      </ul> --}}

                            <div class="btn-group mb-1">
                                <button type="button" class="btn btn-secondary btn-sm dropdown-toggle"
                                    style="background-color: #081828" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    @if (App::getLocale() == 'ar')
                                        {{ LaravelLocalization::getCurrentLocaleName() }}
                                        <img src="{{ URL::asset('backend/assets/images/flags/EG.png') }}"
                                            alt="">
                                    @else
                                        {{ LaravelLocalization::getCurrentLocaleName() }}
                                        <img src="{{ URL::asset('backend/assets/images/flags/US.png') }}"
                                            alt="">
                                    @endif
                                </button>
                                <div class="dropdown-menu">
                                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                                            href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                            {{ $properties['native'] }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>

                            {{-- </li> --}}
                        </ul>
                    </div>
                </div>


                <div class="col-lg-4 col-md-4 col-12">
                    <div class="top-middle">
                        <ul class="useful-links">
                            <li><a href="">
                                    {{ trans('front_home_trans.Home') }}
                                </a></li>
                            <li><a href="">
                                    {{ trans('front_home_trans.About_Us') }}
                                </a></li>
                            <li><a href="">
                                    {{ trans('front_home_trans.Contact_Us') }}
                                </a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-12">
                    <div class="top-end">
                        @auth('web')
                            <div class="user">
                                <i class="lni lni-user"></i>
                                {{-- {{ Auth::guard('web')->user()->first_name }} --}}
                                <a href="{{ Route('profile.edit') }}">
                                    {{ Auth::user('user')->first_name }}
                                </a>
                            </div>
                            <div class="user">
                                <ul class="user-login">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();document.getElementById('logout').submit()">
                                            {{-- <i class="text-danger ti-unlock"></i> --}}
                                            Sign Out
                                        </a>
                                    </li>
                                </ul>

                                <form method="POST" action="{{ route('logout') }}" id="logout" style="display:none">
                                    @csrf
                                </form>
                            </div>
                        @else
                            <ul class="user-login">
                                <li>
                                    <a href="{{ Route('login') }}"> تسجيل دخول</a>
                                </li>
                                <li>
                                    <a href="{{ Route('register') }}">تسجيل حساب جديد</a>
                                </li>
                            </ul>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Topbar -->


    <!-- Start Header Middle -->
    <div class="header-middle">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-3 col-md-3 col-7">
                    <!-- Start Header Logo -->
                    <a class="navbar-brand" href="{{ Route('home') }}">
                        <img src="{{ asset('frontend/assets/images/logo/logo.svg') }}" alt="Logo">
                    </a>
                    <!-- End Header Logo -->
                </div>

                <div class="col-lg-5 col-md-7 d-xs-none">
                    <!-- Start Main Menu Search -->
                    <div class="main-menu-search">
                        <!-- navbar search start -->
                        <div class="navbar-search search-style-5">

                            <div class="search-input">
                                <input type="text" id="search" placeholder="Search">
                            </div>
                            <div class="search-btn">
                                <button><i class="lni lni-search-alt"></i></button>
                            </div>
                        </div>
                        <!-- navbar search Ends -->
                    </div>
                    <!-- End Main Menu Search -->
                </div>

                <div class="col-lg-4 col-md-2 col-5">
                    <div class="middle-right-area">
                        <div class="nav-hotline">
                            <i class="lni lni-phone"></i>
                            <h3>{{ trans('front_home_trans.Hotline') }}
                                <span>(+100) 123 456 7890</span>
                            </h3>

                        </div>
                        <div class="navbar-cart">
                            <div class="wishlist">
                                <a href="javascript:void(0)">
                                    <i class="lni lni-heart"></i>
                                    <span class="total-items">0</span>
                                </a>
                            </div>
                            <x-frontend.cart-menu>

                            </x-frontend.cart-menu>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Middle -->


    <!-- Start Header Bottom -->
    <div class="container header-bottom">
        <div class="row align-items-center">
            <div class="col-lg-8 col-md-6 col-12">
                <div class="nav-inner">

                    <!-- Start Mega Category Menu -->
                    <div class="mega-category-menu">
                        <span class="cat-button">
                            <i class="lni lni-menu"></i> التصنيفات
                        </span>
                        <ul class="sub-category">
                            @foreach ($categories as $category)
                                {{-- Check if the category has parent --}}
                                @if ($category->parent_id === null)
                                    {{-- Parent Category --}}
                                    <li>
                                        <a
                                            href="{{ route('shop_grid.index', $category->id) }}">{{ $category->name }}</a>
                                        <ul class="inner-sub-category">
                                            {{-- Find child categories --}}
                                            @foreach ($categories as $childCategory)
                                                @if ($childCategory->parent_id === $category->id)
                                                    <li><a
                                                            href="{{ route('shop_grid.index', $childCategory->id) }}">{{ $childCategory->name }}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <!-- End Mega Category Menu -->



                    <!-- Start Navbar -->
                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a href="{{ Route('home') }}" class="nav-link active"
                                        aria-label="Toggle navigation">{{ trans('front_home_trans.Home') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ Route('shop_grid.index') }}" class="nav-link"
                                        aria-label="Toggle navigation">معرض المنتجات</a>
                                </li>

                                <li class="nav-item"><a
                                        href="{{ Route('cart.index') }}">{{ trans('front_home_trans.Cart') }}</a>
                                </li>

                                <li class="nav-item"><a href="{{ Route('checkout.create') }}">
                                        {{ trans('front_home_trans.Checkout') }}
                                    </a></li>


                                <li class="nav-item">
                                    <a href=""
                                        aria-label="Toggle navigation">{{ trans('front_home_trans.Contact_Us') }}</a>
                                </li>


                            </ul>
                        </div> <!-- navbar collapse -->
                    </nav>
                    <!-- End Navbar -->
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <!-- Start Nav Social -->
                <div class="nav-social">
                    <h5 class="title">{{ trans('home_trans.Follow Us On') }} :</h5>
                    <ul>
                        <li>
                            <a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="lni lni-instagram"></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="lni lni-skype"></i></a>
                        </li>
                    </ul>
                </div>
                <!-- End Nav Social -->
            </div>
        </div>
    </div>
    <!-- Start Header Bottom -->


</header>
<!-- End Header Area -->