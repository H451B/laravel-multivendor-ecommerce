@php

$categories = App\Models\Category::orderBy('category_name','ASC')->get();
$currentRoute = request()->route()->getName();

@endphp

<header id="header" class="header header-style-1">
    <div class="container-fluid">
        <div class="row">
            <div class="topbar-menu-area">
                <div class="container">
                    <div class="topbar-menu left-menu">
                        <ul>
                            <li class="menu-item">
                                <a title="Hotline: (+123) 456 789" href="#"><span class="icon label-before fa fa-mobile"></span>Hotline: (+123) 456 789</a>
                            </li>
                        </ul>
                    </div>
                    <div class="topbar-menu right-menu">
                        <ul>
                            @if( Auth::user())
                            <li class="menu-item"><a title="Register or Login" href="{{ route('dashboard') }}"><i class="fa-solid fa-user"></i> {{Auth::user()->name}}</a></li>
                            @else
                            <li class="menu-item"><a title="Register or Login" href="{{ route('login') }}">Login</a></li>
                            <li class="menu-item"><a title="Register or Login" href="{{ route('register') }}">Register</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="mid-section main-info-area">

                    <div class="wrap-logo-top left-section">
                        <a href="{{route('home')}}" class="link-to-home">
                            <!-- <img src="{{asset('ui/frontend/assets/images/logo-top-1.png')}}" alt="mercado"> -->
                            <p style="font-size: 4rem; font-weight:bolder; color:#0BDA51;">eBazar</p>
                        </a>
                    </div>

                    <div class="wrap-search center-section">
                        <div class="wrap-search-form">
                            <form action="#" id="form-search-top" name="form-search-top">
                                <input type="text" name="search" value="" placeholder="Search here...">
                                <button form="form-search-top" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                                <div class="wrap-list-cate">
                                    <input type="hidden" name="product-cate" value="0" id="product-cate">
                                    <a href="#" class="link-control">All Category</a>
                                    <ul class="list-cate">
                                        @foreach($categories as $category)
                                        <li class="level-0">{{$category->category_name}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="wrap-icon right-section">
                        <!-- <div class="wrap-icon-section wishlist">
                            <a href="#" class="link-direction">
                                <i class="fa fa-heart" aria-hidden="true"></i>
                                <div class="left-info">
                                    <span class="index">0 item</span>
                                    <span class="title">Wishlist</span>
                                </div>
                            </a>
                        </div> -->
                        <div class="wrap-icon-section minicart">
                            <a href="#" class="link-direction">
                                <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                <div class="left-info">
                                    <span class="index">{{ Auth::check() ? Auth::user()->cart->sum('quantity') . ' items' : '0 items' }}</span>
                                    <span class="title">CART</span>
                                </div>
                            </a>
                        </div>
                        <div class="wrap-icon-section show-up-after-1024">
                            <a href="#" class="mobile-navigation">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>

            <div class="nav-section header-sticky">
                <!-- <div class="header-nav-section">
                    <div class="container">
                        <ul class="nav menu-nav clone-main-menu" id="mercado_haead_menu" data-menuname="Sale Info" >
                            <li class="menu-item"><a href="#" class="link-term">Weekly Featured</a><span class="nav-label hot-label">hot</span></li>
                            <li class="menu-item"><a href="#" class="link-term">Hot Sale items</a><span class="nav-label hot-label">hot</span></li>
                            <li class="menu-item"><a href="#" class="link-term">Top new items</a><span class="nav-label hot-label">hot</span></li>
                            <li class="menu-item"><a href="#" class="link-term">Top Selling</a><span class="nav-label hot-label">hot</span></li>
                            <li class="menu-item"><a href="#" class="link-term">Top rated items</a><span class="nav-label hot-label">hot</span></li>
                        </ul>
                    </div>
                </div> -->

                <div class="primary-nav-section">
                    <div class="container">
                        <ul class="nav primary clone-main-menu" id="mercado_main" data-menuname="Main menu">
                            <li class="menu-item home-icon" style="{{ $currentRoute === 'home' ? 'background: #0BDA51' : 'background: transparent' }}">
                                <a href="{{route('home')}}" class="link-term mercado-item-title">
                                    <i class="fa fa-home" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li class="menu-item" style="{{ $currentRoute === 'shop' ? 'background: #0BDA51' : 'background: transparent' }}">
                                <a href="{{route('shop')}}" class="link-term mercado-item-title">Shop</a>
                            </li>
                            <li class="menu-item" style="{{ $currentRoute === 'cart' ? 'background: #0BDA51' : 'background: transparent' }}">
                                <a href="{{route('cart')}}" class="link-term mercado-item-title">Cart</a>
                            </li>
                            <li class="menu-item" style="{{ $currentRoute === 'checkout' ? 'background: #0BDA51' : 'background: transparent' }}">
                                <a href="{{route('checkout')}}" class="link-term mercado-item-title">Checkout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>