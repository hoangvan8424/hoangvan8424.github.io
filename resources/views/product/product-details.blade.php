@extends('layouts.app')
@section('title', $product->pro_name)
@section('content')
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
                        <!-- Đặc điểm nổi bật -->
                        <div id="description" class="pro-details-tab pro-dsc-tab tab-pane active">
                            {!! $product->pro_content !!}
                        </div>
                        <!-- Thông số kỹ thuật -->
                        <div id="information" class="pro-details-tab pro-info-tab tab-pane">
                            {!! $product->pro_configuration !!}
                        </div>
                        <!-- Đánh giá -->
                        <div id="reviews" class="pro-details-tab pro-rev-tab tab-pane">
                            <div class="review-form-wrapper fix">
                                <div class="review-form">
                                    <div class="list-review">
                                        <div class="row">
                                            <div class="col-sm-3 star-tb text-center">
                                                <p>{{ $calculateRating }}</p>
                                                @for($i = 1; $i <= 5; $i++)
                                                    <i class="fal fa-star {{ $i<= $calculateRating ? 'active':'' }}"></i>
                                                @endfor
                                            </div>
                                            <div class="col-sm-6" style="border-right: 1px solid #f3f3f3;">
                                                @if(isset($listRating))
                                                    @foreach($listRating as $key => $value)
                                                        <div style="margin-bottom: 7px;">
                                                            {{ $key }}<i class="fal fa-star" style="width: 10%; margin-left: 5px;"></i>
                                                            <div class="bgb progress" style="width: 70%">
                                                                <div class="bgb-color bgb- progress-bar" style="width: {{ $product->pro_rating_total>0 ? round(($key*$value/$product->pro_rating_total)*100):0 }}%"></div>
                                                            </div>
                                                            <a href="" style="width: 10%; margin-left: 15px;">{{ $value }} đánh giá</a>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                            <div class="col-sm-3 text-center">
                                                @if(Auth::check())
                                                    <a href="#" class="btn btn-warning button-review" style="transform: translateY(60px);">Gửi đánh giá của bạn</a>
                                                @else
                                                    <a href="{{ route('get.login') }}" class="btn btn-warning" style="transform: translateY(60px);">Vui lòng đăng nhập để gửi đánh giá</a>
                                                @endif
                                            </div>
                                        </div>
                                        @if(Auth::check())
                                            <div class="row ips hide" style="padding: 32px;">
                                                <span>Chọn đánh giá của bạn: </span>
                                                <span class="cStar">
                                                    @for($i=1;$i<=5;$i++)
                                                        <i class="fal fa-star fa-2x" data-key="{{ $i }}"></i>
                                                    @endfor
                                                </span>
                                                <span class="list-text"></span>
                                            </div>
                                            <div class="sForm hide">
                                                <form method="post">
                                                    <div class="form-group" style="padding: 0 20px">
                                                        <textarea class="form-control text-review" placeholder="Nhập đánh giá (tối thiểu 80 ký tự)" rows="7"></textarea>
                                                        <input type="hidden" class="star-hidden" name="star-hidden">
                                                    </div>
                                                    <div class="input-box submit-box fix">
                                                        <button type="submit" class="btn btn-danger" id="button-submit-review" data-id="{{ $product->id }}">Gửi đánh giá
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="review-wrapper fix mt-40">
                                @if(isset($review))
                                    @foreach($review as $reviews)
                                        <div class="sin-review">
                                            <div class="review-details fix">
                                                <div class="review-author float-left">
                                                    <h3>{{ $reviews->user->name }}</h3>
                                                    <div class="review-star float-left">
                                                        @for($i=1;$i<=5;$i++)
                                                            <i class="zmdi zmdi-star {{ $i<=$reviews->re_rating ? 'active':'' }}"></i>
                                                        @endfor
                                                    </div>
                                                    <div>
                                                        <span>{{ date_format($reviews->created_at, 'd-m-Y H:i:s') }}</span>
                                                        <a href="#">Trả lời</a>
                                                    </div>
                                                </div>
                                                <p>{{ $reviews->re_comment }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
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

        //  Thêm vào giỏ hàng
        $('.pro-details-act-btn').click(function (e) {
            e.preventDefault();
            var ele = $(this);
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

        //  Đánh giá
        let listStar = $('.cStar .fal');
        var listText = {
            1 : 'Không thích',
            2 : 'Tạm được',
            3 : 'Bình thường',
            4 : 'Rất tốt',
            5 : 'Tuyệt vời'
        };
        listStar.mouseover(function () {
            let ele = $(this);
            let data = ele.attr('data-key');
            listStar.removeClass('star-active');

            $.each(listStar, function (key, value) {
                if(key+1 <= data) {
                    $(this).addClass('star-active');
                }
            });

            $('.list-text').text('').text(listText[data]).show();
            $('.star-hidden').val(data);
        });

        $('.button-review').click(function (event) {
            event.preventDefault();
            if($('.ips').hasClass('hide')) {
                $('.ips').addClass('active').removeClass('hide');
                $(this).text('Đóng lại');
                $(this).addClass('no-active');
            }
            else {
                $('.ips').addClass('hide').removeClass('active');
                $(this).text('Gửi đánh giá của bạn');
                $(this).removeClass('no-active');
                $('.sForm').addClass('hide');
            }
        });

        listStar.click(function () {
            $('.sForm').removeClass('hide');
        });

        //  Lưu đánh giá
        $('#button-submit-review').click(function (e) {
            e.preventDefault();
            let productId = $(this).attr('data-id');
            let numberStar = $('.star-hidden').val();
            let comment = $('.text-review').val();

            $.ajax({
                url: '{{ route('save.review') }}',
                method: "post",
                cache: false,
                data: {
                    _token: '{{ csrf_token() }}',
                    id: productId,
                    star: numberStar,
                    comment: comment
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        });

    </script>
@endsection







