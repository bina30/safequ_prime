@if ($header_show)
    @if (get_setting('topbar_banner') != null)
        <div class="position-relative top-banner removable-session z-1035 d-none" data-key="top-banner"
            data-value="removed">
            <a href="{{ get_setting('topbar_banner_link') }}" class="d-block text-reset">
                <img src="{{ uploaded_asset(get_setting('topbar_banner')) }}"
                    class="w-100 mw-100 h-50px h-lg-auto img-fit">
            </a>
            <button class="btn text-white absolute-top-right set-session" data-key="top-banner" data-value="removed"
                data-toggle="remove-parent" data-parent=".top-banner">
                <i class="la la-close la-2x"></i>
            </button>
        </div>
    @endif

    <header class="header {{ $header2 ? 'header2' : '' }}">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ static_asset('assets/img/safequ-logo.png') }}" alt="SafeQu Logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse disp-none-lg" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('products') }}">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="@{{ route('profile') }}">Account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="@{{ route('orders') }}">My Orders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="@{{ route('wallet') }}">Wallet</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="@{{ route('notification') }}">Notification</a>
                        </li>
                    </ul>
                    <div class="cart-icon pl-4">
                        <a href="cart">
                            <i class="fad fa-shopping-cart"></i>
                            <span class="cart-item-count">0</span>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div class="sideNav disp-lg flex-astart-jbtw">
        <div class="nav-menu">
            <div class="text-right close-sidenav">
                <i class="fad fa-times fsize18 px-3 py-1"></i>
            </div>

            <div class="user-profile flex-acenter-jstart pt-3 pb-4">
                <img src="{{ static_asset('assets/img/user-3.webp') }}" alt="User img">
                <div class="pl-3">
                    <p class="fw500 title-txt mb-1">Robart Carol</p>
                    <p class="fsize13 body-txt mb-0">Community: Lodha Park</p>
                </div>
            </div>

            <ul class="side-nav-links mb-0 py-2">
                <a href="@{{ route('orders') }}">
                    <li class="p-2 mb-2"> <i class="fad fa-bags-shopping"></i> My Orders</li>
                </a>
                <a href="@{{ route('products') }}">
                    <li class="p-2 mb-2"> <i class="fad fa-conveyor-belt-alt"></i> Products</li>
                </a>
                <a href="@{{ route('wallet') }}">
                    <li class="p-2 mb-2"> <i class="fad fa-wallet"></i> Wallet</li>
                </a>
                <a href="@{{ route('profile') }}">
                    <li class="p-2 mb-2"> <i class="fad fa-user"></i> Account</li>
                </a>
                <a href="@{{ route('notification') }}">
                    <li class="p-2 mb-2"> <i class="fad fa-bell-on"></i> Notifications</li>
                </a>
                <a href="@{{ route('cart') }}">
                    <li class="p-2 mb-2">
                        <div class="cart-icon">
                            <i class="fad fa-shopping-cart mr-2"></i> <span class="cart-item-count">0</span>
                            Cart
                        </div>
                    </li>
                </a>
            </ul>

            <div class="bottom bt-1 pt-2">
                <ul class="mb-0">
                    <a href="{{ route('user.login') }}">
                        <li class="p-2 mb-1"> <i class="fad fa-sign-in"></i> Login</li>
                    </a>
                    <a href="@{{ route('login') }}">
                        <li class="p-2 mb-1"> <i class="fad fa-sign-out"></i> Logout</li>
                    </a>
                </ul>
            </div>
        </div>
    </div>
@endif
