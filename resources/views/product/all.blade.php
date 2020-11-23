@extends('layouts.app')

@section('content')
    <div class="page-content">
        <section class="featured-hp-1 items-hp-6 shop-full-page shop-right-siderbar">
            <div class="container">
                <div class="featured-content woocommerce">
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                            <div class="widget-area">
                                <!-- Search -->
                                <div class="widget widget_search">
                                    <form class="search-form" method="get" role="search">
                                        <input type="search" name="search" class="search-field" placeholder="Tìm kiếm">
                                        <button class="search-submit" type="submit">
                                            <i class="zmdi zmdi-search"></i>
                                        </button>
                                    </form>
                                </div>
                                <!-- Filter -->
                                <div class="widget_price_filter">
                                    <h3 class="widget-title">Lọc theo giá</h3>
                                    <form method="POST">
                                        <div class="price_slider_wrapper">
                                            <div class="price_slider ui-slider ui-slider-horizontal">
                                                <div id="slider-margin"></div>
                                            </div>
                                            <div class="price_slider_amount">
                                                <div class="price_label">
                                                    Giá:
                                                    <span class="from" id="value-lower"></span>
                                                    -
                                                    <span class="to" id="value-upper"></span>
                                                </div>
                                                <button type="submit" class="button au-btn-black btn-small">Lọc</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- Categories -->
                                <div class="widget widget_product_categories">
                                    <h3 class="widget-title">Danh mục</h3>
                                    <ul class="product-categories">
                                        <li class="cat-item cat-parent">
                                            <a href="#"><span>Decoration</span></a>
                                            <a href="#"><span>(2)</span></a>
                                        </li>
                                        <li class="cat-item cat-parent">
                                            <a href="#"><span>Lamps</span></a>
                                            <a href="#"><span>(18)</span></a>
                                        </li>
                                        <li class="cat-item cat-parent">
                                            <a href="#"><span>Interior</span></a>
                                            <a href="#"><span>(9)</span></a>
                                        </li>
                                        <li class="cat-item cat-parent">
                                            <a href="#"><span>Furniture</span></a>
                                            <a href="#"><span>(22)</span></a>
                                        </li>
                                        <li class="cat-item cat-parent">
                                            <a href="#"><span>Wooden</span></a>
                                            <a href="#"><span>(14)</span></a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Products -->
                                <div class="widgets widget_products">
                                    <h3 class="widget-title">Sản phẩm liên quan</h3>
                                    <div class="product_list_widget">
                                        <a href="#">
                                            <img src="images/shop-right-sidebar-1.jpg" alt="product">
                                        </a>
                                        <div class="info">
                                            <h5 class="product-title"><a href="#">Set of 3 Porcelain</a></h5>
                                            <span class="price">
                                                <span class="woocommerce-Price-amount amount">
                                                    <span class="woocommerce-Price-currencySymbol">$</span>124
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="product_list_widget">
                                        <a href="#">
                                            <img src="images/shop-right-sidebar-2.jpg" alt="product">
                                        </a>
                                        <div class="info">
                                            <h5 class="product-title"><a href="#">Casia Side Table</a></h5>
                                            <span class="price">
                                                <span class="woocommerce-Price-amount amount">
                                                    <span class="woocommerce-Price-currencySymbol">$</span>246
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="product_list_widget">
                                        <a href="#">
                                            <img src="images/shop-right-sidebar-3.jpg" alt="product">
                                        </a>
                                        <div class="info">
                                            <h5 class="product-title"><a href="#">Low Table/Stool</a></h5>
                                            <span class="price">
                                                <span class="woocommerce-Price-amount amount">
                                                    <span class="woocommerce-Price-currencySymbol">$</span>29
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Banner -->
                                <div class="widgets widget_banner">
                                    <img src="images/widget_banner.jpg" alt="banner">
                                    <div class="widget_banner-content">
                                        <span>ON SALE</span>
                                        <p>Awa Pendant Lamp</p>
                                        <a href="shop-full-width.html">Shop Now<i class="zmdi zmdi-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                            <div class="content-area">
                                <div class="storefront-sorting">
                                    <p class="woocommerce-result-count">Showing 1 – 12 of 35 results</p>
                                    <form class="woocommerce-ordering" method="get">
                                        <select name="orderby" class="orderby">
                                            <option value="popularity" selected="selected">Sort by popularity</option>
                                            <option value="rating">Sort by average rating</option>
                                            <option value="date">Sort by newness</option>
                                            <option value="price">Sort by price: low to high</option>
                                            <option value="price-desc">Sort by price: high to low</option>
                                        </select>
                                        <span><i class="zmdi zmdi-chevron-down"></i></span>
                                    </form>
                                </div>
                                <div class="row">
                                    @if(count($product) > 0)
                                        @foreach($product as $products)
                                            <div class="col-sm-12 col-12 col-md-4 col-xl-4 col-lg-4">
                                                <div class="product type-product">
                                                    <a href="{{ route('product.detail', $products->slug) }}">
                                                        <div class="woocommerce-LoopProduct-link">
                                                        <div class="product-image">
                                                            <p class="wp-post-image">
                                                                <img class="image-cover" src="{{ asset('public/images/products/'.$products->image_1) }}" alt="{{ $products->name }}">
                                                                <img class="image-secondary" src="{{ asset('public/images/products/'.$products->image_1) }}" alt="{{ $products->name }}">
                                                            </p>
                                                            <a href="#" class="onsale">SALE</a>
                                                            <div class="yith-wcwl-add-button show">
                                                                <a href="#" class="add_to_wishlist">
                                                                    <i class="zmdi zmdi-favorite-outline"></i>
                                                                </a>
                                                            </div>
                                                            <div class="button add_to_cart_button">
                                                                <a href="#">
                                                                    <img src="{{ asset('public/images/icons/shopping-cart-black-icon.png') }}" alt="cart">
                                                                </a>
                                                            </div>
                                                            <h5 class="woocommerce-loop-product__title"><a href="#">{{ $products->name }}</a></h5>
                                                            <span class="price">
                                                                <del>
                                                                    <span class="woocommerce-Price-amount amount text-danger">
                                                                        {{ number_format($products->price - $products->price*($products->sale/100), 0, '', '.') }}
                                                                        <span class="woocommerce-Price-currencySymbol">đ</span>
                                                                    </span>
                                                                </del>
                                                                <ins>
                                                                    <span class="woocommerce-Price-amount amount">
                                                                        {{ number_format($products->price, 0, '', '.') }}
                                                                        <span class="woocommerce-Price-currencySymbol">đ</span>
                                                                    </span>
                                                                </ins>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="navigation pagination">
                                <div class="page-numbers">
                                    <a href="#" class="page-numbers current">
                                        <span>1</span>
                                    </a>
                                    <a href="#" class="page-numbers">
                                        <span>2</span>
                                    </a>
                                    <a href="#" class="page-numbers">
                                        <span>3</span>
                                    </a>
                                    <a href="#" class="page-numbers">
                                        <span><i class="zmdi zmdi-chevron-right"></i></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Shop Section -->
    </div>

@endsection
