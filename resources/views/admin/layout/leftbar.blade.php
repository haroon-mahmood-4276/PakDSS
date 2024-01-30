<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo ">
        <a href="{{ route('admin.dashboard.index') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
                        fill="#7367F0" />
                    <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                        d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z" fill="#161616" />
                    <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                        d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z" fill="#161616" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
                        fill="#7367F0" />
                </svg>
            </span>
            <span class="app-brand-text demo menu-text fw-bold text-primary">{{ env('APP_NAME') }}</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            {{-- <i class="ti ti-chevrons-left  d-none d-xl-block ti-sm align-middle"></i> --}}
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-chevrons-right d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-item {{ request()->routeIs('admin.dashboard.index') ? 'active' : null }}">
            <a href="{{ route('admin.dashboard.index') }}" class="menu-link">
                <i class="fa-solid fa-home menu-icon" style="font-size: 1.1rem"></i>
                <div>Dashboard</div>
            </a>
        </li>

        @canany(['admin.roles.index', 'admin.permissions.index'])
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Administration</span>
            </li>
        @endcanany

        @canany(['admin.settings.tab_general.index'])
            <li class="menu-item {{ request()->routeIs('admin.settings.index') ? 'active' : null }}">
                <a href="{{ route('admin.settings.index') }}" class="menu-link">
                    <i class="fa-solid fa-gears menu-icon" style="font-size: 1.1rem"></i>
                    <div>Settings</div>
                </a>
            </li>
        @endcanany

        @canany(['admin.users.index', 'admin.users.create'])
            <li
                class="menu-item {{ in_array(request()->route()->getName(),['admin.users.index', 'admin.users.create'])? 'open active': null }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="fa-solid fa-users menu-icon" style="font-size: 1.1rem"></i>
                    <div>Users</div>
                </a>
                <ul class="menu-sub">

                    @can('admin.users.index')
                        <li class="menu-item {{ request()->routeIs('admin.users.index') ? 'active' : null }}">
                            <a href="{{ route('admin.users.index') }}" class="menu-link">
                                <div>View All</div>
                            </a>
                        </li>
                    @endcan

                    @can('admin.users.create')
                        <li class="menu-item {{ request()->routeIs('admin.users.create') ? 'active' : null }}">
                            <a href="{{ route('admin.users.create') }}" class="menu-link">
                                <div>Add New</div>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcanany

        <!-- Roles & Permissions -->
        @canany(['admin.roles.index', 'admin.permissions.index'])
            <li
                class="menu-item {{ in_array(request()->route()->getName(),['admin.roles.index', 'admin.permissions.index'])? 'open active': null }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="fa-solid fa-lock menu-icon" style="font-size: 1.1rem"></i>
                    <div>Roles & Permissions</div>
                    {{-- <div class="badge bg-label-primary rounded-pill ms-auto">3</div> --}}
                </a>
                <ul class="menu-sub">

                    @can('admin.roles.index')
                        <li class="menu-item {{ request()->routeIs('admin.roles.index') ? 'active' : null }}">
                            <a href="{{ route('admin.roles.index') }}" class="menu-link">
                                <div>Roles</div>
                            </a>
                        </li>
                    @endcan

                    @can('admin.permissions.index')
                        <li class="menu-item {{ request()->routeIs('admin.permissions.index') ? 'active' : null }}">
                            <a href="{{ route('admin.permissions.index') }}" class="menu-link">
                                <div>Permissions</div>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcanany

        @canany(['admin.approvals.shops.index', 'admin.approvals.products.index'])
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Approvals</span>
            </li>
        @endcanany

        @canany(['admin.approvals.shops.index', 'admin.approvals.products.index', 'admin.approvals.sellers.index'])
            <li
                class="menu-item {{ in_array(request()->route()->getName(),['admin.approvals.shops.index', 'admin.approvals.products.index', 'admin.approvals.sellers.index'])? 'open active': null }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="fa-solid fa-check menu-icon" style="font-size: 1.1rem"></i>
                    <div>Approvals</div>
                </a>
                <ul class="menu-sub">
                    @can('admin.approvals.shops.index')
                        <li class="menu-item {{ request()->routeIs('admin.approvals.shops.index') ? 'active' : null }}">
                            <a href="{{ route('admin.approvals.shops.index') }}" class="menu-link">
                                <div>Shops</div>
                            </a>
                        </li>
                    @endcan
                    @can('admin.approvals.products.index')
                        <li class="menu-item {{ request()->routeIs('admin.approvals.products.index') ? 'active' : null }}">
                            <a href="{{ route('admin.approvals.products.index') }}" class="menu-link">
                                <div>Products</div>
                            </a>
                        </li>
                    @endcan
                    @can('admin.approvals.sellers.index')
                        <li class="menu-item {{ request()->routeIs('admin.approvals.sellers.index') ? 'active' : null }}">
                            <a href="{{ route('admin.approvals.sellers.index') }}" class="menu-link">
                                <div>Seller</div>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcanany

        @canany(['admin.categories.index', 'admin.permissions.index'])
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Brands & Categories</span>
            </li>
        @endcanany

        @canany(['admin.brands.index', 'admin.brands.create'])
            <li
                class="menu-item {{ in_array(request()->route()->getName(),['admin.brands.index', 'admin.brands.create'])? 'open active': null }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="fa-solid fa-store menu-icon" style="font-size: 1.1rem"></i>
                    <div>Brands</div>
                </a>
                <ul class="menu-sub">

                    @can('admin.brands.index')
                        <li class="menu-item {{ request()->routeIs('admin.brands.index') ? 'active' : null }}">
                            <a href="{{ route('admin.brands.index') }}" class="menu-link">
                                <div>View All</div>
                            </a>
                        </li>
                    @endcan

                    @can('admin.brands.create')
                        <li class="menu-item {{ request()->routeIs('admin.brands.create') ? 'active' : null }}">
                            <a href="{{ route('admin.brands.create') }}" class="menu-link">
                                <div>Add New</div>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcanany

        @canany(['admin.categories.index', 'admin.categories.create'])
            <li
                class="menu-item {{ in_array(request()->route()->getName(),['admin.categories.index', 'admin.categories.create'])? 'open active': null }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="fa-brands fa-hive menu-icon" style="font-size: 1.1rem"></i>
                    <div>Categories</div>
                </a>
                <ul class="menu-sub">

                    @can('admin.categories.index')
                        <li class="menu-item {{ request()->routeIs('admin.categories.index') ? 'active' : null }}">
                            <a href="{{ route('admin.categories.index') }}" class="menu-link">
                                <div>View All</div>
                            </a>
                        </li>
                    @endcan

                    @can('admin.categories.create')
                        <li class="menu-item {{ request()->routeIs('admin.categories.create') ? 'active' : null }}">
                            <a href="{{ route('admin.categories.create') }}" class="menu-link">
                                <div>Add New</div>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcanany

        @canany(['admin.tags.index', 'admin.tags.create'])
            <li
                class="menu-item {{ in_array(request()->route()->getName(),['admin.tags.index', 'admin.tags.create'])? 'open active': null }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="fa-solid fa-tags menu-icon" style="font-size: 1.1rem"></i>
                    <div>Tags</div>
                </a>
                <ul class="menu-sub">

                    @can('admin.tags.index')
                        <li class="menu-item {{ request()->routeIs('admin.tags.index') ? 'active' : null }}">
                            <a href="{{ route('admin.tags.index') }}" class="menu-link">
                                <div>View All</div>
                            </a>
                        </li>
                    @endcan

                    @can('admin.tags.create')
                        <li class="menu-item {{ request()->routeIs('admin.tags.create') ? 'active' : null }}">
                            <a href="{{ route('admin.tags.create') }}" class="menu-link">
                                <div>Add New</div>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcanany

        @canany(['admin.sellers.index', 'admin.sellers.create'])
            <li
                class="menu-item {{ in_array(request()->route()->getName(),['admin.sellers.index', 'admin.sellers.create'])? 'open active': null }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="fa-solid fa-person-shelter menu-icon" style="font-size: 1.1rem"></i>
                    <div>Sellers</div>
                </a>
                <ul class="menu-sub">

                    @can('admin.sellers.index')
                        <li class="menu-item {{ request()->routeIs('admin.sellers.index') ? 'active' : null }}">
                            <a href="{{ route('admin.sellers.index') }}" class="menu-link">
                                <div>View All</div>
                            </a>
                        </li>
                    @endcan

                    @can('admin.sellers.create')
                        <li class="menu-item {{ request()->routeIs('admin.sellers.create') ? 'active' : null }}">
                            <a href="{{ route('admin.sellers.create') }}" class="menu-link">
                                <div>Add New</div>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcanany
    </ul>
</aside>
