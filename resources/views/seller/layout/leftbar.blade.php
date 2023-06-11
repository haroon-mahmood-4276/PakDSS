<aside class="navbar-aside" id="offcanvas_aside">
    <div class="aside-top">
        <a class="brand-wrap" href="{{ route('seller.dashboard.index') }}">
            <h3 class="logo">{{ env('APP_NAME') }}</h3>
            {{-- <img class="logo" src="{{ asset('seller-assets') }}/imgs/theme/logo.svg" alt="Evara Dashboard"> --}}
        </a>
        <div>
            <button class="btn btn-icon btn-aside-minimize">
                <i class="text-muted material-icons md-menu_open"></i>
            </button>
        </div>
    </div>
    <nav>
        <ul class="menu-aside">
            <li class="menu-item {{ request()->routeIs('seller.dashboard.index') ? 'active' : null }}">
                <a class="menu-link" href="{{ route('seller.dashboard.index') }}">
                    <i class="icon material-icons md-home"></i>
                    <span class="text">Dashboard</span></a>
            </li>

            <li class="menu-item {{ request()->routeIs('seller.brands.index') ? 'active' : null }}">
                <a class="menu-link" href="{{ route('seller.brands.index') }}">
                    <i class="icon material-icons md-stars"></i>
                    <span class="text">Brands</span>
                </a>
            </li>

            <li class="menu-item {{ request()->routeIs('seller.categories.index') ? 'active' : null }}">
                <a class="menu-link" href="{{ route('seller.categories.index') }}">
                    <i class="icon material-icons md-stars"></i>
                    <span class="text">Categories</span>
                </a>
            </li>

            <li
                class="menu-item has-submenu {{ in_array(request()->route()->getName(),['seller.shops.index', 'seller.shops.create'])? 'active': null }}">
                <a class="menu-link" href="javascript:void(0)">
                    <i class="icon material-icons md-storefront"></i>
                    <span class="text">Shops</span>
                </a>
                <div class="submenu"
                    style="display: {{ in_array(request()->route()->getName(),['seller.shops.index', 'seller.shops.create'])? 'block': 'none' }}">
                    <a class="{{ request()->routeIs('seller.shops.index') ? 'active' : null }}"
                        href="{{ route('seller.shops.index') }}">View All</a>
                    <a class="{{ request()->routeIs('seller.shops.create') ? 'active' : null }}"
                        href="{{ route('seller.shops.create') }}">Add New</a>
                </div>
            </li>

            <li
                class="menu-item has-submenu {{ in_array(request()->route()->getName(),['seller.products.index', 'seller.products.create'])? 'active': null }}">
                <a class="menu-link" href="javascript:void(0)">
                    <i class="icon material-icons md-storefront"></i>
                    <span class="text">Products</span>
                </a>
                <div class="submenu"
                    style="display: {{ in_array(request()->route()->getName(),['seller.products.index', 'seller.products.create'])? 'block': 'none' }}">
                    <a class="{{ request()->routeIs('seller.products.index') ? 'active' : null }}"
                        href="{{ route('seller.products.index') }}">View All</a>
                    <a class="{{ request()->routeIs('seller.products.create') ? 'active' : null }}"
                        href="{{ route('seller.products.create') }}">Add New</a>
                </div>
            </li>

            <li
                class="menu-item has-submenu {{ in_array(request()->route()->getName(),['seller.requests.index'])? 'active': null }}">
                <a class="menu-link" href="javascript:void(0)">
                    <i class="icon material-icons md-storefront"></i>
                    <span class="text">Request For</span>
                </a>
                <div class="submenu"
                    style="display: {{ in_array(request()->route()->getName(),['seller.requests.index'])? 'block': 'none' }}">
                    <a class="{{ request()->routeIs('seller.requests.index') ? 'active' : null }}"
                        href="{{ route('seller.requests.index', ['request' => 'brands']) }}">Brand</a>
                </div>
            </li>
        </ul>
    </nav>
</aside>
