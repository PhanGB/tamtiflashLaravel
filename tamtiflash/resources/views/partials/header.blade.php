<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tam Ti Flash</title>
    <!-- <base href="http://localhost /"> -->
    <!-- <link rel="stylesheet" href="public/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/fonts/fontawesome-free-6.7.2-web/css/all.min.css" />
    <link rel="stylesheet" href="public/css/grid.css" />
    <link rel="stylesheet" href="public/css/base.css" /> -->
    @vite(['resources/bootstrap-5.3.3-dist/css/bootstrap.min.css'])
    <!-- @vite(['resources/css/normalize/8.0.1/normalize.min.css']) -->
    @vite(['resources/fonts/fontawesome-free-6.7.2-web/css/all.min.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />
    @vite(['resources/css/grid.css'])
    @vite(['resources/css/base.css'])


</head>

<body>
    <!-- Start Header -->
    <!-- Desktop -->
    <header>
        <a href=" /">
            <img src="{{ asset('images/logo/logo.png') }}" alt="TamTiFlash" class="header-logo" />
        </a>
        <ul class="header-menu">
            <li class="header-menu__item header-menu__item--active">
                <a href="/">Trang chủ</a>
            </li>
            <!-- <li class="header-menu__item">
                <a href="/tamtiflash/products">Sản phẩm</a>
            </li> -->
            <li class="header-menu__item">
                <a href="/shop">Cửa hàng</a>
            </li>
        </ul>
        <div class="header-search">
            <form action="{{ route('products.search') }}" method="get">
                <input type="text" class="header-search__input" name="keyword" placeholder="Bạn đang tìm kiếm ..." />
                <button class="header-search__btn" type="submit">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>
        </div>
        <ul class="header-menu">
            <li class="header-menu__item">
                <a href="">
                    Khác
                    <i class="fa-solid fa-chevron-down"></i>
                </a>
                <ul class="header-sub-menu">
                    <li class="header-sub-menu__item">
                        <a href="">Liên hệ</a>
                    </li>
                    <li class="header-sub-menu__item">
                        <a href="">Mã giới thiệu</a>
                    </li>
                </ul>
            </li>
        </ul>
        <a href="/MAH" class="primary-btn">MARKET AT HOME</a>
        <ul class="header-right">

            <!-- <li class="header-right__item">
                    <i class="fa-solid fa-circle-user"></i>
                    <div class="user-action">
                        <a href=" /infor">Thông tin</a>
                        <a href=" /signout">Đăng xuất</a>
                    </div>
                </li> -->

            <!-- <li class="header-right__item">
                    <i class="fa-solid fa-circle-user"></i>
                    <div class="user-action">
                        <a href=" /signin">Đăng nhập</a>
                        <a href=" /signup">Đăng ký</a>
                    </div>
                </li> -->

            @if(Auth::check())
            <li class="header-right__item">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                        <i class="fa-solid fa-circle-user"></i>
                        <div class="user-action">
                            <a href="/info">Thông tin</a>
                            <button type="submit">Đăng xuất</button>
                        </div>
                    </form>
                </li>
            @else
                <li class="header-right__item">
                    <i class="fa-solid fa-circle-user"></i>
                    <div class="user-action">
                        <a href="/login">Đăng nhập</a>
                        <a href="/register">Đăng ký</a>
                    </div>
                </li>
            @endif
            <li class="header-right__item">
                <a href="/cart">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span class="cart-quantity">1</span>
                </a>
            </li>
        </ul>
    </header>
    <!-- Mobile / Tablet -->
    <header class="header-mobile">
        <div class="grid wide">
            <div class="row">
                <div class="col l-4 c-4 m-3">
                    <a href="/MAH" class="primary-btn">MAH</a>
                </div>
                <div class="col l-4 c-3 m-3">
                    <a href=" /">
                        <img src="{{ asset('images/logo/logo.png')}}" alt="TamTiFlash" class="header-logo" />
                    </a>
                </div>
                <div class="col l-4 c-3 m-2">
                    <div class="header-right-mobile">
                        <span class="header-search-mobile" id="searchToggle">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </span>
                        <span class="header-menu-mobile" id="menuToggle">
                            <i class="fa-solid fa-bars"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Overlay -->
    <div class="overlay" id="overlay"></div>
    <!-- Modal menu -->
     @if(Auth::check())
        <ul class="modal-menu" id="modalMenu">
            <li class="modal-menu__item">
                <a href=" /info" class="modal-menu__item-icon">
                    <i class="fa-solid fa-circle-user"></i>
                </a>
                <a href="/cart" class="modal-menu__item-icon">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span class="cart-quantity mobile">1</span>
                </a>
            </li>
            <li class="modal-menu__item"><a href="/" class="modal-menu__item-text">Trang chủ</a></li>
            <li class="modal-menu__item"><a href="/shop" class="modal-menu__item-text">Cửa hàng</a></li>
            <!-- <li class="modal-menu__item"><a href="" class="modal-menu__item-text">Liên hệ</a></li> -->
            <li class="modal-menu__item"><a href="/info" class="modal-menu__item-text">Mã giới thiệu</a></li>
            <form method="POST" action="{{ route('logout') }}">
            @csrf
            <li class="modal-menu__item"><button name="submit" class="modal-menu__item-text" style="border: none; background-color: #ffffff00;">Đăng xuất</button></li>
            </form>
        </ul>
    @else
    <ul class="modal-menu" id="modalMenu">
            <li class="modal-menu__item">
                <a href=" /info" class="modal-menu__item-icon">
                    <i class="fa-solid fa-circle-user"></i>
                </a>
                <a href="/cart" class="modal-menu__item-icon">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span class="cart-quantity mobile">1</span>
                </a>
            </li>
            <li class="modal-menu__item"><a href="/" class="modal-menu__item-text">Trang chủ</a></li>
            <li class="modal-menu__item"><a href="/shop" class="modal-menu__item-text">Cửa hàng</a></li>
            <!-- <li class="modal-menu__item"><a href="" class="modal-menu__item-text">Liên hệ</a></li> -->
            <li class="modal-menu__item"><a href="/info" class="modal-menu__item-text">Mã giới thiệu</a></li>
            <li class="modal-menu__item"><a href=" /login" class="modal-menu__item-text">Đăng nhập</a></li>
        </ul>
    @endif
    <!-- <ul class="modal-menu" id="modalMenu">
        <li class="modal-menu__item">
            <a href=" /infor" class="modal-menu__item-icon">
                <i class="fa-solid fa-circle-user"></i>
            </a>
            <a href="" class="modal-menu__item-icon">
                <i class="fa-solid fa-cart-shopping"></i>
                <span class="cart-quantity mobile">1</span>
            </a>
        </li>
        <li class="modal-menu__item"><a href="" class="modal-menu__item-text">Trang chủ</a></li>
        <li class="modal-menu__item"><a href="" class="modal-menu__item-text">Sản phẩm</a></li>
        <li class="modal-menu__item"><a href="" class="modal-menu__item-text">Cửa hàng</a></li> -->
        <!-- <li class="modal-menu__item"><a href="" class="modal-menu__item-text">Liên hệ</a></li> -->
        <!-- <li class="modal-menu__item"><a href="" class="modal-menu__item-text">Mã giới thiệu</a></li>
        <li class="modal-menu__item"><a href=" /signout" class="modal-menu__item-text">Đăng xuất</a></li>
    </ul> -->
    <?php ?>
    <ul class="modal-menu" id="modalMenu">
        <li class="modal-menu__item">
            <a href=" /infor" class="modal-menu__item-icon">
                <i class="fa-solid fa-circle-user"></i>
            </a>
            <a href="" class="modal-menu__item-icon">
                <i class="fa-solid fa-cart-shopping"></i>
                <span class="cart-quantity mobile">1</span>
            </a>
        </li>
        <li class="modal-menu__item"><a href=" /" class="modal-menu__item-text">Trang chủ</a></li>
        <li class="modal-menu__item"><a href="" class="modal-menu__item-text">Sản phẩm</a></li>
        <li class="modal-menu__item"><a href="" class="modal-menu__item-text">Cửa hàng</a></li>
        <!-- <li class="modal-menu__item"><a href="" class="modal-menu__item-text">Liên hệ</a></li> -->
        <li class="modal-menu__item"><a href=" /signin" class="modal-menu__item-text">Đăng nhập</a></li>
    </ul>
    <?php ?>
    <!-- Modal Search -->
    <div class="modal-search" id="modalSearch">
        <input type="text" class="modal-search__input" placeholder="Bạn đang tìm kiếm ..." />
        <button class="modal-search__btn">
            <i class="fa-solid fa-magnifying-glass"></i>
        </button>
    </div>