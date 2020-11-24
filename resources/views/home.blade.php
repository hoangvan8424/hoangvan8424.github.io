@extends('layouts.app')

@section('content')
    <div class="page-content">
        <!-- Slider Revolution Section -->
        <section class="home-slider style-home-slider-hp-1">
            <!-- the ID here will be used in the inline JavaScript below to initialize the slider -->
            <div id="rev_slider_1" class="rev_slider fullscreenbanner" data-version="5.4.5">
                <ul>
                    @if(count($slide) > 0)
                        @foreach($slide as $key => $value)
                    <!-- BEGIN SLIDE 1 -->
                    <li data-transition="boxslide">
                        <!-- SLIDE'S MAIN BACKGROUND IMAGE -->
                        <img src="{{ asset('public/images/slides/'.$value->image) }}" alt="{{ $value->name }}" class="rev-slidebg">

                        <!-- BEGIN LAYER -->
                        <div class="tp-caption tp-resizeme slide-caption-title-1"
                             data-frames='[{"delay":500,"speed":1000,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"frame":"999","to":"y:-20px;opacity:0;","ease":"Power3.easeInOut"}]'
                             data-fontsize="['20', '25', '30', '35']"
                             data-lineheight="['32', '35', '40', '45']"
                             data-color="#d59f9f"
                             data-textAlign="['center', 'center', 'center', 'center']"
                             data-x="['center','center','center','center']"
                             data-y="['middle','middle','middle','middle']"
                             data-hoffset="['0', '0', '0', '0']"
                             data-voffset="['-227', '-200', '-175', '-130']"
                             data-width="['187', '250', '300', '350']"
                             data-whitespace="normal"
                             data-basealign="slide"
                             data-responsive_offset="off" >
                        </div>
                        <div class="tp-caption tp-resizeme slide-caption-title-2"
                             data-frames='[{"delay":1000,"speed":1000,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"frame":"999","to":"y:-20px;opacity:0;","ease":"Power3.easeInOut"}]'
                             data-fontsize="['90', '90', '80', '80']"
                             data-lineheight="['70', '70', '60', '60']"
                             data-color="#fff"
                             data-textAlign="['center', 'center', 'center', 'center']"
                             data-x="['center','center','center','center']"
                             data-y="['middle','middle','middle','middle']"
                             data-hoffset="['0', '0', '0', '0']"
                             data-voffset="['-140', '-117', '-110', '-90']"
                             data-width="['1200', '850', '850', '800']"
                             data-whitespace="normal"
                             data-basealign="slide"
                             data-responsive_offset="off" style="text-transform: uppercase;" >
                            {{ $value->title }}
                        </div>
                        <div class="tp-caption tp-resizeme slide-caption-title-3"
                             data-frames='[{"delay":0,"speed":300,"frame":"0","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                             data-fontsize="['80', '80', '80', '90']"
                             data-lineheight="['60', '60', '50', '50']"
                             data-color="['#666','#fff','#fff','#fff']"
                             data-textAlign="['center', 'center', 'center', 'center']"
                             data-x="['right','right','right','right']"
                             data-y="['bottom','bottom','bottom','bottom']"
                             data-hoffset="['27', '18', '18', '60']"
                             data-voffset="['28', '30', '30', '30']"
                             data-width="['250', '250', '300', '350']"
                             data-whitespace="normal"
                             data-basealign="slide"
                             data-responsive_offset="off" >
                            {{ 0 . (++$key) }}
                        </div>
                        <div class="tp-caption tp-resizeme slide-caption-title-3"
                             data-frames='[{"delay":0,"speed":300,"frame":"0","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                             data-fontsize="['13', '15', '20', '35']"
                             data-lineheight="['32', '35', '40', '45']"
                             data-color="['#666','#fff','#fff','#fff']"
                             data-textAlign="['center', 'center', 'center', 'center']"
                             data-x="['right','right','right','right']"
                             data-y="['bottom','bottom','bottom','bottom']"
                             data-hoffset="['14', '-23', '-20', '35']"
                             data-voffset="['63', '56', '50', '37']"
                             data-width="['187', '250', '300', '350']"
                             data-whitespace="normal"
                             data-basealign="slide"
                             data-responsive_offset="off" >
                            /
                        </div>
                        <div class="tp-caption tp-resizeme slide-caption-title-3"
                             data-frames='[{"delay":0,"speed":300,"frame":"0","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                             data-fontsize="['20', '25', '30', '40']"
                             data-lineheight="['32', '35', '40', '45']"
                             data-color="['#666','#fff','#fff','#fff']"
                             data-textAlign="['center', 'center', 'center', 'center']"
                             data-x="['right','right','right','right']"
                             data-y="['bottom','bottom','bottom','bottom']"
                             data-hoffset="['-6', '-43', '-40', '15']"
                             data-voffset="['63', '56', '50', '37']"
                             data-width="['187', '250', '300', '350']"
                             data-whitespace="normal"
                             data-basealign="slide"
                             data-responsive_offset="off" >
                            0{{ count($slide) }}
                        </div>
                        <!-- END LAYER -->
                    </li>
                    @endforeach
                @endif
                    <!-- END SLIDE 1 -->
                </ul>
            </div>
        </section>
        <!-- End Slider Revolution Section -->

        <!-- Categories Section -->
        <section class="categories-hp-1 section-box">
            <div class="container">
                <div class="categories-content">
                    <div class="row">
                        <!-- Categories 1 -->
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                            <div class="categories-detail lighting">
                                <a href="" class="images"><img src="{{ asset('public/images/hp-1-categories-1.jpg') }}" alt="Lighting"></a>
                                <div class="product">
                                    <a href="">
                                            <span class="name">
                                                <span class="line">- </span>
                                                Đèn
                                            </span>
                                        <span class="quantity">- 12 sản phẩm</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Categories 2 -->
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                            <div class="categories-detail furniture">
                                <a href="" class="images"><img src="{{ asset('public/images/hp-1-categories-2.jpg') }}" alt="Furniture"></a>
                                <div class="product">
                                    <a href="">
                                            <span class="name">
                                                <span class="line">- </span>
                                                Nội thất
                                            </span>
                                        <span class="quantity">- 15 sản phẩm</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Categories 3 -->
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                            <div class="categories-detail decoration">
                                <a href="" class="images"><img src="{{ asset('public/images/hp-1-categories-3.jpg') }}" alt="Decoration"></a>
                                <div class="product">
                                    <a href="">
                                            <span class="name">
                                                <span class="line">- </span>
                                                Trang trí
                                            </span>
                                        <span class="quantity">- 20 sản phẩm</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Categories Section -->

        <!-- Featured Sale Section -->
        <section class="featured-hp-1">
            <div class="container">
                <div class="featured-content woocommerce">
                    <h2 class="special-heading">Nổi bật</h2>
                    <div class="content-area">
                        <div class="row">
                            @if(count($hot) > 0)
                                @foreach($hot as $hots)
                                    <div class="col">
                                        <div class="product type-product">
                                            <a href="{{ route('product.detail', $hots->slug) }}">
                                                <div class="woocommerce-LoopProduct-link">
                                                <div class="product-image">
                                                    <p class="wp-post-image">
                                                        <img class="image-cover" src="{{ asset('public/images/products/'.$hots->image_1) }}" alt="product">
                                                        <img class="image-secondary" src="{{ asset('public/images/products/'.$hots->image_2) }}" alt="product">
                                                    </p>
                                                    @if($hots->type == 2)
                                                    <span class="onsale">SALE</span>
                                                    @elseif($hots->type == 1)
                                                        <span class="onnew">Mới</span>
                                                    @endif
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
                                                    <h5 class="woocommerce-loop-product__title"><a href="#">{{ $hots->name }}</a></h5>
                                                    <span class="price">
                                                        <ins class="mr-3">
                                                            <span class="woocommerce-Price-amount amount">
                                                                {{ number_format($hots->price, 0, '', '.') }}
                                                                <span class="woocommerce-Price-currencySymbol">đ</span>
                                                            </span>
                                                        </ins>
                                                        @if($hots->sale > 0)
                                                            <del>
                                                            <span class="woocommerce-Price-amount amount text-danger">
                                                                {{ number_format($hots->price - $hots->price*($hots->sale/100), 0, '', '.') }}
                                                                <span class="woocommerce-Price-currencySymbol">đ</span>
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
                    <div class="view-all">
                        <a href="{{ route('product.all') }}" class="au-btn btn-small">Xem thêm<i class="zmdi zmdi-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Featured Sale Section -->

        <!-- Testimonials Section -->
        <section class="testimonials-hp-1">
            <div class="container-fluid">
                <div class="testimonials-content">
                    <div id="testimonials-hp-1" class="owl-carousel owl-theme">
                        <!-- Item 1 -->
                        <div class="item">
                            <div class="row">
                                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 left-block">
                                    <div class="images">
                                        <img src="{{ asset('public/images/hp-1-testimonials-1.png') }}" alt="testimonials">
                                    </div>
                                </div>
                                <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 right-block">
                                    <div class="testimonials-detail">
                                        <i class="zmdi zmdi-quote"></i>
                                        <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness.</p>
                                        <h5>Mary Morrison</h5>
                                        <span>- Photography -</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Item 2 -->
                        <div class="item">
                            <div class="row">
                                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 left-block left-block-2">
                                    <div class="images">
                                        <img src="{{ asset('public/images/hp-1-testimonials-2.png') }}" alt="testimonials">
                                    </div>
                                </div>
                                <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 right-block">
                                    <div class="testimonials-detail">
                                        <i class="zmdi zmdi-quote"></i>
                                        <p>I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born.</p>
                                        <h5>Anna Taylor</h5>
                                        <span>- Designer -</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Testimonials Section -->

        <!-- Insta Follow Section -->
        <section class="insta-hp-1 section-box">
            <div class="container">
                <div class="insta-content">
                    <h2>Follow Instagram</h2>
                    <span>@Novas.InteriorDesign</span>
                    <div class="row">
                        <!-- Insta 1 -->
                        <div class="col">
                            <div class="insta-detail">
                                <a href="https://www.instagram.com/" class="insta-image">
                                    <img src="{{ asset('public/images/hp-1-ig-1.jpg') }}" alt="insta-1">
                                    <div class="overlay"></div>
                                </a>
                            </div>
                        </div>
                        <!-- Insta 2 -->
                        <div class="col">
                            <div class="insta-detail">
                                <a href="#" class="insta-image">
                                    <img src="{{ asset('public/images/hp-1-ig-2.jpg') }}" alt="insta-2">
                                    <div class="overlay"></div>
                                </a>
                            </div>
                        </div>
                        <!-- Insta 3 -->
                        <div class="col">
                            <div class="insta-detail">
                                <a href="#" class="insta-image">
                                    <img src="{{ asset('public/images/hp-1-ig-3.jpg') }}" alt="insta-3">
                                    <div class="overlay"></div>
                                </a>
                            </div>
                        </div>
                        <!-- Insta 4 -->
                        <div class="col">
                            <div class="insta-detail">
                                <a href="#" class="insta-image">
                                    <img src="{{ asset('public/images/hp-1-ig-4.jpg') }}" alt="insta-4">
                                    <div class="overlay"></div>
                                </a>
                            </div>
                        </div>
                        <!-- Insta 5 -->
                        <div class="col">
                            <div class="insta-detail">
                                <a href="#" class="insta-image">
                                    <img src="{{ asset('public/images/hp-1-ig-5.jpg') }}" alt="insta-5">
                                    <div class="overlay"></div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Insta Follow Section -->
    </div>
@endsection
