@extends('layouts.app')
@section('product')
    <div class="single-product-area pb-90 pt-90">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 mt-50">
                    <ol class="breadcrumb float-left">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            @if($detail -> pro_category_id==1) {{ 'Máy tính' }}
                            @elseif($detail -> pro_category_id==1) {{ 'Điện thoại' }}
                            @endif
                        </li>
                    </ol>
                </div>

                <div class="col-xs-12">
                    <div class="single-product-wrap">
                        <div class="single-product-image">
                            <div class="pro-thumb float-left">
                                <div class="sin-item"><a href="#pro-img-1" data-toggle="tab"><img src="/img/single-product/1.1.jpg" alt="" /></a></div>
                                <div class="sin-item"><a href="#pro-img-2" data-toggle="tab"><img src="/img/single-product/2.1.jpg" alt="" /></a></div>
                                <div class="sin-item"><a class="active" href="#pro-img-3" data-toggle="tab"><img src="/img/product/{{ $detail->pro_avatar }}" alt="" /></a></div>
                                <div class="sin-item"><a href="#pro-img-4" data-toggle="tab"><img src="/img/single-product/4.1.jpg" alt="" /></a></div>
                            </div>
                            <div class="product-big-image product-big-image-2 tab-content float-left">
                                <div class="tab-pane" id="pro-img-1">
                                    <img src="/img/single-product/1.jpg" alt="" />
                                    <a class="pro-img-popup" href="/img/single-product/1.jpg"><i class="zmdi zmdi-search"></i></a>
                                </div>
                                <div class="tab-pane" id="pro-img-2">
                                    <img src="/img/single-product/2.jpg" alt="" />
                                    <a class="pro-img-popup" href="/img/single-product/2.jpg"><i class="zmdi zmdi-search"></i></a>
                                </div>
                                <div class="tab-pane active pro-details-img" id="pro-img-3">
                                    <img src="/img/product/{{ $detail->pro_avatar }}" alt="" />
                                    <a class="pro-img-popup" href="/img/single-product/3.jpg"><i class="zmdi zmdi-search"></i></a>
                                </div>
                                <div class="tab-pane" id="pro-img-4">
                                    <img src="/img/single-product/4.jpg" alt="" />
                                    <a class="pro-img-popup" href="/img/single-product/4.jpg"><i class="zmdi zmdi-search"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="single-product-content fix">
                            <h3 class="single-pro-title">{{ $detail -> pro_name }}</h3>
                            <div class="single-product-price-ratting fix">
                                <h3 class="single-pro-price float-left">
                                    <span class="new">{{ number_format($detail->pro_price, 0, '', '.') }}đ</span>
                                    <span class="old">{{ number_format($detail->pro_price/(1-$detail->pro_sale/100),0,'','.') }}đ</span>
                                </h3>
                                <p class="single-pro-ratting float-right">
                                    <i class="zmdi zmdi-star"></i>
                                    <i class="zmdi zmdi-star"></i>
                                    <i class="zmdi zmdi-star"></i>
                                    <i class="zmdi zmdi-star-half"></i>
                                    <i class="zmdi zmdi-star-outline"></i>
                                    <span>(24)</span>
                                </p>
                            </div>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have be suffered and  at alteration in some form, by injected humou or randomised words which donot look even slightly humou if a believable. If you are going to use a passage Lorem Ipsum.Ipsum available.</p>

                            <div class="single-product-action-quantity fix">
                                <div class="pro-qty-wrap-2 float-left">
                                    <h5>Số lượng:</h5>
                                    <div class="pro-qty-2 fix">
                                        <input value="0" name="qtybutton" type="text">
                                    </div>
                                </div>
                                <div class="pro-details-action pro-details-action-2 float-left">
                                    <button class="pro-details-act-btn btn-text active">
                                        <i class="zmdi zmdi-shopping-cart"></i>Thêm vào giỏ
                                    </button>
                                    <button class="pro-details-act-btn btn-icon"><i class="zmdi zmdi-favorite-outline"></i></button>
                                </div>
                            </div>
                            <div class="product-share fix">
                                <a href="#"><i class="zmdi zmdi-facebook"></i></a>
                                <a href="#"><i class="zmdi zmdi-instagram"></i></a>
                                <a href="#"><i class="zmdi zmdi-rss"></i></a>
                                <a href="#"><i class="zmdi zmdi-twitter"></i></a>
                                <a href="#"><i class="zmdi zmdi-pinterest"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 mt-40">
                    <div class="pro-details-tab-container fix">
                        <ul class="pro-details-tablist fix">
                            <li class="active"><a href="#description" data-toggle="tab">Đặc điểm nổi bật</a></li>
                            <li><a href="#information" data-toggle="tab">Thông số kỹ thuật</a></li>
                            <li><a href="#reviews" data-toggle="tab">Đánh giá</a></li>
                        </ul>
                        <div class="tab-content fix">
                            <!-- Product Info Tab -->
                            <div id="description" class="pro-details-tab pro-dsc-tab tab-pane active">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                <ul>
                                    <li>Lorem ipsum dolor sit amet, consectetur product</li>
                                    <li>Duis aute irure dolor in reprehenderit in voluptate velit esse</li>
                                    <li>Excepteur sinted occaecat cupidatat non proident products</li>
                                    <li>Voluptate velit esse cillum.</li>
                                </ul>
                            </div>
                            <!-- Product Info Tab -->
                            <div id="information" class="pro-details-tab pro-info-tab tab-pane">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            </div>
                            <!-- Product Info Tab -->
                            <div id="reviews" class="pro-details-tab pro-rev-tab tab-pane">
                                <div class="review-wrapper fix">
                                    <div class="sin-review">
                                        <div class="review-image">
                                            <img src="/img/review/1.jpg" alt="" />
                                        </div>
                                        <div class="review-details fix">
                                            <div class="review-author float-left">
                                                <h3>Gerald Barnes</h3>
                                                <div class="review-star float-left">
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star"></i>
                                                </div>
                                                <span>27 Jun 2017 at 12:24pm</span>
                                            </div>
                                            <div class="replay-delect float-right">
                                                <a href="#"><i class="zmdi zmdi-mail-reply"></i></a>
                                                <a href="#"><i class="zmdi zmdi-close"></i></a>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas elese ifend. Phasellus a felis at estei to bibendum feugiat ut eget eni Praesent et messages in con sectetur posuere dolor non.</p>
                                        </div>
                                    </div>
                                    <div class="sin-review">
                                        <div class="review-image">
                                            <img src="/img/review/2.jpg" alt="" />
                                        </div>
                                        <div class="review-details fix">
                                            <div class="review-author float-left">
                                                <h3>Gerald Barnes</h3>
                                                <div class="review-star float-left">
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star"></i>
                                                </div>
                                                <span>27 Jun 2017 at 12:24pm</span>
                                            </div>
                                            <div class="replay-delect float-right">
                                                <a href="#"><i class="zmdi zmdi-mail-reply"></i></a>
                                                <a href="#"><i class="zmdi zmdi-close"></i></a>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas elese ifend. Phasellus a felis at estei to bibendum feugiat ut eget eni Praesent et messages in con sectetur posuere dolor non.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="review-form-wrapper fix">
                                    <h3>write a review</h3>
                                    <div class="review-form">
                                        <form action="#">
                                            <div class="star-box fix">
                                                <h4>your Rating</h4>
                                                <div class="star star-1">
                                                    <i class="zmdi zmdi-star-outline"></i>
                                                </div>
                                                <div class="star star-2">
                                                    <i class="zmdi zmdi-star-outline"></i>
                                                    <i class="zmdi zmdi-star-outline"></i>
                                                </div>
                                                <div class="star star-3">
                                                    <i class="zmdi zmdi-star-outline"></i>
                                                    <i class="zmdi zmdi-star-outline"></i>
                                                    <i class="zmdi zmdi-star-outline"></i>
                                                </div>
                                                <div class="star star-4">
                                                    <i class="zmdi zmdi-star-outline"></i>
                                                    <i class="zmdi zmdi-star-outline"></i>
                                                    <i class="zmdi zmdi-star-outline"></i>
                                                    <i class="zmdi zmdi-star-outline"></i>
                                                </div>
                                                <div class="star star-5">
                                                    <i class="zmdi zmdi-star-outline"></i>
                                                    <i class="zmdi zmdi-star-outline"></i>
                                                    <i class="zmdi zmdi-star-outline"></i>
                                                    <i class="zmdi zmdi-star-outline"></i>
                                                    <i class="zmdi zmdi-star-outline"></i>
                                                </div>
                                            </div>
                                            <div class="input-box-2 fix">
                                                <div class="input-box float-left">
                                                    <input id="name" placeholder="Type your name" type="text">
                                                </div>
                                                <div class="input-box float-left">
                                                    <input placeholder="Type your email" type="text">
                                                </div>
                                            </div>
                                            <div class="input-box review-box fix">
                                                <textarea placeholder="Write your review"></textarea>
                                            </div>
                                            <div class="input-box submit-box fix">
                                                <input value="submit review" type="submit">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Related Product Area
    ============================================ -->
    <div class="related-product-area  pb-75 fix container">
        <div class="section-title text-left mb-35 col-xs-12 mt-10">
            <h2 class="active">Sản phẩm tương tự</h2>
        </div>
        <div class="product-slider product-slider-6 plr-60">
            <div class="col-xs-12">
                <div class="sin-product">
                    <span class="pro-label">new</span>
                    <div class="pro-image fix">
                        <a href="product-details-1.html" class="image"><img src="/img/product/2.jpg" alt="" /></a>
                        <div class="pro-action">
                            <a href="cart.html" class="action-btn cart"><i class="zmdi zmdi-shopping-cart"></i></a>
                            <a href="wishlist.html" class="action-btn wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                            <a href="#" data-toggle="modal"  data-target="#productModal" class="action-btn quick-view"><i class="zmdi zmdi-eye"></i></a>
                        </div>
                    </div>
                    <div class="pro-details text-center">
                        <div class="top fix">
                            <p class="pro-cat float-left">chair</p>
                            <p class="pro-ratting float-right">
                                <i class="zmdi zmdi-star"></i>
                                <i class="zmdi zmdi-star"></i>
                                <i class="zmdi zmdi-star"></i>
                                <i class="zmdi zmdi-star-half"></i>
                                <i class="zmdi zmdi-star-outline"></i>
                                <span>(24)</span>
                            </p>
                        </div>
                        <a href="product-details-1.html" class="pro-title">Wooden Furniture Chair</a>
                        <h3 class="pro-price">
                            <span class="new">$40.00</span>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="sin-product">
                    <div class="pro-image fix">
                        <a href="product-details-1.html" class="image"><img src="/img/product/6.jpg" alt="" /></a>
                        <div class="pro-action">
                            <a href="cart.html" class="action-btn cart"><i class="zmdi zmdi-shopping-cart"></i></a>
                            <a href="wishlist.html" class="action-btn wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                            <a href="#" data-toggle="modal"  data-target="#productModal" class="action-btn quick-view"><i class="zmdi zmdi-eye"></i></a>
                        </div>
                    </div>
                    <div class="pro-details text-center">
                        <div class="top fix">
                            <p class="pro-cat float-left">chair</p>
                            <p class="pro-ratting float-right">
                                <i class="zmdi zmdi-star"></i>
                                <i class="zmdi zmdi-star"></i>
                                <i class="zmdi zmdi-star"></i>
                                <i class="zmdi zmdi-star-half"></i>
                                <i class="zmdi zmdi-star-outline"></i>
                                <span>(24)</span>
                            </p>
                        </div>
                        <a href="product-details-1.html" class="pro-title">Wooden Furniture Chair</a>
                        <h3 class="pro-price">
                            <span class="new">$40.00</span>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="sin-product">
                    <span class="pro-label">sale</span>
                    <div class="pro-image fix">
                        <a href="product-details-1.html" class="image"><img src="/img/product/4.jpg" alt="" /></a>
                        <div class="pro-action">
                            <a href="cart.html" class="action-btn cart"><i class="zmdi zmdi-shopping-cart"></i></a>
                            <a href="wishlist.html" class="action-btn wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                            <a href="#" data-toggle="modal"  data-target="#productModal" class="action-btn quick-view"><i class="zmdi zmdi-eye"></i></a>
                        </div>
                    </div>
                    <div class="pro-details text-center">
                        <div class="top fix">
                            <p class="pro-cat float-left">chair</p>
                            <p class="pro-ratting float-right">
                                <i class="zmdi zmdi-star"></i>
                                <i class="zmdi zmdi-star"></i>
                                <i class="zmdi zmdi-star"></i>
                                <i class="zmdi zmdi-star-half"></i>
                                <i class="zmdi zmdi-star-outline"></i>
                                <span>(24)</span>
                            </p>
                        </div>
                        <a href="product-details-1.html" class="pro-title">Wooden Furniture Chair</a>
                        <h3 class="pro-price">
                            <span class="new">$40.00</span>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="sin-product">
                    <span class="pro-label">new</span>
                    <div class="pro-image fix">
                        <a href="product-details-1.html" class="image"><img src="/img/product/5.jpg" alt="" /></a>
                        <div class="pro-action">
                            <a href="cart.html" class="action-btn cart"><i class="zmdi zmdi-shopping-cart"></i></a>
                            <a href="wishlist.html" class="action-btn wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                            <a href="#" data-toggle="modal"  data-target="#productModal" class="action-btn quick-view"><i class="zmdi zmdi-eye"></i></a>
                        </div>
                    </div>
                    <div class="pro-details text-center">
                        <div class="top fix">
                            <p class="pro-cat float-left">chair</p>
                            <p class="pro-ratting float-right">
                                <i class="zmdi zmdi-star"></i>
                                <i class="zmdi zmdi-star"></i>
                                <i class="zmdi zmdi-star"></i>
                                <i class="zmdi zmdi-star-half"></i>
                                <i class="zmdi zmdi-star-outline"></i>
                                <span>(24)</span>
                            </p>
                        </div>
                        <a href="product-details-1.html" class="pro-title">Wooden Furniture Chair</a>
                        <h3 class="pro-price">
                            <span class="new">$40.00</span>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="sin-product">
                    <div class="pro-image fix">
                        <a href="product-details-1.html" class="image"><img src="/img/product/6.jpg" alt="" /></a>
                        <div class="pro-action">
                            <a href="cart.html" class="action-btn cart"><i class="zmdi zmdi-shopping-cart"></i></a>
                            <a href="wishlist.html" class="action-btn wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                            <a href="#" data-toggle="modal"  data-target="#productModal" class="action-btn quick-view"><i class="zmdi zmdi-eye"></i></a>
                        </div>
                    </div>
                    <div class="pro-details text-center">
                        <div class="top fix">
                            <p class="pro-cat float-left">chair</p>
                            <p class="pro-ratting float-right">
                                <i class="zmdi zmdi-star"></i>
                                <i class="zmdi zmdi-star"></i>
                                <i class="zmdi zmdi-star"></i>
                                <i class="zmdi zmdi-star-half"></i>
                                <i class="zmdi zmdi-star-outline"></i>
                                <span>(24)</span>
                            </p>
                        </div>
                        <a href="product-details-1.html" class="pro-title">Wooden Furniture Chair</a>
                        <h3 class="pro-price">
                            <span class="new">$40.00</span>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="sin-product">
                    <span class="pro-label">sale</span>
                    <div class="pro-image fix">
                        <a href="product-details-1.html" class="image"><img src="/img/product/7.jpg" alt="" /></a>
                        <div class="pro-action">
                            <a href="cart.html" class="action-btn cart"><i class="zmdi zmdi-shopping-cart"></i></a>
                            <a href="wishlist.html" class="action-btn wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                            <a href="#" data-toggle="modal"  data-target="#productModal" class="action-btn quick-view"><i class="zmdi zmdi-eye"></i></a>
                        </div>
                    </div>
                    <div class="pro-details text-center">
                        <div class="top fix">
                            <p class="pro-cat float-left">chair</p>
                            <p class="pro-ratting float-right">
                                <i class="zmdi zmdi-star"></i>
                                <i class="zmdi zmdi-star"></i>
                                <i class="zmdi zmdi-star"></i>
                                <i class="zmdi zmdi-star-half"></i>
                                <i class="zmdi zmdi-star-outline"></i>
                                <span>(24)</span>
                            </p>
                        </div>
                        <a href="product-details-1.html" class="pro-title">Wooden Furniture Chair</a>
                        <h3 class="pro-price">
                            <span class="new">$40.00</span>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="sin-product">
                    <div class="pro-image fix">
                        <a href="product-details-1.html" class="image"><img src="/img/product/8.jpg" alt="" /></a>
                        <div class="pro-action">
                            <a href="cart.html" class="action-btn cart"><i class="zmdi zmdi-shopping-cart"></i></a>
                            <a href="wishlist.html" class="action-btn wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                            <a href="#" data-toggle="modal"  data-target="#productModal" class="action-btn quick-view"><i class="zmdi zmdi-eye"></i></a>
                        </div>
                    </div>
                    <div class="pro-details text-center">
                        <div class="top fix">
                            <p class="pro-cat float-left">chair</p>
                            <p class="pro-ratting float-right">
                                <i class="zmdi zmdi-star"></i>
                                <i class="zmdi zmdi-star"></i>
                                <i class="zmdi zmdi-star"></i>
                                <i class="zmdi zmdi-star-half"></i>
                                <i class="zmdi zmdi-star-outline"></i>
                                <span>(24)</span>
                            </p>
                        </div>
                        <a href="product-details-1.html" class="pro-title">Wooden Furniture Chair</a>
                        <h3 class="pro-price">
                            <span class="new">$40.00</span>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="sin-product">
                    <div class="pro-image fix">
                        <a href="product-details-1.html" class="image"><img src="/img/product/1.jpg" alt="" /></a>
                        <div class="pro-action">
                            <a href="cart.html" class="action-btn cart"><i class="zmdi zmdi-shopping-cart"></i></a>
                            <a href="wishlist.html" class="action-btn wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                            <a href="#" data-toggle="modal"  data-target="#productModal" class="action-btn quick-view"><i class="zmdi zmdi-eye"></i></a>
                        </div>
                    </div>
                    <div class="pro-details text-center">
                        <div class="top fix">
                            <p class="pro-cat float-left">chair</p>
                            <p class="pro-ratting float-right">
                                <i class="zmdi zmdi-star"></i>
                                <i class="zmdi zmdi-star"></i>
                                <i class="zmdi zmdi-star"></i>
                                <i class="zmdi zmdi-star-half"></i>
                                <i class="zmdi zmdi-star-outline"></i>
                                <span>(24)</span>
                            </p>
                        </div>
                        <a href="product-details-1.html" class="pro-title">Wooden Furniture Chair</a>
                        <h3 class="pro-price">
                            <span class="new">$40.00</span>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

