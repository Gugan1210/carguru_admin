@if (!Route::is(['pos', 'pos-2', 'pos-3', 'pos-4', 'pos-5']))
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <!-- Logo -->
        <div class="sidebar-logo active">
            <a href="{{ url('index') }}" class="logo logo-normal">
                <img src="{{ URL::asset('build/img/car-guru-logo.webp') }}" alt="Img">
            </a>
            <a href="{{ url('index') }}" class="logo logo-white">
                <img src="{{ URL::asset('build/img/logo-white.svg') }}" alt="Img">
            </a>
            <a href="{{ url('index') }}" class="logo-small">
                <img src="{{ URL::asset('build/img/logo-small.png') }}" alt="Img">
            </a>
            <a id="toggle_btn" href="javascript:void(0);">
                <i data-feather="chevrons-left" class="feather-16"></i>
            </a>
        </div>
        <!-- /Logo -->
        <div class="modern-profile p-3 pb-0">
            <div class="text-center rounded bg-light p-3 mb-4 user-profile">
                <div class="avatar avatar-lg online mb-3">
                    <img src="{{ URL::asset('build/img/customer/customer15.jpg') }}" alt="Img"
                        class="img-fluid rounded-circle">
                </div>
                <h6 class="fs-12 fw-normal mb-1">Adrian Herman</h6>
                <p class="fs-10 mb-0">System Admin</p>
            </div>
            <div class="sidebar-nav mb-3">
                <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded nav-justified bg-transparent" role="tablist">
                    <li class="nav-item"><a class="nav-link active border-0" href="#">Menu</a></li>
                    <li class="nav-item"><a class="nav-link border-0" href="{{ url('chat') }}">Chats</a></li>
                    <li class="nav-item"><a class="nav-link border-0" href="{{ url('email') }}">Inbox</a></li>
                </ul>
            </div>
        </div>
        <div class="sidebar-header p-3 pb-0 pt-2">
            <div class="text-center rounded bg-light p-2 mb-4 sidebar-profile d-flex align-items-center">
                <div class="avatar avatar-md onlin">
                    <img src="{{ URL::asset('build/img/customer/customer15.jpg') }}" alt="Img"
                        class="img-fluid rounded-circle">
                </div>
                <div class="text-start sidebar-profile-info ms-2">
                    <h6 class="fs-12 fw-normal mb-1">Adrian Herman</h6>
                    <p class="fs-10">System Admin</p>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between menu-item mb-3">
                <div>
                    <a href="{{ url('index') }}" class="btn btn-sm btn-icon bg-light">
                        <i class="ti ti-layout-grid-remove"></i>
                    </a>
                </div>
                <div>
                    <a href="{{ url('chat') }}" class="btn btn-sm btn-icon bg-light">
                        <i class="ti ti-brand-hipchat"></i>
                    </a>
                </div>
                <div>
                    <a href="{{ url('email') }}" class="btn btn-sm btn-icon bg-light position-relative">
                        <i class="ti ti-message"></i>
                    </a>
                </div>
                <div class="notification-item">
                    <a href="{{ url('activities') }}" class="btn btn-sm btn-icon bg-light position-relative">
                        <i class="ti ti-bell"></i>
                        <span class="notification-status-dot"></span>
                    </a>
                </div>
                <div class="me-0">
                    <a href="{{ url('general-settings') }}" class="btn btn-sm btn-icon bg-light">
                        <i class="ti ti-settings"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    {{-- <li class="submenu-open">
                        <h6 class="submenu-hdr">User Management</h6>
                        <ul>
                            @can('user-list')
                            <li class="{{ Request::is('users') ? 'active' : '' }}"><a href="{{ url('users') }}"><i
                                        class="ti ti-shield-up fs-16 me-2"></i><span>Users</span></a>
                            </li>
                            @endcan
                            @can('role-list')
                            <li class="{{ Request::is('roles') ? 'active' : '' }}"><a href="{{ url('roles') }}"><i
                                        class="ti ti-jump-rope fs-16 me-2"></i><span>Roles
                                        & Permissions</span></a></li>
                            @endcan
                        </ul>
                    </li>
                    <li class="submenu-open">
                        <h6 class="submenu-hdr">Brand Management</h6>
                        <ul>
                            @can('make-list')
                            <li class="{{ Request::is('makes') ? 'active' : '' }}"><a href="{{ url('makes') }}"><i
                                        class="ti ti-shield-up fs-16 me-2"></i><span>Brands</span></a>
                            </li>
                            @endcan
                            @can('model-list')
                            <li class="{{ Request::is('models') ? 'active' : '' }}"><a href="{{ url('models') }}"><i
                                        class="ti ti-jump-rope fs-16 me-2"></i><span>Models</span></a>
                            </li>
                            @endcan
                            @can('variant-list')
                            <li class="{{ Request::is('variants') ? 'active' : '' }}"><a href="{{ url('variants') }}"><i
                                        class="ti ti-shield-up fs-16 me-2"></i><span>Variants</span></a>
                            </li>
                            @endcan

                        </ul>
                    </li>

                    <li class="submenu-open">
                        <h6 class="submenu-hdr">Car Management</h6>
                        <ul>

                            <li class="{{ Request::is('carmakes/create') ? 'active' : '' }}"><a
                                    href="{{ url('carmakes/create') }}"><i class="ti ti-shield-up fs-16 me-2"></i><span>Car
                                        Makes</span></a>
                            </li>


                            <li class="{{ Request::is('car-details/createt') ? 'active' : '' }}"><a
                                    href="{{ url('car-details/create') }}"><i
                                        class="ti ti-jump-rope fs-16 me-2"></i><span>Car
                                        Details</span></a>
                            </li>


                            <li class="{{ Request::is('car-marketing') ? 'active' : '' }}"><a
                                    href="{{ url('car-marketing') }}"><i class="ti ti-shield-up fs-16 me-2"></i><span>Car
                                        Marketing</span></a>
                            </li>


                        </ul>
                    </li> --}}

                    @if (isset(\App\Constants\commonConstant::SIDE_MENU_HEAD[0]))
                        @foreach (\App\Constants\commonConstant::SIDE_MENU_HEAD as $side_menu_head)
                            <li class="submenu">
                                <a href="javascript:void(0);"
                                    class="{{ Request::is('', 'sales-dashboard', 'admin-dashboard') ? 'active subdrop' : '' }}">
                                    <i class="ti ti-layout-grid fs-16 me-2"></i>
                                    <span class="menu-font-size">
                                        <strong>{{ $side_menu_head['title'] }}</strong>
                                    </span>
                                    <span class="menu-arrow"></span>
                                </a>

                                @if (isset($side_menu_head['submenu']) && is_array($side_menu_head['submenu']))
                                    <ul>
                                        @foreach ($side_menu_head['submenu'] as $sub_menu)
                                            <li>
                                                <a href="{{ url($sub_menu['url']) }}"
                                                    class="{{ Request::is(trim($sub_menu['url'], '/')) ? 'active subdrop' : '' }}">
                                                    <span class="menu-font-size">
                                                        <strong>{{ $sub_menu['title'] }}</strong>
                                                    </span>
                                                    @if(array_key_exists("submenu", $sub_menu))
                                                        <span class="menu-arrow"></span>
                                                    @endif
                                                </a>
                                                @if (isset($sub_menu['submenu']) && is_array($sub_menu['submenu']))
                                                    <ul>
                                                        @foreach ($sub_menu['submenu'] as $sub_menu2)
                                                            <li>
                                                                <a href="{{ url($sub_menu2['url']) }}"
                                                                    class="{{ Request::is(trim($sub_menu2['url'], '/')) ? 'active subdrop' : '' }}">
                                                                    <span class="menu-font-size">
                                                                        <strong>{{ $sub_menu2['title'] }}</strong>
                                                                    </span>
                                                                    @if(array_key_exists("submenu", $sub_menu2))
                                                                        <span class="menu-arrow"></span>
                                                                    @endif
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    @endif

                </ul>
            </div>
        </div>
    </div>
    <!-- /Sidebar -->
@endif


<style>
    .menu-font-size {
        font-size: 12px !important;
    }
</style>