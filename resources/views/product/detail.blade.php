@extends('layouts.app')

@section('content')
    @if(isset($detail))
        <div class="page-content">
        <!-- Shop Section -->
        <section class="shop-single-v1-section shop-single-v2-section section-box featured-hp-1 featured-hp-4">
            <div class="woocommerce">
                <div class="container">
                    <div class="content-area">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                <div class="woocommerce-product-gallery">
                                    @if($detail->type == 2)
                                        <span class="onsale">SALE</span>
                                    @elseif($detail->type == 1)
                                        <span class="onnew">Mới</span>
                                    @endif
                                    <div class="owl-carousel">
                                        <div class="item item-detail">
                                            <img src="{{ asset('public/images/products/' . $detail->image_1) }}" alt="{{ $detail->name }}">
                                        </div>
                                        <div class="item item-detail">
                                            <img src="{{ asset('public/images/products/' . $detail->image_2) }}" alt="{{ $detail->name }}">
                                        </div>
                                        <div class="item item-detail">
                                            <img src="{{ asset('public/images/products/' . $detail->image_3) }}" alt="{{ $detail->name }}">
                                        </div>
                                        <div class="item item-detail">
                                            <img src="{{ asset('public/images/products/' . $detail->image_4) }}" alt="{{ $detail->name }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                <div class="summary entry-summary">
                                    <h1 class="product_title entry-title">{{ $detail->name }}</h1>
                                    <span class="price">
                                        <ins class="mr-3">
                                            <span class="woocommerce-Price-amount amount">
                                                {{ number_format($detail->price, 0, '', '.') }}
                                                <span class="woocommerce-Price-currencySymbol">đ</span>
                                            </span>
                                        </ins>
                                        @if($detail->sale > 0)
                                            <del>
                                                <span class="woocommerce-Price-amount amount text-danger">
                                                    {{ number_format($detail->price - $detail->price*($detail->sale/100), 0, '', '.') }}
                                                    <span class="woocommerce-Price-currencySymbol">đ</span>
                                                </span>
                                            </del>
                                        @endif
                                    </span>
                                    <div class="woocommerce-product-details__short-description">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                                    </div>
                                    <form class="cart" method="post">
                                        <div class="quantity">
                                            <input type="number" name="quantity" id="quantity" value="1" min="1" class="nput-text qty text">
                                            <span class="modify-qty plus" onclick="Increase()">+</span>
                                            <span class="modify-qty minus" onclick="Decrease()">-</span>
                                        </div>
                                        <button type="submit" name="add-to-cart" class="single_add_to_cart_button button alt au-btn btn-small">Thêm vào giỏ<i class="zmdi zmdi-arrow-right"></i></button>
                                    </form>
                                    <div class="product_meta">
										<span class="sku_wrapper">
											Mã sản phẩm:
											<span class="sku">{{ $detail->sku }}</span>
										</span>
                                        <span class="posted_in">
											Danh mục:
											<a href="#">{{ $detail->category->name }}</a>
										</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="woocommerce-tabs">
                                    <ul class="nav nav-tabs wc-tabs" id="myTab" role="tablist">
                                        <li class="nav-item description_tab" id="tab-title-description" role="tab" aria-controls="tab-description" aria-selected="true">
                                            <a class="nav-link nav-detail active" href="#tab-description" data-toggle="tab">Mô tả</a>
                                        </li>
                                        <li class="nav-item additional_information_tab" id="tab-title-additional_information" role="tab" aria-controls="tab-additional_information" aria-selected="false">
                                            <a class="nav-link nav-detail" href="#tab-additional_information" data-toggle="tab">Thông tin chi tiết</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="woocommerce-Tabs-panel tab-pane fade show active" id="tab-description" role="tabpanel" aria-labelledby="tab-title-description">
                                            {!! $detail->description !!}
                                        </div>
                                        <div class="woocommerce-Tabs-panel tab-pane" id="tab-additional_information" role="tabpanel" aria-labelledby="tab-title-additional_information">
                                            {!! $detail->information !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(isset($productSameCategory) and count($productSameCategory) > 0)
                        <div class="related">
                            <h2 class="special-heading">Sản phẩm cùng danh mục</h2>
                            <div class="owl-carousel owl-theme" id="related-products">

                                    @foreach($productSameCategory as $product)
                                        <div class="item">
                                            <div class="product type-product">
                                                <div class="woocommerce-LoopProduct-link">
                                                    <div class="product-image">
                                                        <a href="#" class="wp-post-image">
                                                            <img src="{{ asset('public/images/products/'.$product->image_1) }}" alt="product">
                                                        </a>
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
                                                        <h5 class="woocommerce-loop-product__title">{{ $product->name }}</h5>
                                                        <span class="price">
                                                            @if($product->sale > 0)
                                                            <del>
                                                                <span class="woocommerce-Price-amount amount text-danger">
                                                                    {{ number_format($product->price - $product->price*($product->sale/100), 0, '', '.') }}
                                                                    <span class="woocommerce-Price-currencySymbol">đ</span>
                                                                </span>
                                                            </del>
                                                            @endif
                                                            <ins>
                                                                <span class="woocommerce-Price-amount amount">
                                                                    {{ number_format($product->price, 0, '', '.') }}
                                                                    <span class="woocommerce-Price-currencySymbol">đ</span>
                                                                </span>
                                                            </ins>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>
    @endif
@endsection
