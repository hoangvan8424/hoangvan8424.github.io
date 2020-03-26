@extends('layouts.app')
@section('product')
    <!-- Giỏ hàng -->
    <div class="cart-area pb-90 pt-30">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="cart-table table-responsive mb-50">
                        <table class="table table-striped table-bordered text-center">
                            <thead>
                            <tr class="success">
                                <th class="product">Sản phẩm</th>
                                <th class="price">Giá</th>
                                <th class="qty">Số lượng</th>
                                <th>Tổng</th>
                                <th class="remove">Tùy chọn</th>
                            </tr>
                            </thead>
                            <tbody>

                            @php
                                $total = 0;
                                $ship = 0;
                            @endphp
                            @if(session('cart'))
                                @foreach(session('cart') as $id => $cartDetail)
                                    @php
                                        $total += $cartDetail['price'] * $cartDetail['quantity'];
                                    @endphp

                            <tr>
                                <td>
                                    <div class="cart-product text-left fix">
                                        <a href="{{ route('get.detail.product', [$cartDetail['slug'], $id]) }}">
                                        <img src="/img/product/{{ $cartDetail['photo'] }}" alt="" />
                                        <div class="details fix">
                                            <p class="cart-product-name">{{ $cartDetail['name'] }}</p>
                                            <p class="cart-product-sale">Sale: {{ $cartDetail['sale'] }}%</p>
                                        </div>
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <p class="cart-price">{{ number_format($cartDetail['price'], 0, '', '.') }}đ</p>
                                </td>
                                <td>
                                    <div class="cart-pro-quantity">
                                        <div class="pro-qty float-left">
                                            <input value="{{ $cartDetail['quantity'] }}" name="qtybutton" class="cart-plus-minus-box" type="text">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p>{{ number_format($cartDetail['price']*$cartDetail['quantity'], 0, '', '.') }}đ</p>
                                </td>
                                <td>
                                    <button class="cart-pro-update">
                                        <i class="fas fa-pen"></i>
                                    </button>

                                    <button class="cart-pro-remove">
                                        <i class="zmdi zmdi-close"></i>
                                    </button>
                                </td>
                            </tr>

                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="product-coupon col-md-6 col-xs-12">
                    <h4>Mã giảm giá</h4>
                    <p>Nhập mã giảm giá của bạn</p>
                    <form action="#">
                        <div class="input-box">
                            <input type="text" class="form-control"/>
                        </div>
                        <div class="input-box submit-box">
                            <input type="submit" value="Áp dụng" />
                        </div>
                    </form>
                </div>
                <div class="procced-checkout col-md-6 col-xs-12">
                    <h4>Giỏ hàng</h4>
                    <ul>
                        <li>
                            <span class="name">Sản phẩm</span>
                            <span class="price">{{ number_format($total, 0, '', '.') }}đ</span>
                        </li>
                        <li><span class="name">Ship</span><span class="price">{{ $ship }}đ</span></li>
                        <li><span class="name">Tổng</span><span class="price">{{ number_format($total+$ship, 0, '', '.') }}đ</span></li>
                    </ul>
                    <a href="#" class="checkout-link">Thanh toán</a>
                    <a href="#" class="checkout-link pull-left">Tiếp tục mua sắm</a>
                </div>
            </div>
        </div>
    </div>

@endsection


