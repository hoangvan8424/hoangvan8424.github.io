@extends('layouts.app')
@section('product')
<!-- Single Product Area
============================================ -->
<div class="single-product-area">
	<div class="container">
		<div class="row">
            <!-- breadcrumb -->
            <div class="col-xs-12">
                <ol class="breadcrumb float-left">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        @if($product -> pro_category_id==1)
                            <a href="#">{{ 'Máy tính' }}</a>
                        @elseif($product -> pro_category_id==1)
                            <a href="#">{{ 'Điện thoại' }}</a>
                        @endif
                    </li>
                    <li class="breadcrumb-item"><a href="#">{{ $product -> pro_name }}</a></li>
                </ol>
            </div>
            <!-- end breadcrumb -->

			<div class="col-xs-12">
				<div class="single-product-wrap border">
					<div class="single-product-image">
						<div class="product-big-image tab-content">
							<div class="tab-pane active" id="pro-img-3">
                                <img src="{{ asset('/img/product/').'/'.$product->pro_avatar }}" alt="{{ asset('/img/product/').'/'.$product->pro_name }}" />
                                <a class="pro-img-popup" href="{{ asset('/img/product/').'/'.$product->pro_avatar }}">
                                    <i class="zmdi zmdi-search"></i>
                                </a>
							</div>
						</div>
					</div>
					<div class="single-product-content fix">
						<h3 class="single-pro-title">{{ $product -> pro_name }}</h3>
						<div class="single-product-price-ratting fix">
							<h3 class="single-pro-price float-left">
                                <span class="new">{{ number_format($product->pro_price, 0, '', '.') }}đ</span>
                                <span class="old">{{ number_format($product->pro_price/(1-$product->pro_sale/100),0,'','.') }}đ</span>
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
                        <p>{{ $product->pro_description }}</p>

						<div class="single-product-action-quantity fix">
                            <h5 class="d-inline-block float-left">Số lượng:</h5>
                            <div class="pro-qty float-left">
                                <input value="1" name="qtybutton" class="cart-plus-minus-box quantity" type="text">
                            </div>
							<div class="pro-details-action float-left">
								<button class="pro-details-act-btn btn-text active" title="Thêm vào giỏ hàng" data-id="{{ $product->id }}">
                                    <i class="zmdi zmdi-shopping-cart"></i>Thêm vào giỏ hàng
                                </button>
								<button class="pro-details-act-btn btn-icon">
                                    <i class="zmdi zmdi-favorite-outline"></i>
                                </button>
							</div>

						</div>
						<div class="pro-thumb-slider">
							<div class="sin-item"><a href="#pro-img-1" data-toggle="tab"><img src="{{ asset('/img/single-product/1.1.jpg') }}" alt="" /></a></div>
							<div class="sin-item"><a href="#pro-img-2" data-toggle="tab"><img src="{{ asset('/img/single-product/2.1.jpg') }}" alt="" /></a></div>
							<div class="sin-item"><a class="active" href="#pro-img-3" data-toggle="tab"><img src="{{ asset('/img/product/').'/'.$product->pro_avatar }}" alt="{{ asset('/img/product').'/'.$product->pro_name }}" /></a></div>
							<div class="sin-item"><a href="#pro-img-4" data-toggle="tab"><img src="{{ asset('/img/single-product/4.1.jpg') }}" alt="" /></a></div>
							<div class="sin-item"><a href="#pro-img-5" data-toggle="tab"><img src="{{ asset('/img/single-product/2.1.jpg') }}" alt="" /></a></div>
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
                                        <img src="{{ asset('/img/review/1.jpg') }}" alt="" />
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
                                        <img src="{{ asset('/img/review/2.jpg') }}" alt="" />
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

<!-- Sản phẩm liên quan -->
<div class="related-product-area fix container mb-40 mt-40">
    <div class="section-title text-left col-xs-12 mt-10">
        <h2 class="active">Sản phẩm liên quan</h2>
    </div>
    <div class="product-slider product-slider-6 plr-60">
        <div class="col-xs-12">
            <a href="#">
                <div class="sin-product">
                    <span class="pro-label">sale</span>
                    <div class="pro-image">
                        <img src="{{ asset('/img/product/a04255c348106f0ee126432d2f680d94.jpg') }}" alt="" class="img"/>
                    </div>
                    <div class="pro-details">
                        <p class="pro-title">Microsoft Surface Pro 2018 - Core i5-8250U/8G/256GB - Hàng Chính Hãng</p>
                        <p class="pro-price">
                            <span class="new">{{ number_format(12000000, 0, '', '.') }}đ</span>
                            <span class="price-sale">-{{ 12 }}%</span>
                            <span class="original">{{ number_format(12000000/(1-12/100),0,'','.') }}đ</span>
                        </p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xs-12">
            <a href="#">
                <div class="sin-product">
                    <span class="pro-label">sale</span>
                    <div class="pro-image">
                        <img src="{{ asset('/img/product/ae7804aff708e7197488e34a819f85db.jpg') }}" alt="" class="img"/>
                    </div>
                    <div class="pro-details">
                        <p class="pro-title">Microsoft Surface Pro 2018 - Core i5-8250U/8G/256GB - Hàng Chính Hãng</p>
                        <p class="pro-price">
                            <span class="new">{{ number_format(12000000, 0, '', '.') }}đ</span>
                            <span class="price-sale">-{{ 12 }}%</span>
                            <span class="original">{{ number_format(12000000/(1-12/100),0,'','.') }}đ</span>
                        </p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xs-12">
            <a href="#">
                <div class="sin-product">
                    <span class="pro-label">sale</span>
                    <div class="pro-image">
                        <img src="{{ asset('/img/product/71c6a96cec117c905c563755d7968163.jpg') }}" alt="" class="img"/>
                    </div>
                    <div class="pro-details">
                        <p class="pro-title">Microsoft Surface Pro 2018 - Core i5-8250U/8G/256GB - Hàng Chính Hãng</p>
                        <p class="pro-price">
                            <span class="new">{{ number_format(12000000, 0, '', '.') }}đ</span>
                            <span class="price-sale">-{{ 12 }}%</span>
                            <span class="original">{{ number_format(12000000/(1-12/100),0,'','.') }}đ</span>
                        </p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xs-12">
            <a href="#">
                <div class="sin-product">
                    <span class="pro-label">sale</span>
                    <div class="pro-image">
                        <img src="{{ asset('/img/product/a04255c348106f0ee126432d2f680d94.jpg') }}" alt="" class="img"/>
                    </div>
                    <div class="pro-details">
                        <p class="pro-title">Microsoft Surface Pro 2018 - Core i5-8250U/8G/256GB - Hàng Chính Hãng</p>
                        <p class="pro-price">
                            <span class="new">{{ number_format(12000000, 0, '', '.') }}đ</span>
                            <span class="price-sale">-{{ 12 }}%</span>
                            <span class="original">{{ number_format(12000000/(1-12/100),0,'','.') }}đ</span>
                        </p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xs-12">
            <a href="#">
                <div class="sin-product">
                    <span class="pro-label">sale</span>
                    <div class="pro-image">
                        <img src="{{ asset('/img/product/0b50dcd1e3bda923d1558b4ad96f3f9a.jpg') }}" alt="" class="img"/>
                    </div>
                    <div class="pro-details">
                        <p class="pro-title">Microsoft Surface Pro 2018 - Core i5-8250U/8G/256GB - Hàng Chính Hãng</p>
                        <p class="pro-price">
                            <span class="new">{{ number_format(12000000, 0, '', '.') }}đ</span>
                            <span class="price-sale">-{{ 12 }}%</span>
                            <span class="original">{{ number_format(12000000/(1-12/100),0,'','.') }}đ</span>
                        </p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xs-12">
            <a href="#">
                <div class="sin-product">
                    <span class="pro-label">sale</span>
                    <div class="pro-image">
                        <img src="{{ asset('/img/product/a04255c348106f0ee126432d2f680d94.jpg') }}" alt="" class="img"/>
                    </div>
                    <div class="pro-details">
                        <p class="pro-title">Microsoft Surface Pro 2018 - Core i5-8250U/8G/256GB - Hàng Chính Hãng</p>
                        <p class="pro-price">
                            <span class="new">{{ number_format(12000000, 0, '', '.') }}đ</span>
                            <span class="price-sale">-{{ 12 }}%</span>
                            <span class="original">{{ number_format(12000000/(1-12/100),0,'','.') }}đ</span>
                        </p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xs-12">
            <a href="#">
                <div class="sin-product">
                    <span class="pro-label">sale</span>
                    <div class="pro-image">
                        <img src="{{ asset('/img/product/a04255c348106f0ee126432d2f680d94.jpg') }}" alt="" class="img"/>
                    </div>
                    <div class="pro-details">
                        <p class="pro-title">Microsoft Surface Pro 2018 - Core i5-8250U/8G/256GB - Hàng Chính Hãng</p>
                        <p class="pro-price">
                            <span class="new">{{ number_format(12000000, 0, '', '.') }}đ</span>
                            <span class="price-sale">-{{ 12 }}%</span>
                            <span class="original">{{ number_format(12000000/(1-12/100),0,'','.') }}đ</span>
                        </p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xs-12">
            <a href="#">
                <div class="sin-product">
                    <span class="pro-label">sale</span>
                    <div class="pro-image">
                        <img src="{{ asset('/img/product/a04255c348106f0ee126432d2f680d94.jpg') }}" alt="" class="img"/>
                    </div>
                    <div class="pro-details">
                        <p class="pro-title">Microsoft Surface Pro 2018 - Core i5-8250U/8G/256GB - Hàng Chính Hãng</p>
                        <p class="pro-price">
                            <span class="new">{{ number_format(12000000, 0, '', '.') }}đ</span>
                            <span class="price-sale">-{{ 12 }}%</span>
                            <span class="original">{{ number_format(12000000/(1-12/100),0,'','.') }}đ</span>
                        </p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection

@section('scripts')

    <script type="text/javascript">
        $('.pro-details-act-btn').click(function (e) {
            e.preventDefault();

            var ele = $(this);
            console.log(ele.parents("div").find(".quantity").val());
            $.ajax({
                method: "post",
                url: '{{ route('add.cart') }}',
                cache: false,
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.attr("data-id"),
                    quantity: ele.parents("div").find(".quantity").val()
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        });
    </script>
@endsection







