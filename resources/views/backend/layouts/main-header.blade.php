        <!--=================================
 header start-->
        <nav class="admin-header navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <!-- logo -->
            <div class="text-left navbar-brand-wrapper">
                {{-- <a class="navbar-brand brand-logo" href="index.html"><img src={{asset("backend/assets/images/logo.png")}} alt=""></a>
                <a class="navbar-brand brand-logo-mini" href="index.html"><img src="backend/assets/images/logo-icon-dark.png"
                        alt=""></a> --}}
            </div>
            <!-- Top bar left -->
            <ul class="nav navbar-nav mr-auto">
                <li class="nav-item">
                    <a id="button-toggle" class="button-toggle-nav inline-block ml-20 pull-left"
                        href="javascript:void(0);"><i class="zmdi zmdi-menu ti-align-right"></i></a>
                </li>

                <li class="nav-item">
                    <div class="search">
                        <a class="search-btn not_click" href="javascript:void(0);"></a>
                        <div class="search-box not-click">
                            <input type="text" class="not-click form-control" placeholder="Search" value=""
                                name="search">
                            <button class="search-button" type="submit"> <i
                                    class="fa fa-search not-click"></i></button>
                        </div>
                    </div>
                </li>
            </ul>
            <!-- top bar right -->
            <ul class="nav navbar-nav ml-auto">

                <div class="btn-group mb-1">
                <span>{{ Auth::user()->name }}</span>
                </div>

                <li class="nav-item fullscreen">
                    <a id="btnFullscreen" href="#" class="nav-link"><i class="ti-fullscreen"></i></a>
                </li>

                <x-dashboard.notification-menu count="7" />


                <li class="nav-item dropdown mr-30">

                    <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="true" aria-expanded="false">
                        <img src="{{ URL::asset('backend/assets/images/profile-avatar.jpg') }}" alt="avatar">
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-header">
                            <div class="media">
                                <div class="media-body">
                                    <h5 class="mt-0 mb-0"></h5>
                                    <span>{{ Auth::user()->email }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="dropdown-divider"></div>
                        {{-- <a class="dropdown-item" href="#"><i class="text-info ti-settings"></i>الإعدادات</a> --}}

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            this.closest('form').submit(); "
                                role="button">

                                <i class="text-danger ti-unlock"></i>
                                تسجل الخروج
                            </a>

                        </form>
                    </div>
                </li>
            </ul>
        </nav>

        <!--=================================
 header End-->
