<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">

                <ul class="nav navbar-nav side-menu" id="sidebarnav">

                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{ Route('admin.dashboard') }}"><i class="fa-solid fa-house fa-fade"></i><span
                                class="right-nav-text">
                                {{ trans('sidebar_trans.Dashboard') }}
                            </span>
                        </a>
                    </li>


                    <!-- menu title -->
                    {{-- <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{ trans('sidebar_trans.Website') }}
                    </li> --}}


                    <!-- menu Website Management-->
                    <li>

                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#website_management">
                            <div class="pull-left"><i class="fa-solid fa-gear fa-fade"></i><span class="right-nav-text">
                                    {{ trans('sidebar_trans.Website_Management') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>

                        <ul id="website_management" class="collapse" data-parent="#sidebarnav">
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#websiteParts-menu">
                                    <div class="pull-left"><i class="fa-solid fa-image fa-fade"></i><span
                                            class="right-nav-text">{{ trans('sidebar_trans.WebsiteParts') }}</span>
                                    </div>
                                    <div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="websiteParts-menu" class="collapse">
                                    <li> <a href="{{ Route('admin.websiteParts.create') }}">{{ trans('sidebar_trans.Add_WebsitePart') }}
                                        </a> </li>
                                    <li> <a href="{{ Route('admin.websiteParts.index') }}">{{ trans('sidebar_trans.All_WebsiteParts') }}
                                        </a> </li>

                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#banners-menu">
                                    <div class="pull-left"><i class="fa-solid fa-image fa-fade"></i><span
                                            class="right-nav-text">{{ trans('sidebar_trans.Banners') }}</span></div>
                                    <div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="banners-menu" class="collapse">
                                    <li> <a href="{{ Route('admin.banners.create') }}">{{ trans('sidebar_trans.Add_Banner') }}
                                        </a> </li>
                                    <li> <a href="{{ Route('admin.banners.index') }}">{{ trans('sidebar_trans.All_Banners') }}
                                        </a> </li>
                                </ul>
                            </li>

                        </ul>
                    </li>

                    <!-- menu Stores -->
                    {{-- <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{ trans('sidebar_trans.Stores') }}
                    </li> --}}

                    <!-- menu Store Management-->
                    <li>

                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#store_management">
                            <div class="pull-left"><i class="fa-solid fa-shop fa-fade"></i><span class="right-nav-text">
                                    {{ trans('sidebar_trans.Stores_Management') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>

                        <ul id="store_management" class="collapse" data-parent="#sidebarnav">

                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#stores-menu">
                                    <div class="pull-left"><i class="fa-solid fa-store fa-fade"></i><span
                                            class="right-nav-text">{{ trans('sidebar_trans.Stores') }}</span></div>
                                    <div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="stores-menu" class="collapse">
                                    <li> <a href="{{ Route('admin.stores.create') }}">{{ trans('sidebar_trans.Add_Store') }}
                                        </a> </li>
                                    <li> <a href="{{ Route('admin.stores.index') }}">{{ trans('sidebar_trans.All_Stores') }}
                                        </a> </li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#destinations-menu">
                                    <div class="pull-left"><i class="fa-solid fa-store fa-fade"></i><span
                                            class="right-nav-text">{{ trans('sidebar_trans.Destinations') }}</span>
                                    </div>
                                    <div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="destinations-menu" class="collapse">
                                    <li> <a href="{{ Route('admin.destinations.create') }}">{{ trans('sidebar_trans.Add_Destination') }}
                                        </a> </li>
                                    <li> <a href="{{ Route('admin.destinations.index') }}">{{ trans('sidebar_trans.All_Destinations') }}
                                        </a> </li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#vendors-menu">
                                    <div class="pull-left"><i class="fa-solid fa-store fa-fade"></i><span
                                            class="right-nav-text">{{ trans('sidebar_trans.Vendors') }}</span></div>
                                    <div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="vendors-menu" class="collapse">
                                    <li> <a href="{{ Route('admin.vendors.create') }}">{{ trans('sidebar_trans.Add_Vendor') }}
                                        </a> </li>
                                    <li> <a href="{{ Route('admin.vendors.index') }}">{{ trans('sidebar_trans.All_Vendors') }}
                                        </a> </li>
                                </ul>
                            </li>


                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#deliveries-menu">
                                    <div class="pull-left"><i class="fa-solid fa-store fa-fade"></i><span
                                            class="right-nav-text">{{ trans('sidebar_trans.Deliveries') }}</span>
                                    </div>
                                    <div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="deliveries-menu" class="collapse">
                                    <li> <a href="{{ Route('admin.deliveries.create') }}">{{ trans('sidebar_trans.Add_Delivery') }}
                                        </a> </li>
                                    <li> <a href="{{ Route('admin.deliveries.index') }}">{{ trans('sidebar_trans.All_Deliveries') }}
                                        </a> </li>
                                </ul>
                            </li>



                        </ul>
                    </li>


                    <!-- menu Products -->
                    {{-- <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">
                        {{ trans('sidebar_trans.Products') }} </li> --}}

                    <!-- menu Product Management-->
                    <li>

                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#product_management">
                            <div class="pull-left"><i class="fa-brands fa-product-hunt fa-fade"></i><span
                                    class="right-nav-text">
                                    {{ trans('sidebar_trans.Products_Management') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>

                        <ul id="product_management" class="collapse" data-parent="#sidebarnav">

                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#brands-menu">
                                    <div class="pull-left"><i class="fa-sharp fa-solid fa-list fa-fade"></i><span
                                            class="right-nav-text">{{ trans('sidebar_trans.Brands') }}</span></div>
                                    <div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="brands-menu" class="collapse">
                                    @can('create', 'App\Models\Brand')
                                        <li> <a href="{{ Route('admin.brands.create') }}">{{ trans('sidebar_trans.Add_Brand') }}
                                            </a> </li>
                                    @endcan
                                    @can('view', 'App\Models\Brand')
                                        <li> <a
                                                href="{{ Route('admin.brands.index') }}">{{ trans('sidebar_trans.All_Brands') }}</a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>


                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#categories-menu">
                                    <div class="pull-left"><i class="fa-solid fa-tags fa-fade"></i><span
                                            class="right-nav-text">{{ trans('sidebar_trans.Categories') }}</span>
                                    </div>
                                    <div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="categories-menu" class="collapse">
                                    <li> <a href="{{ Route('admin.categories.create') }}">{{ trans('sidebar_trans.Add_Category') }}
                                        </a> </li>
                                    <li> <a
                                            href="{{ Route('admin.categories.index') }}">{{ trans('sidebar_trans.All_Categories') }}</a>
                                    </li>
                                    <li> <a
                                            href="{{ Route('admin.categories.trash') }}">{{ trans('sidebar_trans.Trash_Categories') }}</a>
                                    </li>

                                </ul>
                            </li>

                            <!-- menu item Products-->
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#products-menu">
                                    <div class="pull-left"><i class="fa-brands fa-product-hunt fa-fade"></i><span
                                            class="right-nav-text">{{ trans('sidebar_trans.Products') }} </span></div>
                                    <div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="products-menu" class="collapse">
                                    <li> <a href="{{ Route('admin.products.create') }}">{{ trans('sidebar_trans.Add_Product') }}
                                        </a> </li>
                                    <li> <a
                                            href="{{ Route('admin.products.index') }}">{{ trans('sidebar_trans.All_Products') }}</a>
                                    </li>

                                </ul>
                            </li>


                            <!-- menu item Products Properties-->
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse"
                                    data-target="#product_properties-menu">
                                    <div class="pull-left"><i class="fa-brands fa-product-hunt fa-fade"></i><span
                                            class="right-nav-text">{{ trans('sidebar_trans.Product_Properties') }}
                                        </span></div>
                                    <div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="product_properties-menu" class="collapse">
                                    <li> <a href="{{ Route('admin.product_properties.create') }}">{{ trans('sidebar_trans.Add_Product_Properties') }}
                                        </a> </li>
                                    <li> <a
                                            href="{{ Route('admin.product_properties.index') }}">{{ trans('sidebar_trans.All_Product_Properties') }}</a>
                                    </li>

                                </ul>
                            </li>


                            <!-- menu  Attributes-->
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#attributes-menu">
                                    <div class="pull-left"><i class="fa-brands fa-product-hunt fa-fade"></i><span
                                            class="right-nav-text">{{ trans('sidebar_trans.Attributes') }} </span>
                                    </div>
                                    <div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="attributes-menu" class="collapse">
                                    <li> <a href="{{ Route('admin.attributes.create') }}">{{ trans('sidebar_trans.Add_Attribute') }}
                                        </a> </li>
                                    <li> <a
                                            href="{{ Route('admin.attributes.index') }}">{{ trans('sidebar_trans.All_Attributes') }}</a>
                                    </li>

                                </ul>
                            </li>

                            <!-- menu  Attributes Values-->
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse"
                                    data-target="#attribute_values-menu">
                                    <div class="pull-left"><i class="fa-brands fa-product-hunt fa-fade"></i><span
                                            class="right-nav-text">{{ trans('sidebar_trans.Attribute_Values') }}
                                        </span></div>
                                    <div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="attribute_values-menu" class="collapse">
                                    <li> <a href="{{ Route('admin.attribute_values.create') }}">{{ trans('sidebar_trans.Add_Attribute_Value') }}
                                        </a> </li>
                                    <li> <a
                                            href="{{ Route('admin.attribute_values.index') }}">{{ trans('sidebar_trans.All_Attribute_Values') }}</a>
                                    </li>

                                </ul>
                            </li>

                            <!-- menu item product_variants-->
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse"
                                    data-target="#product_variants-menu">
                                    <div class="pull-left"><i class="fa-brands fa-product-hunt fa-fade"></i><span
                                            class="right-nav-text">{{ trans('sidebar_trans.Product_Variants') }}
                                        </span></div>
                                    <div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="product_variants-menu" class="collapse">
                                    {{-- <li> <a href="{{ Route('admin.product_variants.create') }}">{{ trans('sidebar_trans.Add_Product_Variant') }} --}}
                                    </a>
                            </li>
                            <li> <a
                                    href="{{ Route('admin.product_variants.index') }}">{{ trans('sidebar_trans.All_Product_Variants') }}</a>
                            </li>

                        </ul>
                    </li>


                    <!-- menu  Coupons-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#coupons-menu">
                            <div class="pull-left"><i class="fa-brands fa-product-hunt fa-fade"></i><span
                                    class="right-nav-text">{{ trans('sidebar_trans.Coupons') }} </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="coupons-menu" class="collapse">
                            <li> <a href="{{ Route('admin.coupons.create') }}">{{ trans('sidebar_trans.Add_Coupon') }}
                                </a> </li>
                            <li> <a
                                    href="{{ Route('admin.coupons.index') }}">{{ trans('sidebar_trans.All_Coupons') }}</a>
                            </li>

                        </ul>
                    </li>

                    <!-- menu item Orders-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#orders-menu">
                            <div class="pull-left"><i class="fa-solid fa-cart-shopping fa-fade"></i><span
                                    class="right-nav-text">{{ trans('sidebar_trans.Orders') }} </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="orders-menu" class="collapse">
                            <li> <a
                                    href="{{ Route('admin.orders.index') }}">{{ trans('sidebar_trans.All_Orders') }}</a>
                            </li>
                        </ul>
                    </li>

                </ul>
                </li>




                <!-- menu Users -->

                <!-- menu User Management-->
                <li>

                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#user_management">
                        <div class="pull-left"><i class="fa-solid fa-users fa-fade"></i><span class="right-nav-text">
                                {{ trans('sidebar_trans.Users_Management') }}</span></div>
                        <div class="pull-right"><i class="ti-plus"></i></div>
                        <div class="clearfix"></div>
                    </a>

                    <ul id="user_management" class="collapse" data-parent="#sidebarnav">

                        <!-- menu item roles-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#roles-menu">
                                <div class="pull-left"><i class="fa-solid fa-check fa-fade"></i><span
                                        class="right-nav-text">{{ trans('sidebar_trans.Roles') }} </span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="roles-menu" class="collapse">
                                <li> <a href="{{ Route('admin.roles.create') }}">{{ trans('sidebar_trans.Add_Role') }}
                                    </a> </li>
                                <li> <a
                                        href="{{ Route('admin.roles.index') }}">{{ trans('sidebar_trans.All_Roles') }}</a>
                                </li>
                            </ul>
                        </li>




                        <!-- menu item Admins-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#admins-menu">
                                <div class="pull-left"><i class="fa-solid fa-user-tie fa-fade"></i><span
                                        class="right-nav-text">{{ trans('sidebar_trans.Admins') }} </span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="admins-menu" class="collapse">
                                <li> <a href="{{ Route('admin.admins.create') }}">{{ trans('sidebar_trans.Add_Admin') }}
                                    </a> </li>
                                <li> <a
                                        href="{{ Route('admin.admins.index') }}">{{ trans('sidebar_trans.All_Admins') }}</a>
                                </li>
                            </ul>
                        </li>


                        <!-- menu item Users-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#users-menu">
                                <div class="pull-left"><i class="fa-solid fa-users fa-fade"></i><span
                                        class="right-nav-text">{{ trans('sidebar_trans.Users') }} </span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="users-menu" class="collapse">
                                <li> <a href="">{{ trans('sidebar_trans.All_Users') }}</a> </li>
                            </ul>
                        </li>




                    </ul>
                </li>



                <!-- menu Reports Management-->
                <li>

                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#reports_management">
                        <div class="pull-left"><i class="fa-regular fa-file-lines"></i><span class="right-nav-text">
                                {{ trans('sidebar_trans.Reports') }}</span></div>
                        <div class="pull-right"><i class="ti-plus"></i></div>
                        <div class="clearfix"></div>
                    </a>

                    <ul id="reports_management" class="collapse" data-parent="#sidebarnav">

                        <!-- menu item reports-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#order-reports">
                                <div class="pull-left"><i class="fa-solid fa-cart-shopping"></i><span
                                        class="right-nav-text">{{ trans('sidebar_trans.Orders_Reports') }} </span>
                                </div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="order-reports" class="collapse">
                                <li> <a href="{{ route('admin.reports.orders') }}">{{ trans('sidebar_trans.All_Orders') }}
                                    </a>
                                </li>
                                <li> <a
                                        href="{{ route('admin.reports.orders', ['pending']) }}">{{ trans('sidebar_trans.Pending_Orders') }}</a>
                                </li>
                                <li> <a
                                        href="{{ route('admin.reports.orders', ['processing']) }}">{{ trans('sidebar_trans.Processing_Orders') }}</a>
                                </li>
                                <li> <a
                                        href="{{ route('admin.reports.orders', ['delivering']) }}">{{ trans('sidebar_trans.Delivering_Orders') }}</a>
                                </li>
                                <li> <a
                                        href="{{ route('admin.reports.orders', ['completed']) }}">{{ trans('sidebar_trans.Completed_Orders') }}</a>
                                </li>
                                <li> <a
                                        href="{{ route('admin.reports.orders', ['cancelled']) }}">{{ trans('sidebar_trans.Cancelled_Orders') }}</a>
                                </li>
                                <li> <a
                                        href="{{ route('admin.reports.orders', ['refunded']) }}">{{ trans('sidebar_trans.Refunded_Orders') }}</a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </li>




                <!-- menu item WebsiteParts-->
                {{-- <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#websiteParts-menu">
                            <div class="pull-left"><i class="fa-solid fa-image fa-fade"></i><span
                                    class="right-nav-text">{{ trans('sidebar_trans.WebsiteParts') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="websiteParts-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{Route('admin.websiteParts.create')}}">{{ trans('sidebar_trans.Add_WebsitePart') }} </a> </li>
                            <li> <a href="{{Route('admin.websiteParts.index')}}">{{ trans('sidebar_trans.All_WebsiteParts') }} </a> </li>

                        </ul>
                    </li> --}}

                <!-- menu item Banners-->
                {{-- <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#banners-menu">
                            <div class="pull-left"><i class="fa-solid fa-image fa-fade"></i><span
                                    class="right-nav-text">{{ trans('sidebar_trans.Banners') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="banners-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{Route('admin.banners.create')}}">{{ trans('sidebar_trans.Add_Banner') }} </a> </li>
                            <li> <a href="{{Route('admin.banners.index')}}">{{ trans('sidebar_trans.All_Banners') }} </a> </li>
                        </ul>
                    </li> --}}

                <!-- menu item Brands-->
                {{-- <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#brands-menu">
                            <div class="pull-left"><i class="fa-sharp fa-solid fa-list fa-fade"></i><span
                                    class="right-nav-text">{{ trans('sidebar_trans.Brands') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="brands-menu" class="collapse" data-parent="#sidebarnav">
                            @can('create', 'App\Models\Brand')
                            <li> <a href="{{Route('admin.brands.create')}}">{{ trans('sidebar_trans.Add_Brand') }} </a> </li>
                            @endcan
                            @can('view', 'App\Models\Brand')
                            <li> <a href="{{Route('admin.brands.index')}}">{{ trans('sidebar_trans.All_Brands') }}</a> </li>
                            @endcan
                        </ul>
                    </li> --}}

                <!-- menu  Stores-->
                {{-- <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#stores-menu">
                            <div class="pull-left"><i class="fa-solid fa-store fa-fade"></i><span
                                    class="right-nav-text">{{ trans('sidebar_trans.Stores') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="stores-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{Route('admin.stores.create')}}">{{ trans('sidebar_trans.Add_Store') }} </a> </li>
                            <li> <a href="{{Route('admin.stores.index')}}">{{ trans('sidebar_trans.All_Stores') }} </a> </li>
                        </ul>
                    </li> --}}


                <!-- menu  Vendors-->
                {{-- <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#vendors-menu">
                            <div class="pull-left"><i class="fa-solid fa-store fa-fade"></i><span
                                    class="right-nav-text">{{ trans('sidebar_trans.Vendors') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="vendors-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{Route('admin.vendors.create')}}">{{ trans('sidebar_trans.Add_Vendor') }} </a> </li>
                            <li> <a href="{{Route('admin.vendors.index')}}">{{ trans('sidebar_trans.All_Vendors') }} </a> </li>
                        </ul>
                    </li>
                     --}}


                <!-- menu item Categories-->
                {{-- <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#categories-menu">
                            <div class="pull-left"><i class="fa-solid fa-tags fa-fade"></i><span
                                    class="right-nav-text">{{ trans('sidebar_trans.Categories') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="categories-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{Route('admin.categories.create')}}">{{ trans('sidebar_trans.Add_Category') }} </a> </li>
                            <li> <a href="{{Route('admin.categories.index')}}">{{ trans('sidebar_trans.All_Categories') }}</a> </li>
                            <li> <a href="{{Route('admin.categories.trash')}}">{{ trans('sidebar_trans.Trash_Categories') }}</a> </li>

                        </ul>
                    </li> --}}


                <!-- menu item Products-->
                {{-- <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#products-menu">
                            <div class="pull-left"><i class="fa-brands fa-product-hunt fa-fade"></i><span
                                    class="right-nav-text">{{ trans('sidebar_trans.Products') }} </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="products-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{Route('admin.products.create')}}">{{ trans('sidebar_trans.Add_Product') }} </a> </li>
                            <li> <a href="{{Route('admin.products.index')}}">{{ trans('sidebar_trans.All_Products') }}</a> </li>
                            
                        </ul>
                    </li> --}}


                <!-- menu  Attributes-->
                {{-- <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#attributes-menu">
                            <div class="pull-left"><i class="fa-brands fa-product-hunt fa-fade"></i><span
                                    class="right-nav-text">{{ trans('sidebar_trans.Attributes') }} </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="attributes-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{Route('admin.attributes.create')}}">{{ trans('sidebar_trans.Add_Attribute') }} </a> </li>
                            <li> <a href="{{Route('admin.attributes.index')}}">{{ trans('sidebar_trans.All_Attributes') }}</a> </li>
                            
                        </ul>
                    </li> --}}


                <!-- menu  Attribute Values-->
                {{-- <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#attribute_values-menu">
                            <div class="pull-left"><i class="fa-brands fa-product-hunt fa-fade"></i><span
                                    class="right-nav-text">{{ trans('sidebar_trans.Attribute_Values') }} </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="attribute_values-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{Route('admin.attribute_values.create')}}">{{ trans('sidebar_trans.Add_Attribute_Value') }} </a> </li>
                            <li> <a href="{{Route('admin.attribute_values.index')}}">{{ trans('sidebar_trans.All_Attribute_Values') }}</a> </li>
                            
                        </ul>
                    </li> --}}

                <!-- menu  Coupons-->
                {{-- <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#coupons-menu">
                            <div class="pull-left"><i class="fa-brands fa-product-hunt fa-fade"></i><span
                                    class="right-nav-text">{{ trans('sidebar_trans.Coupons') }} </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="coupons-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{Route('admin.coupons.create')}}">{{ trans('sidebar_trans.Add_Coupon') }} </a> </li>
                            <li> <a href="{{Route('admin.coupons.index')}}">{{ trans('sidebar_trans.All_Coupons') }}</a> </li>
                            
                        </ul>
                    </li> --}}


                <!-- menu item Orders-->
                {{-- <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#orders-menu">
                            <div class="pull-left"><i class="fa-solid fa-cart-shopping fa-fade"></i><span
                                    class="right-nav-text">{{ trans('sidebar_trans.Orders') }} </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="orders-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a
                                    href="{{ Route('admin.orders.index') }}">{{ trans('sidebar_trans.All_Orders') }}</a>
                            </li>
                        </ul>
                    </li> --}}


                <!-- menu item roles-->
                {{-- <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#roles-menu">
                            <div class="pull-left"><i class="fa-solid fa-check fa-fade"></i><span
                                    class="right-nav-text">{{ trans('sidebar_trans.Roles') }} </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="roles-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ Route('admin.roles.create') }}">{{ trans('sidebar_trans.Add_Role') }}
                                </a> </li>
                            <li> <a
                                    href="{{ Route('admin.roles.index') }}">{{ trans('sidebar_trans.All_Roles') }}</a>
                            </li>
                        </ul>
                    </li> --}}




                <!-- menu item Admins-->
                {{-- <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#admins-menu">
                            <div class="pull-left"><i class="fa-solid fa-user-tie fa-fade"></i><span
                                    class="right-nav-text">{{ trans('sidebar_trans.Admins') }} </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="admins-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ Route('admin.admins.create') }}">{{ trans('sidebar_trans.Add_Admin') }}
                                </a> </li>
                            <li> <a
                                    href="{{ Route('admin.admins.index') }}">{{ trans('sidebar_trans.All_Admins') }}</a>
                            </li>
                        </ul>
                    </li> --}}


                <!-- menu item Users-->
                {{-- <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#users-menu">
                            <div class="pull-left"><i class="fa-solid fa-users fa-fade"></i><span
                                    class="right-nav-text">{{ trans('sidebar_trans.Users') }} </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="users-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ Route('admin.profile.edit') }}">{{ trans('sidebar_trans.Edit_Profile') }}
                                </a> </li>
                            <li> <a href="">{{ trans('sidebar_trans.All_User') }}</a> </li>
                        </ul>
                    </li> --}}




                </ul>
                </li>
                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================