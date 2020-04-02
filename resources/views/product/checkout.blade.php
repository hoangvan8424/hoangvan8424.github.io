@extends('layouts.app')
@section('title', 'Thanh toán')
@section('style', asset('/css/checkout.css'))
@section('content')

    <div class="container wrapper pt-20 pb-40">
        <div class="row">
            <div class="container">
                <ol class="breadcrumb float-left">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="#">Giỏ hàng</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Thanh toán</li>
                </ol>
            </div>
        </div>
        <div class="row cart-body">
            <form class="form-horizontal" method="post" action="">
                @csrf
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <!--REVIEW ORDER-->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Sản phẩm <div class="pull-right">
                                <small><a class="afix-1" href="#">Chỉnh sửa</a></small>
                            </div>
                        </div>
                        <div class="panel-body">
                            @php
                                $total=0; $ship=0;
                            @endphp
                            @if(session('cart'))
                                @foreach(session('cart') as $id => $cartDetail)
                                    @php $total += $cartDetail['price'] * $cartDetail['quantity']; @endphp
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
                                            <h6 class="text-danger">-{{ $cartDetail['sale'] }}%</h6>
                                        </div>
                                    </div>
                                    <div class="form-group"><hr /></div>
                                @endforeach
                            @endif
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <strong>Sản phẩm</strong>
                                    <div class="pull-right"><span>{{ number_format($total, 0, '', '.') }}đ</span></div>
                                </div>
                                <div class="col-xs-12">
                                    <span>Phí vận chuyển</span>
                                    <div class="pull-right"><span>{{ number_format($ship, 0, '', '.') }}đ</span></div>
                                </div>
                            </div>
                            <div class="form-group"><hr /></div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <strong>Tổng cộng</strong>
                                    <div class="pull-right">
                                        <span>{{ number_format($total+$ship, 0, '', '.') }}đ</span>
                                        <input type="hidden" name="total" value="{{ $total }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--REVIEW ORDER END-->
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <!--SHIPPING METHOD-->
                    <div class="panel panel-info">
                        <div class="panel-heading">Thông tin giao hàng</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <strong>Họ tên</strong>
                                    <input type="text" name="name" class="form-control" value="{{ get_data_user('web', 'name') }}" />
                                    @if($errors->has('name'))
                                        <span class="error-text">
                                            {{ $errors->first('name') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Địa chỉ*</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="address" class="form-control" value="{{ old('address') }}" />
                                    @if($errors->has('address'))
                                        <span class="error-text">
                                            {{ $errors->first('address') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Số điện thoại*</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" />
                                    @if($errors->has('phone'))
                                        <span class="error-text">
                                            {{ $errors->first('phone') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Email</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="email" class="form-control" value="{{ get_data_user('web', 'email') }}" />
                                    @if($errors->has('email'))
                                        <span class="error-text">
                                            {{ $errors->first('email') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <strong>Ghi chú</strong>
                                    <textarea name="note" id="" cols="30" rows="5" class="form-control">{{ old('note') }}</textarea>
                                    @if($errors->has('note'))
                                        <span class="error-text">
                                            {{ $errors->first('note') }}
                                        </span>
                                    @endif
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
