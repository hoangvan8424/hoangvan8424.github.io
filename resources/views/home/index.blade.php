@extends('layouts.app')
@section('title', 'Priyoshop')
@section('slide')
    @include('components.slide')
@endsection

@section('content')
    <div class="products-area pb-40 pt-40">
        <div class="container">
            <div class="row">
                <div class="product-tab-content tab-content">
                    <div class="product-tab tab-pane active" id="popular-product">
                        <div class="row">
                            <div class="nav-computer">
                                <span>Bán chạy nhất</span>
                            </div>
                            @if(isset($bestSelling))
                                @foreach($bestSelling as $key => $value)
                                    <div class="col-md-3 col-sm-6 col-xs-12 computer">
                                        <a href="{{ route('get.detail.product', [$value->pro_slug, $value->id]) }}">
                                            <div class="sin-product">
                                                <div class="pro-image">
                                                    <img src="img/product/{{ $value->pro_avatar}}" alt="{{ $value->pro_name }}" class="img"/>
                                                </div>
                                                <div class="pro-details">
                                                    <p class="pro-title">{{ $value->pro_name }}</p>
                                                    <p class="pro-price">
                                                        <span class="new">{{ number_format($value->pro_price, 0, '', '.') }}đ</span>
                                                        <span class="price-sale">
                                                            -{{ $value->pro_sale }}%
                                                        </span>
                                                        <span class="original">{{ number_format($value->pro_price/(1-$value->pro_sale/100),0,'','.') }}đ</span>
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
                            </div>
                            @if(isset($new))
                                @foreach($new as $key => $value)
                                    <div class="col-md-3 col-sm-6 col-xs-12 computer">
                                        <a href="#">
                                            <div class="sin-product">
                                                <div class="pro-image">
                                                    <img src="img/product/{{ $value->pro_avatar}}" alt="{{ $value->pro_name }}" class="img"/>
                                                </div>
                                                <div class="pro-details">
                                                    <p class="pro-title">{{ $value->pro_name }}</p>
                                                    <p class="pro-price">
                                                        <span class="new">{{ number_format($value->pro_price, 0, '', '.') }}đ</span>
                                                        <span class="price-sale">
                                                            -{{ $value->pro_sale }}%
                                                        </span>
                                                        <span class="original">{{ number_format($value->pro_price/(1-$value->pro_sale/100),0,'','.') }}đ</span>
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
                            </div>
                            @if(isset($hotPrice))
                                @foreach($hotPrice as $key => $value)
                                    <div class="col-md-3 col-sm-6 col-xs-12 computer">
                                        <a href="#">
                                            <div class="sin-product">
                                                <div class="pro-image">
                                                    <img src="img/product/{{ $value->pro_avatar}}" alt="{{ $value->pro_name }}" class="img"/>
                                                </div>
                                                <div class="pro-details">
                                                    <p class="pro-title">{{ $value->pro_name }}</p>
                                                    <p class="pro-price">
                                                        <span class="new">{{ number_format($value->pro_price, 0, '', '.') }}đ</span>
                                                        <span class="price-sale">
                                                            -{{ $value->pro_sale }}%
                                                        </span>
                                                        <span class="original">{{ number_format($value->pro_price/(1-$value->pro_sale/100),0,'','.') }}đ</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="view-all mt-40">
                        <div class="row text-center">
                            <a href="{{ route('get.list.product', ['may-tinh', '1']) }}" class="btn btn-success" style="border-radius: 0!important">Xem tất cả laptop</a>
                            <a href="{{ route('get.list.product', ['dien-thoai', '2']) }}" class="btn btn-warning" style="border-radius: 0!important; position: relative; right: 4px;">Xem tất cả điện thoại</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
