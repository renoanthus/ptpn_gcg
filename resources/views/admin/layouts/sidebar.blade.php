<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!-- User box -->
        <div class="user-box text-center">
            <img src="{{ Auth::user()->avatar ?? url('adminto/dist/assets/images/users/user-1.jpg') }}" alt="user-img"
                title="Mat Helme" class="rounded-circle img-thumbnail avatar-md">
            <div class="dropdown">
                <a href="#" class="user-name dropdown-toggle h5 mt-2 mb-1 d-block" data-toggle="dropdown"
                    aria-expanded="false">{{ Auth::user()->name }}</a>
                <div class="dropdown-menu user-pro-dropdown">
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-lock mr-1"></i>
                        <span>Change Password</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-log-out mr-1"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </div>
            <p class="text-muted">Admin Head</p>
            <ul class="list-inline">
                <li class="list-inline-item">
                    <a href="#">
                        <i class="mdi mdi-power"></i>
                    </a>
                </li>
            </ul>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="itemsmenu" id="side-menu">
                <li class="menu-title">Navigation</li>
                <li id="menu_aset">
                    <a href="javascript: void(0);">
                        <i class="mdi mdi-file"></i>
                        <span> Master Data </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level nav" aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.aspek.index') }}">Aspek</a>
                        </li>
                    </ul>
                </li>
                {{-- <li>
                    <a href="{{ route('admin.pengguna.index') }}">
                        <i class="mdi mdi-account-multiple-outline"></i>
                        <span> Pengguna </span>
                    </a>
                </li> --}}
                <li>
                    <a href="{{ route('admin.pengguna.index') }}">
                        <i class="mdi mdi-account-multiple-outline"></i>
                        <span> Pengguna </span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->