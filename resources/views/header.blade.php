<header>
    <link rel="stylesheet" href="{{ asset('/template/css/style.css') }}">

    @php $menusHtml = \App\Helpers\Helper::menus($menus); @endphp

    <!-- Header desktop -->
    <div class="container-menu-desktop">
        <div class="wrap-menu-desktop">
            <nav class="limiter-menu-desktop container">

                <!-- Logo desktop -->
                <a href="/" class="logo">
                    <img src="/template/images/icons/5.png" alt="IMG-LOGO">
                </a>

                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li class="active-menu">
                            <a href="/">Trang Chủ</a>
                        </li>

                        {!! $menusHtml !!}

                        <li>
                            <a href="{{ route('contact') }}">Liên Hệ</a>
                        </li>
                    </ul>
                </div>

                <!-- Icon header và nút Đăng nhập -->
                <div class="wrap-icon-header flex-w flex-r-m">
    <!-- <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search" style="margin-right: 15px;">
        <i class="zmdi zmdi-search"></i>
    </div> -->

    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart"
     data-notify="{{ !is_null(\Session::get('carts')) ? count(\Session::get('carts')) : 0 }}" style="margin-right: 15px;">
    <img src="/template/images/icons/trolley.png" alt="gio hang">
</div>

                    <!-- Nút Đăng nhập -->
                    <div class="d-inline-block">
    @if (isset($currentUser) && $currentUser)
        <!-- Hiển thị thông tin người dùng nếu đã đăng nhập -->
        <div class="profile-card position-relative">
            <div class="profile-header">
                <p class="mb-0 fw-bold">Chào, {{ Auth::user()->name }} </p>
                
            </div>

            <!-- Dropdown menu -->
            <ul class="profile-dropdown list-unstyled m-0">
                <li><a href="{{ route('user.profile', ['id' => Auth::user()->id]) }}" class="text-decoration-none text-dark">Profile</a></li>
                <li><a href="{{ route('order') }}" class="text-decoration-none text-dark">Order</a></li>
                @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 3)
        <li><a href="{{ route('admin') }}" class="text-decoration-none text-dark">Go to Admin</a></li>
    @endif
                <li>
                    <a href="{{ route('logout') }}" class="text-decoration-none text-danger"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    @else
        <!-- Hiển thị nút Login nếu chưa đăng nhập -->
        <a href="{{ route('login') }}" class="btn-custom">
            Đăng nhập
        </a>
    @endif
</div>


                </div>

            </nav>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
        <!-- Logo moblie -->
        <div class="logo-mobile">
            <a href="/"><img src="/template/images/icons/5.png" alt="IMG-LOGO"></a>
        </div>

        <!-- Icon header -->
        <div class="wrap-icon-header flex-w flex-r-m m-r-15">
            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
                <i class="zmdi zmdi-search"></i>
            </div>

            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart"
                 data-notify="2">
                <i class="zmdi zmdi-shopping-cart"></i>
            </div>
        </div>

        <!-- Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
        </div>
    </div>

    <!-- Menu Mobile -->
    <div class="menu-mobile">
        <ul class="main-menu-m">
            <li class="active-menu"><a href="/">Trang Chủ</a></li>

            {!! $menusHtml !!}

            <li>
                <a href="{{ route('contact') }}">Liên Hệ</a>
            </li>
        </ul>
    </div>

    <!-- Modal Search -->
    <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
        <div class="container-search-header">
            <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                <img src="/template/images/icons/icon-close2.png" alt="CLOSE">
            </button>

            <form class="wrap-search-header flex-w p-l-15">
                <button class="flex-c-m trans-04">
                    <i class="zmdi zmdi-search"></i>
                </button>
                <input class="plh3" type="text" name="search" placeholder="Search...">
            </form>
        </div>
    </div>
</header>
