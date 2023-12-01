<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">

                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{ Route('vendor.dashboard') }}"><i class="fa-solid fa-house fa-fade"></i><span
                                class="right-nav-text">
                                {{ trans('sidebar_trans.Dashboard') }}
                            </span>
                        </a>
                    </li>


                    <!-- menu title -->
                    {{-- <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{ trans('sidebar_trans.Elements') }} </li> --}}



                    <!-- menu item Products-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#products-menu">
                            <div class="pull-left"><i class="fa-brands fa-product-hunt fa-fade"></i><span
                                    class="right-nav-text">{{ trans('sidebar_trans.Products') }} </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="products-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ Route('vendor.products.create') }}">{{ trans('sidebar_trans.Add_Product') }}
                                </a> </li>
                            <li> <a
                                    href="{{ Route('vendor.products.index') }}">{{ trans('sidebar_trans.All_Products') }}</a>
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
                            <li> <a href="{{ Route('vendor.attributes.create') }}">{{ trans('sidebar_trans.Add_Attribute') }}
                                </a> </li>
                            <li> <a
                                    href="{{ Route('vendor.attributes.index') }}">{{ trans('sidebar_trans.All_Attributes') }}</a>
                            </li>

                        </ul>
                    </li>

                    <!-- menu  Attributes Values-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#attribute_values-menu">
                            <div class="pull-left"><i class="fa-brands fa-product-hunt fa-fade"></i><span
                                    class="right-nav-text">{{ trans('sidebar_trans.Attribute_Values') }}
                                </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="attribute_values-menu" class="collapse">
                            <li> <a href="{{ Route('vendor.attribute_values.create') }}">{{ trans('sidebar_trans.Add_Attribute_Value') }}
                                </a> </li>
                            <li> <a
                                    href="{{ Route('vendor.attribute_values.index') }}">{{ trans('sidebar_trans.All_Attribute_Values') }}</a>
                            </li>

                        </ul>
                    </li>

                    <!-- menu item product_variants-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#product_variants-menu">
                            <div class="pull-left"><i class="fa-brands fa-product-hunt fa-fade"></i><span
                                    class="right-nav-text">{{ trans('sidebar_trans.Product_Variants') }} </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="product_variants-menu" class="collapse">
                            {{-- <li> <a href="{{ Route('vendor.product_variants.create') }}">{{ trans('sidebar_trans.Add_Product_Variant') }} --}}
                            </a>
                    </li>
                    <li> <a
                            href="{{ Route('vendor.product_variants.index') }}">{{ trans('sidebar_trans.All_Product_Variants') }}</a>
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
                    <ul id="coupons-menu" class="collapse" data-parent="#sidebarnav">
                        <li> <a href="{{ Route('vendor.coupons.create') }}">{{ trans('sidebar_trans.Add_Coupon') }}
                            </a> </li>
                        <li> <a
                                href="{{ Route('vendor.coupons.index') }}">{{ trans('sidebar_trans.All_Coupons') }}</a>
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
                    <ul id="orders-menu" class="collapse" data-parent="#sidebarnav">
                        {{-- <li> <a href="{{Route('vendor.orders.create')}}">{{ trans('sidebar_trans.Add_Order') }} </a> </li> --}}
                        <li> <a href="{{ Route('vendor.orders.index') }}">{{ trans('sidebar_trans.All_Orders') }}</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#notifications-menu">
                        <div class="pull-left"><i class="fa-solid fa-bell fa-fade"></i><span
                                class="right-nav-text">{{ trans('sidebar_trans.Notifications') }} </span></div>
                        <div class="pull-right"><i class="ti-plus"></i></div>
                        <div class="clearfix"></div>
                    </a>
                    <ul id="notifications-menu" class="collapse" data-parent="#sidebarnav">
                        {{-- <li> <a href="{{Route('vendor.orders.create')}}">{{ trans('sidebar_trans.Add_Order') }} </a> </li> --}}
                        <li> <a
                                href="{{ Route('vendor.notifications.index') }}">{{ trans('sidebar_trans.All_Notifications') }}</a>
                        </li>
                    </ul>
                </li>










                </ul>
                </li>
                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================