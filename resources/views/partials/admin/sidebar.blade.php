<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!-- User box -->
        <div class="user-box text-center">
            <img src="{{asset('backend/images/users/user-1.jpg')}}" alt="user-img" title="Mat Helme"
                 class="rounded-circle img-thumbnail avatar-md">
            <div class="dropdown">
                <a href="#" class="user-name dropdown-toggle h5 mt-2 mb-1 d-block" data-toggle="dropdown"
                   aria-expanded="false">{{auth()->user()->name}}</a>
                <div class="dropdown-menu user-pro-dropdown">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-user mr-1"></i>
                        <span>My Account</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-settings mr-1"></i>
                        <span>Settings</span>
                    </a>

                    </a>

                    <!-- item-->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{route('logout')}}"
                           onclick="event.preventDefault(); this.closest('form').submit();"
                           class="dropdown-item notify-item">
                            <i class="fe-log-out"></i>
                            <span>Logout</span>
                        </a>
                    </form>

                </div>
            </div>
            <p class="text-muted">Admin Head</p>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">

                <li class="menu-title">Navigation</li>

                <li>
                    <a href="{{route("admin.dashboard")}}">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="mdi mdi-page-layout-sidebar-left"></i>
                        <span> Layouts </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="layouts-horizontal.html">Horizontal</a></li>
                        <li><a href="layouts-sidebar-sm.html">Small Sidebar</a></li>
                        <li><a href="layouts-dark-sidebar.html">Dark Sidebar</a></li>
                        <li><a href="layouts-dark-topbar.html">Dark Topbar</a></li>
                        <li><a href="layouts-preloader.html">Preloader</a></li>
                        <li><a href="layouts-sidebar-collapsed.html">Sidebar Collapsed</a></li>
                        <li><a href="layouts-boxed.html">Boxed</a></li>
                    </ul>
                </li>
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
