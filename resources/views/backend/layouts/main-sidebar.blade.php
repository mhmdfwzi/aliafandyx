{{-- <div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed"> --}}

            {{-- @if (auth('web')->check())
                @include('layouts.main-sidebar.admin-main-sidebar')
            @endif --}}

            @if (auth('admin')->check())
                @include('backend.layouts.main-sidebar.admin-main-sidebar')
            @endif


            @if (auth('vendor')->check())
                @include('backend.layouts.main-sidebar.vendor-main-sidebar')
            @endif

            @if (auth('delivery')->check())
                @include('backend.layouts.main-sidebar.delivery-main-sidebar')
            @endif

        {{-- </div> --}}

        <!-- Left Sidebar End-->

        <!--=================================
