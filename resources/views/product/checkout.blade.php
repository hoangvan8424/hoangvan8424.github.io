@extends('layouts.app')
@section('title', 'Thanh toán')
@section('style', asset('/css/checkout.css'))
@section('content')

    <div class="container wrapper pt-20 pb-40">
        <div class="row cart-head">
            <div class="container">
                <div class="row">
                    <p></p>
                </div>
                <div class="row">
                    <p></p>
                </div>
            </div>
        </div>
        <div class="row cart-body">
            <form class="form-horizontal" method="post" action="">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                    <!--REVIEW ORDER-->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Sản phẩm <div class="pull-right">
                                <small><a class="afix-1" href="#">Chỉnh sửa</a></small>
                            </div>
                        </div>
                        <div class="panel-body">
                            @if(session('cart'))
                                @foreach(session('cart') as $id => $cartDetail)

                                    <div class="form-group">
                                        <div class="col-sm-3 col-xs-3 pull-left">
                                            <img class="img-responsive" src="{{ asset('/img/product').'/'.$cartDetail['photo'] }}" style="width: 100px; height: 85px;" />
                                        </div>
                                        <div class="col-sm-7 col-xs-7">
                                            <div class="col-xs-12">
                                                <p style="line-height: 20px; font-weight: 500;">{{ $cartDetail['name'] }}</p>
                                            </div>
                                            <div class="col-xs-12">
                                                <small>Số lượng: <span>{{ $cartDetail['quantity'] }}</span></small>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 col-xs-2 text-right">
                                            <h6>{{ number_format($cartDetail['price'], 0, '', '.') }}<span>đ</span></h6>
                                        </div>
                                    </div>
                                    <div class="form-group"><hr /></div>

                                @endforeach
                            @endif
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <strong>Tổng</strong>
                                    <div class="pull-right"><span>$</span><span>200.00</span></div>
                                </div>
                                <div class="col-xs-12">
                                    <small>Phí vận chuyển</small>
                                    <div class="pull-right"><span>-</span></div>
                                </div>
                            </div>
                            <div class="form-group"><hr /></div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <strong>Tổng cộng</strong>
                                    <div class="pull-right"><span>$</span><span>150.00</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--REVIEW ORDER END-->
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                    <!--SHIPPING METHOD-->
                    <div class="panel panel-info">
                        <div class="panel-heading">Thông tin giao hàng</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <strong>Họ tên</strong>
                                    <input type="text" name="name" class="form-control" value="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Địa chỉ*</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="address" class="form-control" value="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Số điện thoại*</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="phone" class="form-control" value="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Email</strong></div>
                                <div class="col-md-12"><input type="text" name="email" class="form-control" value="" /></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <strong>Ghi chú</strong>
                                    <textarea name="note" id="" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="button-confirm">
                                <button type="submit" class="btn btn-success pull-right">Xác nhận và thanh toán</button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
        <div class="row cart-footer">

        </div>
    </div>

@endsection
