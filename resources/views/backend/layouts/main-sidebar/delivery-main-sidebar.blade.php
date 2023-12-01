<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                   
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{Route('delivery.dashboard')}}"><i class="fa-solid fa-house fa-fade"></i><span class="right-nav-text">
                                {{ trans('sidebar_trans.Dashboard') }}
                            </span> 
                        </a>
                    </li>


                    <!-- menu title -->
                    {{-- <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{ trans('sidebar_trans.Elements') }} </li> --}}
                             

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
                            <li> <a href="{{Route('delivery.orders.index')}}">{{ trans('sidebar_trans.All_Orders') }}</a> </li>
                        </ul>
                    </li>
                  



        
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================