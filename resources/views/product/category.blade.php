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
                                    <form class="search-form">
                                        <input type="text" name="title_search" class="search-field" placeholder="Tìm kiếm" value="{{ \Request::get('title_search') }}">
                                        <button class="search-submit" type="submit">
                                            <i class="zmdi zmdi-search"></i>
                                        </button>
                                    </form>
                                </div>
                                <!-- Filter -->
                                <div class="widget_price_filter">
                                    <h3 class="widget-title">Giá bán</h3>
                                    <div class="price-filter">
                                        <ul>
                                            <li class="{{ Request::get('price') == 1 ? 'active':'' }}">
                                                <a href="{{ request()->fullUrlWithQuery(['price' => 1]) }}" title="Dưới 5 triệu">
                                                    Dưới 5 triệu
                                                </a>
                                            </li>
                                            <li class="{{ Request::get('price') == 5 ? 'active':'' }}">
                                                <a href="{{ request()->fullUrlWithQuery(['price' => 5]) }}" title="Từ 5 - 7 triệu">
                                                    Từ 5.000.000 - 7.000.000đ
                                                </a>
                                            </li>
                                            <li class="{{ Request::get('price') == 7 ? 'active':'' }}">
                                                <a href="{{ request()->fullUrlWithQuery(['price' => 7]) }}">
                                                    Từ 7.000.000 - 10.000.000đ
                                                </a>
                                            </li>
                                            <li class="{{ Request::get('price') == 10 ? 'active':'' }}">
                                                <a href="{{ request()->fullUrlWithQuery(['price' => 10]) }}">
                                                    Trên 10.000.000đ
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                                <!-- Products -->
                                <div class="widgets widget_products">
                                    <h3 class="widget-title">Sản phẩm mới</h3>
                                    @if(isset($productNew))
                                        @foreach($productNew as $productNews)
                                            <div class="product_list_widget">
                                                <a href="{{ route('product.detail', $productNews->slug) }}">
                                                    <img
                                                        src="{{ asset('public/images/products/'.$productNews->image_1) }}"
                                                        alt="product">
                                                </a>
                                                <div class="info">
                                                    <h5 class="product-title">{{ $productNews->name }}</h5>
                                                    <span class="price">
                                                        <span class="woocommerce-Price-amount amount">
                                                            {{ number_format($productNews->price, 0, '', '.') }}
                                                            <span class="woocommerce-Price-currencySymbol">đ</span>
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>

                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                            <div class="content-area">
                                <div class="storefront-sorting justify-content-start">
                                    <p class="title-sort">Sắp xếp theo</p>
                                    <div class="pro-sort">
                                        <ul>
                                            <li class="sort-by {{ Request::get('orderby') == 1 ? "active":""}}"
                                                data-param="orderby = 1">
                                                <a href="{{ request()->fullUrlWithQuery(['orderby' => 1]) }}" class="w-100">
                                                    <label class="radio-container">Cũ nhất
                                                        <input type="radio" checked="checked" name="sort">
                                                        <span class="radio-checkmark"></span>
                                                    </label>
                                                </a>
                                            </li>
                                            <li class="sort-by {{ Request::get('orderby') == 2 ? "active":""}}"
                                                data-param="orderby = 2">
                                                <a href="{{ request()->fullUrlWithQuery(['orderby' => 2]) }}" class="w-100">
                                                    <label class="radio-container">Mới nhất
                                                        <input type="radio" name="sort" {{ Request::get('orderby') == 2 ? "checked":""}}>
                                                        <span class="radio-checkmark"></span>
                                                    </label>
                                                </a>
                                            </li>
                                            <li class="sort-by {{ Request::get('orderby') == 3 ? "active":""}}"
                                                data-param="orderby = 3">
                                                <a href="{{ request()->fullUrlWithQuery(['orderby' => 3]) }}" class="w-100">
                                                    <label class="radio-container">Giá thấp đến cao
                                                        <input type="radio" name="sort" {{ Request::get('orderby') == 3 ? "checked":""}}>
                                                        <span class="radio-checkmark"></span>
                                                    </label>
                                                </a>
                                            </li>
                                            <li class="sort-by {{ Request::get('orderby') == 4 ? "active":""}}"
                                                data-param="orderby = 4">
                                                <a href="{{ request()->fullUrlWithQuery(['orderby' => 4]) }}" class="w-100">
                                                    <label class="radio-container">Giá cao xuống thấp
                                                        <input type="radio" name="sort" {{ Request::get('orderby') == 4 ? "checked":""}}>
                                                        <span class="radio-checkmark"></span>
                                                    </label>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
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
                                                                    <img class="image-cover"
                                                                         src="{{ asset('public/images/products/'.$products->image_1) }}"
                                                                         alt="{{ $products->name }}">
                                                                    <img class="image-secondary"
                                                                         src="{{ asset('public/images/products/'.$products->image_1) }}"
                                                                         alt="{{ $products->name }}">
                                                                </p>
                                                                @if($products->type == 2)
                                                                    <span class="onsale">SALE</span>
                                                                @elseif($products->type == 1)
                                                                    <span class="onnew">Mới</span>
                                                                @endif
                                                                <div class="yith-wcwl-add-button show">
                                                                    <a href="#" class="add_to_wishlist">
                                                                        <i class="zmdi zmdi-favorite-outline"></i>
                                                                    </a>
                                                                </div>
                                                                <div class="button add_to_cart_button">
                                                                    <a href="#">
                                                                        <img
                                                                            src="{{ asset('public/images/icons/shopping-cart-black-icon.png') }}"
                                                                            alt="cart">
                                                                    </a>
                                                                </div>
                                                                <h5 class="woocommerce-loop-product__title"><a
                                                                        href="#">{{ $products->name }}</a></h5>
                                                                <span class="price">
                                                                <ins class="mr-3">
                                                                    <span class="woocommerce-Price-amount amount">
                                                                        {{ number_format($products->price, 0, '', '.') }}
                                                                        <span
                                                                            class="woocommerce-Price-currencySymbol">đ</span>
                                                                    </span>
                                                                </ins>
                                                                @if($products->sale > 0)
                                                                        <del>
                                                                    <span
                                                                        class="woocommerce-Price-amount amount text-danger">
                                                                        {{ number_format($products->price - $products->price*($products->sale/100), 0, '', '.') }}
                                                                        <span
                                                                            class="woocommerce-Price-currencySymbol">đ</span>
                                                                    </span>
                                                                </del>
                                                                    @endif
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
                                    {!! $product->links() !!}
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
@push('scripts')
    <script>
        $(document).ready(function () {

            $('.sort-by').click(function (event) {
                event.preventDefault();
                let e = $(this);
                let param = e.attr('data-param');
                let url = e.find('a').attr("href");
                if(e.hasClass('active')) {
                    url = url.replace(param, "");
                }
                window.location.href = url;
            })
        });
    </script>
@endpush
