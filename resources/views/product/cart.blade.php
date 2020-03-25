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
                                <th class="remove">Xóa</th>
                            </tr>
                            </thead>
                            <tbody>

                            @php
                                $total = 0;
                            @endphp
                            @if(session('cart'))
                                @foreach(session('cart') as $id => $cartDetail)
                                    @php
                                        $total += $cartDetail['price'] * $cartDetail['quantity'];
                                    @endphp

                            <tr>
                                <td>
                                    <div class="cart-product text-left fix">
                                        <img src="img/product/{{ $cartDetail['photo'] }}" alt="" />
                                        <div class="details fix">
                                            <a href="{{ route('get.detail.product', [$cartDetail['slug'], $id]) }}">{{ $cartDetail['name'] }}</a>
                                            <p>-{{ $cartDetail['sale'] }}%</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="cart-price">{{ number_format($cartDetail['price'], 0, '', '.') }}đ</p>
                                </td>
                                <td>
                                    <div class="cart-pro-quantity">
                                        <div class="pro-qty float-left" style="width: 100%">
                                            <input value="{{ $cartDetail['quantity'] }}" name="qtybutton" class="cart-plus-minus-box" type="text">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p>{{ number_format($cartDetail['price']*$cartDetail['quantity'], 0, '', '.') }}đ</p>
                                </td>
                                <td>
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
                        <li><span class="name">Ship</span><span class="price">$ 415.00</span></li>
                        <li><span class="name">Tổng</span><span class="price">$ 415.00</span></li>
                    </ul>
                    <a href="#" class="checkout-link">Thanh toán</a>
                </div>
            </div>
        </div>
    </div>

@endsection


