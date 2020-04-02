@extends('layouts.app')
@section('title', 'Giỏ hàng')
@section('content')
    <!-- Giỏ hàng -->
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <ol class="breadcrumb float-left">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item">Giỏ hàng</li>
                </ol>
            </div>
        </div>
    </div>

    @php
        $total = 0;
        $ship = 0;
    @endphp
    @if(session('cart'))
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
                                @foreach(session('cart') as $id => $cartDetail)
                                    @php
                                        $total += $cartDetail['price'] * $cartDetail['quantity'];
                                    @endphp

                                    <tr>
                                        <td>
                                            <div class="cart-product text-left fix">
                                                <a href="{{ route('get.detail.product', [$cartDetail['slug'], $id]) }}">
                                                    <img src="{{ asset('/img/product').'/'.$cartDetail['photo'] }}" alt=""/>
                                                    <div class="details fix">
                                                        <p class="cart-product-name">{{ $cartDetail['name'] }}</p>
                                                        <p class="cart-product-sale">Sale: {{ $cartDetail['sale'] }}%</p>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="cart-price">{{ number_format($cartDetail['price'], 0, '', '.') }}
                                                đ</p>
                                        </td>
                                        <td>
                                            <div class="cart-pro-quantity">
                                                <div class="pro-qty float-left">
                                                    <input type="text" value="{{ $cartDetail['quantity'] }}"
                                                           class="cart-plus-minus-box quantity">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p>{{ number_format($cartDetail['price']*$cartDetail['quantity'], 0, '', '.') }}
                                                đ</p>
                                        </td>
                                        <td>
                                            <button class="btn btn-success cart-pro-update" data-id="{{ $id }}">
                                                <i class="fad fa-pen"></i>
                                            </button>

                                            <button class="btn btn-danger cart-pro-remove" data-id="{{ $id }}">
                                                <i class="far fa-times"></i>
                                            </button>
                                        </td>
                                    </tr>

                                @endforeach
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
                                <input type="submit" value="Áp dụng"/>
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
                            <li><span class="name">Tổng</span><span class="price">{{ number_format($total+$ship, 0, '', '.') }}đ</span>
                            </li>
                        </ul>
                        <a href="{{ route('show.checkout.cart') }}" class="checkout-link">Thanh toán</a>
                        <a href="#" class="checkout-link pull-left">Tiếp tục mua sắm</a>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="cart-area pb-90 pt-30">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <i class="fad fa-shopping-cart cart-empty-icon"></i>
                        <p class="cart-empty-notification">Không có sản phẩm nào trong giỏ hàng!</p>
                        <a href="{{ route('home') }}" class="btn btn-warning text-center">Tiếp tục mua sắm</a>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

@section('scripts')

    <script type="text/javascript">

        $(".cart-pro-update").click(function (e) {
            e.preventDefault();

            let ele = $(this);

            $.ajax({
                url: '{{ route('update.cart') }}',
                method: "patch",
                cache: false,
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: ele.attr("data-id"),
                    product_quantity: ele.parents("tr").find(".quantity").val()
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        });

        $(".cart-pro-remove").click(function (e) {
            e.preventDefault();

            let ele = $(this);

            if (confirm("Xóa sản phẩm khỏi giỏ hàng?")) {
                $.ajax({
                    url: '{{ route('remove.cart') }}',
                    method: "DELETE",
                    cache: false,
                    data: {
                        _token: '{{  csrf_token() }}',
                        product_id: ele.attr("data-id")
                    },
                    success: function (data) {
                        window.location.reload();
                    }
                });
            }
        });

    </script>

@endsection


