<header class="header">
    <!-- Show Desktop Header -->
    <div class="show-desktop-header header-hp-1 style-header-hp-1">
        <div id="js-navbar-fixed" class="menu-desktop">
            <div class="container-fluid">
                <div class="menu-desktop-inner">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="{{ route('home') }}"><img src="{{ asset('public/images/icons/logo-black.png') }}" alt="logo"></a>
                    </div>
                    <!-- Main Menu -->
                    <nav class="main-menu">
                        <ul>
                            <li class="menu-item mega-menu">

                                <span>DANH MỤC</span>

                                <ul class="sub-menu">
                                    <li class="sub-menu-item">
                                        @if(count($category) > 0)
                                            <ul class="one">
                                                @foreach($category as $categories)
                                                    <li><a href="{{ route('get.product.category', $categories->slug) }}"
                                                           style="text-transform: capitalize;">{{ $categories->name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                    <li class="sub-menu-item sub-menu-item-1">
                                        <img class="ml-5" src="{{ asset('public/images/products/header-shop-images.png') }}" alt="shop" width="250" height="300">
                                        <figure>

                                        </figure>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item mega-menu">
                                <a href="{{ route('product.all') }}">
                                    TẤT CẢ SẢN PHẨM
                                </a>
                            </li>
                            <li class="menu-item mega-menu">
                                <a href="{{ route('about.us') }}">
                                    GIỚI THIỆU
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- Header Right -->
                    <div class="header-right">
                        <!-- Cart -->
                        <div class="site-header-cart">
                            <div class="cart-contents">
                                <img src="{{ asset('public/images/icons/shopping-cart-black-icon.png') }}" alt="cart" class="mb-1">
                            </div>
                            <div class="widget_shopping_cart">
                                <div class="widget_shopping_cart_content">
                                    <ul class="woocommerce-mini-cart cart_list product_list_widget ">
                                        <li class="woocommerce-mini-cart-item mini_cart_item clearfix">
                                            <a class="product-image" href="#">
                                                <img src="{{ asset('public/images/hp-1-drop-cart-1.png') }}" alt="cart-1">
                                            </a>
                                            <a class="product-title" href="#">Low Table/Stool</a>
                                            <span class="quantity">
                                                        4 ×
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span class="woocommerce-Price-currencySymbol">$</span>
                                                            29
                                                        </span>
                                                    </span>
                                            <a href="#" class="remove">
                                                <span class="lnr lnr-cross"></span>
                                            </a>
                                        </li>
                                        <li class="woocommerce-mini-cart-item mini_cart_item clearfix">
                                            <a class="product-image" href="#">
                                                <img src="{{ asset('public/images/hp-1-drop-cart-2.png') }}" alt="cart-2">
                                            </a>
                                            <a class="product-title" href="#">Set of 3 Porcelain</a>
                                            <span class="quantity">
                                                        2 ×
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span class="woocommerce-Price-currencySymbol">$</span>
                                                            124
                                                        </span>
                                                    </span>
                                            <a href="#" class="remove">
                                                <span class="lnr lnr-cross"></span>
                                            </a>
                                        </li>
                                    </ul>
                                    <p class="woocommerce-mini-cart__total total">
                                        <span>Tổng : </span>
                                        <span class="woocommerce-Price-amount amount">
                                                    <span class="woocommerce-Price-currencySymbol">$</span>
                                                    364
                                                </span>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="btn-admin">
                            <a href="{{ route('dashboard') }}">
                                <i class="fal fa-lock" style="font-size: 22px; margin-left: 20px;"></i>
                            </a>

                        </div>
                    </div>
                </div>
                <!-- SEARCH MODAL-->
                <div class="modal fade" id="searchModal" role="dialog">
                    <button class="close" type="button" data-dismiss="modal">
                        <i class="zmdi zmdi-close"></i>
                    </button>
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <form id="searchModal__form" method="POST">
                                    <button id="searchModal__submit" type="submit">
                                        <i class="zmdi zmdi-search"></i>
                                    </button>
                                    <input id="searchModal__input" type="text" name="search" placeholder="Search Here ..." />
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END SEARCH MODAL-->

                <!-- CANVAS MODAL-->
                <div class="modal fade" id="canvasModal" role="dialog">
                    <button class="close" type="button" data-dismiss="modal">
                        <i class="zmdi zmdi-close"></i>
                    </button>
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="canvas-content">
                                    <div class="logo">
                                        <a href="index1.html"><img src="{{ asset('public/images/icons/logo-black.png') }}" alt="logo"></a>
                                    </div>
                                    <div class="insta">
                                        <div class="insta-inner">
                                            <div class="images">
                                                <a href="#" class="images-inner">
                                                    <div class="overlay"></div>
                                                    <img src="{{ asset('public/images/hp-1-canvas-1.jpg') }}" alt="insta">
                                                </a>
                                            </div>
                                            <div class="images">
                                                <a href="#" class="images-inner">
                                                    <div class="overlay"></div>
                                                    <img src="{{ asset('public/images/hp-1-canvas-2.jpg') }}" alt="insta">
                                                </a>
                                            </div>
                                            <div class="images">
                                                <a href="#" class="images-inner">
                                                    <div class="overlay"></div>
                                                    <img src="{{ asset('public/images/hp-1-canvas-3.jpg') }}" alt="insta">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="insta-inner">
                                            <div class="images">
                                                <a href="#" class="images-inner">
                                                    <div class="overlay"></div>
                                                    <img src="{{ asset('public/images/hp-1-canvas-4.jpg') }}" alt="insta">
                                                </a>
                                            </div>
                                            <div class="images">
                                                <a href="#" class="images-inner">
                                                    <div class="overlay"></div>
                                                    <img src="{{ asset('public/images/hp-1-canvas-5.jpg') }}" alt="insta">
                                                </a>
                                            </div>
                                            <div class="images">
                                                <a href="#" class="images-inner">
                                                    <div class="overlay"></div>
                                                    <img src="{{ asset('public/images/hp-1-canvas-6.jpg') }}" alt="insta">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="contact">
                                        <h4>Contact</h4>
                                        <div class="contact-inner">
                                            <i class="zmdi zmdi-map"></i>
                                            <div class="contact-info">
                                                <span>No 40 Baria Sreet 133/2</span>
                                            </div>
                                        </div>
                                        <div class="contact-inner">
                                            <i class="zmdi zmdi-phone"></i>
                                            <div class="contact-info">
                                                <span><a href="tel:15618003666666">+ (156) 1800-366-6666</a></span>
                                            </div>
                                        </div>
                                        <div class="contact-inner">
                                            <i class="zmdi zmdi-email"></i>
                                            <div class="contact-info">
                                                <span>Eric-82@example.com</span>
                                            </div>
                                        </div>
                                        <div class="contact-inner">
                                            <i class="zmdi zmdi-globe"></i>
                                            <div class="contact-info">
                                                <span>www.novas.com</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="email">
                                        <div class="send">
                                            <i class="zmdi zmdi-mail-send"></i>
                                        </div>
                                        <input type="email" required="" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" name="email" placeholder="Your e-mail...">
                                    </div>
                                    <div class="socials">
                                        <a href="#"><i class="zmdi zmdi-facebook"></i></a>
                                        <a href="#"><i class="zmdi zmdi-twitter"></i></a>
                                        <a href="#"><i class="zmdi zmdi-tumblr"></i></a>
                                        <a href="#"><i class="zmdi zmdi-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END CANVAS MODAL-->
            </div>
        </div>
    </div>
    <!-- Show Mobile Header -->
    <div  id="js-navbar-mb-fixed" class="show-mobile-header">
        <!-- Logo And Hamburger Button -->
        <div class="mobile-top-header">
            <div class="logo-mobile">
                <a href="index1.html"><img src="{{ asset('public/images/icons/logo-black.png') }}" alt="logo"></a>
            </div>
            <button class="hamburger hamburger--spin hidden-tablet-landscape-up" id="toggle-icon">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
            </button>
        </div>
        <!-- Au Navbar Menu -->
        <div class="au-navbar-mobile navbar-mobile-1">
            <div class="au-navbar-menu">
                <ul>
                    <li class="drop">
                        <a class="drop-link" href="#">
                            SHOP
                            <span class="arrow">
                                        <i class="zmdi zmdi-chevron-down"></i>
                                    </span>
                        </a>
                        <ul class="drop-menu bottom-right">
                            <li class="drop">
                                <a class="drop-link" href="#">
                                    SHOP TYPES
                                    <span class="arrow">
                                            <i class="zmdi zmdi-chevron-down"></i>
                                        </span>
                                </a>
                                <ul class="drop-menu bottom-right">
                                    <li><a class="drop-menu-inner" href="shop-full-width.html">Shop Full Width</a></li>
                                    <li><a class="drop-menu-inner" href="shop-right-width-siderbar.html">Shop Right Width Sidebar</a></li>
                                    <li><a class="drop-menu-inner" href="shop-left-width-siderbar.html">Shop Left Width Sidebar</a></li>
                                    <li><a class="drop-menu-inner" href="shop-single-v1.html">Shop Single_v1</a></li>
                                    <li><a class="drop-menu-inner" href="shop-single-v2.html">Shop Single_v2</a></li>
                                </ul>
                            </li>
                            <li class="drop">
                                <a class="drop-link" href="#">
                                    SHOP PAGES
                                    <span class="arrow">
                                            <i class="zmdi zmdi-chevron-down"></i>
                                        </span>
                                </a>
                                <ul class="drop-menu bottom-right">
                                    <li><a class="drop-menu-inner" href="shop-cart.html">Shop Cart</a></li>
                                    <li><a class="drop-menu-inner" href="wish-list.html">Wish List</a></li>
                                    <li><a class="drop-menu-inner" href="check-out.html">Check Out</a></li>
                                    <li><a class="drop-menu-inner" href="my-account.html">My Account</a></li>
                                    <li><a class="drop-menu-inner" href="order-tracking.html">Order Tracking</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="drop">
                        <a class="drop-link" href="#">
                            BLOG
                            <span class="arrow">
                                        <i class="zmdi zmdi-chevron-down"></i>
                                    </span>
                        </a>
                        <ul class="drop-menu bottom-right">
                            <li><a href="blog-masonry.html">BLOG MASONRY</a></li>
                            <li class="drop">
                                <a class="drop-link" href="#">
                                    BLOG STANDARD
                                    <span class="arrow">
                                            <i class="zmdi zmdi-chevron-down"></i>
                                        </span>
                                </a>
                                <ul class="drop-menu bottom-right">
                                    <li><a class="drop-menu-inner" href="right-sidebar.html">Right Sidebar</a></li>
                                    <li><a class="drop-menu-inner" href="left-sidebar.html">Left Sidebar</a></li>
                                    <li><a class="drop-menu-inner" href="no-sidebar.html">No Sidebar</a></li>
                                </ul>
                            </li>
                            <li class="drop">
                                <a class="drop-link" href="#">
                                    POST TYPES
                                    <span class="arrow">
                                            <i class="zmdi zmdi-chevron-down"></i>
                                        </span>
                                </a>
                                <ul class="drop-menu bottom-right">
                                    <li><a class="drop-menu-inner" href="standard-post.html">Standard Post</a></li>
                                    <li><a class="drop-menu-inner" href="gallery-post.html">Gallery Post</a></li>
                                    <li><a class="drop-menu-inner" href="link-post.html">Link Post</a></li>
                                    <li><a class="drop-menu-inner" href="quote-post.html">Quote Post</a></li>
                                    <li><a class="drop-menu-inner" href="video-post.html">Video Post</a></li>
                                    <li><a class="drop-menu-inner" href="audio-post.html">Audio Post</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="drop">
                        <a class="drop-link" href="#">
                            PORTFOLIO
                            <span class="arrow">
                                        <i class="zmdi zmdi-chevron-down"></i>
                                    </span>
                        </a>
                        <ul class="drop-menu bottom-right">
                            <li class="drop">
                                <a class="drop-link" href="#">
                                    STANDARD LIST
                                    <span class="arrow">
                                            <i class="zmdi zmdi-chevron-down"></i>
                                        </span>
                                </a>
                                <ul class="drop-menu bottom-right">
                                    <li><a class="drop-menu-inner" href="standard-grid.html">Standard Gird</a></li>
                                    <li><a class="drop-menu-inner" href="standard-wide.html">Standard Wide</a></li>
                                </ul>
                            </li>
                            <li class="drop">
                                <a class="drop-link" href="#">
                                    GALLERY LIST
                                    <span class="arrow">
                                            <i class="zmdi zmdi-chevron-down"></i>
                                        </span>
                                </a>
                                <ul class="drop-menu bottom-right">
                                    <li><a class="drop-menu-inner" href="gallery-grid.html">Gallery Gird</a></li>
                                    <li><a class="drop-menu-inner" href="gallery-wide.html">Gallery Wide</a></li>
                                </ul>
                            </li>
                            <li class="drop">
                                <a class="drop-link" href="#">
                                    MASONRY LIST
                                    <span class="arrow">
                                            <i class="zmdi zmdi-chevron-down"></i>
                                        </span>
                                </a>
                                <ul class="drop-menu bottom-right">
                                    <li><a class="drop-menu-inner" href="masonry-grid.html">Masonry Gird</a></li>
                                    <li><a class="drop-menu-inner" href="masonry-wide.html">Masonry Wide</a></li>
                                </ul>
                            </li>
                            <li class="drop">
                                <a class="drop-link" href="#">
                                    LAYOUTS
                                    <span class="arrow">
                                            <i class="zmdi zmdi-chevron-down"></i>
                                        </span>
                                </a>
                                <ul class="drop-menu bottom-right">
                                    <li><a class="drop-menu-inner" href="two-columns-grid.html">Two Columns Grid</a></li>
                                    <li><a class="drop-menu-inner" href="three-columns-grid.html">Three Columns Grid</a></li>
                                    <li><a class="drop-menu-inner" href="three-columns-wide.html">Three Columns Wide</a></li>
                                    <li><a class="drop-menu-inner" href="four-columns-grid.html">Four Columns Grid</a></li>
                                    <li><a class="drop-menu-inner" href="four-columns-wide.html">Four Columns Wide</a></li>
                                    <li><a class="drop-menu-inner" href="five-columns-wide.html">Five Columns Wide</a></li>
                                </ul>
                            </li>
                            <li class="drop">
                                <a class="drop-link" href="#">
                                    SINGLE TYPES
                                    <span class="arrow">
                                            <i class="zmdi zmdi-chevron-down"></i>
                                        </span>
                                </a>
                                <ul class="drop-menu bottom-right">
                                    <li><a class="drop-menu-inner" href="small-images.html">Small Images</a></li>
                                    <li><a class="drop-menu-inner" href="big-images.html">Big Images</a></li>
                                    <li><a class="drop-menu-inner" href="small-slider.html">Small Slider</a></li>
                                    <li><a class="drop-menu-inner" href="big-slider.html">Big Slider</a></li>
                                    <li><a class="drop-menu-inner" href="small-gallery.html">Small Gallery</a></li>
                                    <li><a class="drop-menu-inner" href="big-gallery.html">Big Gallery</a></li>
                                    <li><a class="drop-menu-inner" href="small-masonry.html">Small Masonry</a></li>
                                    <li><a class="drop-menu-inner" href="big-masonry.html">Big Masonry</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="drop">
                        <a class="drop-link" href="#">
                            ELEMENTS
                            <span class="arrow">
                                        <i class="zmdi zmdi-chevron-down"></i>
                                    </span>
                        </a>
                        <ul class="drop-menu bottom-right">
                            <li class="drop">
                                <a class="drop-link" href="#">
                                    SHOP / PRODUCTS
                                    <span class="arrow">
                                            <i class="zmdi zmdi-chevron-down"></i>
                                        </span>
                                </a>
                                <ul class="drop-menu bottom-right">
                                    <li><a class="drop-menu-inner" href="product-categories.html">Product Categories</a></li>
                                    <li><a class="drop-menu-inner" href="standard-list.html">Standard List</a></li>
                                    <li><a class="drop-menu-inner" href="product-widget.html">Product Widget</a></li>
                                    <li><a class="drop-menu-inner" href="masonry-list.html">Masonry List</a></li>
                                    <li><a class="drop-menu-inner" href="product-showcase.html">Product Showcase</a></li>
                                </ul>
                            </li>
                            <li class="drop">
                                <a class="drop-link" href="#">
                                    THEMING
                                    <span class="arrow">
                                            <i class="zmdi zmdi-chevron-down"></i>
                                        </span>
                                </a>
                                <ul class="drop-menu bottom-right">
                                    <li><a class="drop-menu-inner" href="banner.html">Banner</a></li>
                                    <li><a class="drop-menu-inner" href="our-team.html">Our Team</a></li>
                                    <li><a class="drop-menu-inner" href="testimonial.html">Testimonial</a></li>
                                    <li><a class="drop-menu-inner" href="countdown-timer.html">Countdown Timer</a></li>
                                    <li><a class="drop-menu-inner" href="mailchimp-form.html">Mailchimp Form</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
