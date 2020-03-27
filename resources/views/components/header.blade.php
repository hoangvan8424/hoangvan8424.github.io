<div class="header-area sticky header-area-1 clearfix bg-info">
    <!-- Header Left 1 -->
    <div class="header-left header-left-1 float-left">
        <a href="{{ route('home') }}" class="logo">
            <img src="{{ asset('img/logo.png') }}" alt="logo"/>
        </a>
    </div>
    <!-- Menu Wrapper 1 -->
    <div class="menu-wrapper menu-wrapper-1 hidden-sm hidden-xs text-center">
        <div class="menu menu-1">
            <nav>
                <ul>

                    @if(isset($category))
                        @foreach($category as $categories)
                            <li>
                                <a href="{{ route('get.list.product', [$categories->c_slug, $categories->id]) }}">{{ $categories->c_name }}</a>
                            </li>
                        @endforeach
                    @endif

                    <li>
                        <a href="#">Liên hệ</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <!-- Header Right 1 -->
    <div class="header-right header-right-1 float-right">
        <!-- Account Menu -->
        <div class="account-menu account-menu-1 float-right">
            <button data-toggle="dropdown" class="acc-menu-toggle">
                <i class="zmdi zmdi-settings"></i>
            </button>
            <ul class="acc-menu-dropdown dropdown-menu right">
                @if(Auth::check())
                    <li>
                        <a href="#">Tài khoản</a>
                    </li>
                    <li>
                        <a href="#">Thanh toán</a>
                    </li>
                    <li>
                        <a href="#">D/s yêu thích</a>
                    </li>
                    <li>
                        <a href="{{ route('get.logout') }}">Đăng xuất</a>
                    </li>
                @else
                    <li>
                        <a href="{{ route('get.login') }}">Đăng nhập</a>
                    </li>
                    <li>
                        <a href="{{ route('get.register') }}">Đăng ký</a>
                    </li>
                @endif
            </ul>
        </div>

        <!-- Mini Cart -->
        <div class="mini-cart-wrapper mini-cart-wrapper-1 float-right">
            <a href="#" data-toggle="dropdown" class="mini-cart-btn">
                <span>
                    <i class="zmdi zmdi-shopping-cart"></i>
                        @if(session('cart'))
                        <span class="cart-number">{{ count(session('cart')) }}</span>
                    @endif
                </span>
            </a>
            @php
                $total = 0;
            @endphp
            @if(session('cart'))
                <div class="mini-cart dropdown-menu right">
                    @foreach(session('cart') as $id => $cartDetail)
                        @php
                            $total += $cartDetail['price'] * $cartDetail['quantity'];
                        @endphp
                        <a href="{{ route('get.detail.product', [$cartDetail['slug'], $id]) }}">
                            <div class="mini-cart-product fix">
                                <img src="/img/product/{{ $cartDetail['photo'] }}" alt="{{ $cartDetail['name'] }}"/>
                                <div class="content fix">
                                    <div class="mini-cart-details">
                                        <p class="title">{{ $cartDetail['name'] }}</p>
                                        <p>Số lượng: {{ $cartDetail['quantity'] }}</p>
                                        <p>Giá: {{ number_format($cartDetail['price'], 0, '', '.') }}đ</p>
                                    </div>
                                    <button class="remove">
                                        <i class="zmdi zmdi-close"></i>
                                    </button>
                                </div>
                            </div>
                        </a>
                    @endforeach

                    <div class="mini-cart-total">
                        <span>Tổng cộng: </span>
                        <p>{{ number_format($total, 0, '', '.') }}đ</p>
                    </div>
                    <div class="mini-cart-checkout text-center">
                        <a href="{{ route('get.list.cart') }}" class="btn btn-block">Thanh toán</a>
                    </div>
                </div>
            @endif
        </div>

        <!-- Header Search -->
        <div class="header-search header-search-1 hidden-xs float-right">
            <button data-toggle="dropdown" class="search-toggle">
                <i class="zmdi zmdi-search"></i>
            </button>
            {{--            <div class="search-dropdown dropdown-menu right">--}}
            {{--                <form action="#">--}}
            {{--                    <input type="text" placeholder="Tên sản phẩm..." />--}}
            {{--                </form>--}}
            {{--            </div>--}}
        </div>
    </div>
</div>
