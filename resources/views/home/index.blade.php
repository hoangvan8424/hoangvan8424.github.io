@extends('layouts.app')

@section('slide')
    @include('components.slide')
@endsection

@section('product')
    <div class="products-area pb-40 pt-40">
        <div class="container">
            <div class="row" style="background: #ffff">
                <ul class="product-tab-list col-xs-12 text-center mb-30 mt-30">
                    <li class="active"><a href="#popular-product" data-toggle="tab">Máy tính</a></li>
                    <li><a href="#best-seller" data-toggle="tab">Điện thoại</a></li>
                </ul>
            </div>
            <div class="row">
                <div class="product-tab-content tab-content">
                    <div class="product-tab tab-pane active" id="popular-product">
                        <div class="row">
                            <div class="nav-computer">
                                <span>Bán chạy nhất</span>
                                <a href="{{ route('get.list.product', ['may-tinh', '1']) }}" class="pull-right btn-view-all" role="button">Xem tất cả</a>
                            </div>
                            @if(isset($computerProduct))
                                @foreach($computerProduct as $computer)
                                    <div class="col-md-3 col-sm-6 col-xs-12 computer">
                                        <a href="{{ route('get.detail.product', [$computer->pro_slug, $computer->id]) }}">
                                            <div class="sin-product">
                                                <div class="pro-image">
                                                    <img src="img/product/{{ $computer->pro_avatar}}" alt="{{ $computer->pro_name }}" class="img"/>
                                                </div>
                                                <div class="pro-details">
                                                    <p class="pro-title">{{ $computer->pro_name }}</p>
                                                    <p class="pro-price">
                                                        <span class="new">{{ number_format($computer->pro_price, 0, '', '.') }}đ</span>
                                                        <span class="price-sale">
                                                            -{{ $computer->pro_sale }}%
                                                        </span>
                                                        <span class="original">{{ number_format($computer->pro_price/(1-$computer->pro_sale/100),0,'','.') }}đ</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <div class="row">
                            <div class="nav-computer">
                                <span>Mới</span>
                                <a class="pull-right btn-view-all">Xem tất cả</a>
                            </div>
                            @if(isset($computerProduct))
                                @foreach($computerProduct as $computer)
                                    <div class="col-md-3 col-sm-6 col-xs-12 computer">
                                        <a href="#">
                                            <div class="sin-product">
                                                <div class="pro-image">
                                                    <img src="img/product/{{ $computer->pro_avatar}}" alt="{{ $computer->pro_name }}" class="img"/>
                                                </div>
                                                <div class="pro-details">
                                                    <p class="pro-title">{{ $computer->pro_name }}</p>
                                                    <p class="pro-price">
                                                        <span class="new">{{ number_format($computer->pro_price, 0, '', '.') }}đ</span>
                                                        <span class="price-sale">
                                                            -{{ $computer->pro_sale }}%
                                                        </span>
                                                        <span class="original">{{ number_format($computer->pro_price/(1-$computer->pro_sale/100),0,'','.') }}đ</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <div class="row">
                            <div class="nav-computer">
                                <span>Giá sốc</span>
                                <a class="pull-right btn-view-all">Xem tất cả</a>
                            </div>
                            @if(isset($computerProduct))
                                @foreach($computerProduct as $computer)
                                    <div class="col-md-3 col-sm-6 col-xs-12 computer">
                                        <a href="#">
                                            <div class="sin-product">
                                                <div class="pro-image">
                                                    <img src="img/product/{{ $computer->pro_avatar}}" alt="{{ $computer->pro_name }}" class="img"/>
                                                </div>
                                                <div class="pro-details">
                                                    <p class="pro-title">{{ $computer->pro_name }}</p>
                                                    <p class="pro-price">
                                                        <span class="new">{{ number_format($computer->pro_price, 0, '', '.') }}đ</span>
                                                        <span class="price-sale">
                                                            -{{ $computer->pro_sale }}%
                                                        </span>
                                                        <span class="original">{{ number_format($computer->pro_price/(1-$computer->pro_sale/100),0,'','.') }}đ</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <div class="product-tab tab-pane" id="best-seller">
                        <div class="row">
                            <div class="nav-computer">
                                <span>Bán chạy nhất</span>
                                <a class="pull-right btn-view-all">Xem tất cả</a>
                            </div>
                            @if(isset($phoneProduct))
                                @foreach($phoneProduct as $phone)
                                    <div class="col-md-3 col-sm-6 col-xs-12 phone-product">
                                        <a href="#">
                                            <div class="sin-product">
                                                <div class="pro-image">
                                                    <img src="img/product/{{ $phone->pro_avatar}}" alt="{{ $phone->pro_name }}" class="img-phone" />

                                                </div>
                                                <div class="pro-details phone">
                                                    <p class="pro-title">{{ $phone->pro_name }}</p>
                                                    <p class="pro-price">
                                                        <span class="new">{{ number_format($phone->pro_price, 0, '', '.') }}đ</span>
                                                        <span class="price-sale">
                                                            -{{ $phone->pro_sale }}%
                                                        </span>
                                                        <span class="original">{{ number_format($phone->pro_price/(1-$phone->pro_sale/100),0,'','.') }}đ</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <div class="row">
                            <div class="nav-computer">
                                <span>Mới</span>
                                <a class="pull-right btn-view-all">Xem tất cả</a>
                            </div>
                            @if(isset($phoneProduct))
                                @foreach($phoneProduct as $phone)
                                    <div class="col-md-3 col-sm-6 col-xs-12 phone-product">
                                        <a href="#">
                                            <div class="sin-product">
                                                <div class="pro-image">
                                                    <img src="img/product/{{ $phone->pro_avatar}}" alt="{{ $phone->pro_name }}" class="img-phone" />
                                                </div>
                                                <div class="pro-details phone">
                                                    <p class="pro-title">{{ $phone->pro_name }}</p>
                                                    <p class="pro-price">
                                                        <span class="new">{{ number_format($phone->pro_price, 0, '', '.') }}đ</span>
                                                        <span class="price-sale">
                                                            -{{ $phone->pro_sale }}%
                                                        </span>
                                                        <span class="original">{{ number_format($phone->pro_price/(1-$phone->pro_sale/100),0,'','.') }}đ</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                @endforeach
                            @endif
                        </div>

                        <div class="row">
                            <div class="nav-computer">
                                <span>Giá sốc</span>
                                <a class="pull-right btn-view-all">Xem tất cả</a>
                            </div>
                            @if(isset($phoneProduct))
                                @foreach($phoneProduct as $phone)
                                    <div class="col-md-3 col-sm-6 col-xs-12 phone-product">
                                        <a href="#">
                                            <div class="sin-product">
                                                <div class="pro-image">
                                                    <img src="img/product/{{ $phone->pro_avatar}}" alt="{{ $phone->pro_name }}" class="img-phone" />

                                                </div>
                                                <div class="pro-details phone">
                                                    <p class="pro-title">{{ $phone->pro_name }}</p>
                                                    <p class="pro-price">
                                                        <span class="new">{{ number_format($phone->pro_price, 0, '', '.') }}đ</span>
                                                        <span class="price-sale">
                                                            -{{ $phone->pro_sale }}%
                                                        </span>
                                                        <span class="original">{{ number_format($phone->pro_price/(1-$phone->pro_sale/100),0,'','.') }}đ</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                @endforeach
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
