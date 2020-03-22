@extends('layouts.app')

@section('product')
    <div class="account-area">
        <div class="container">
            <div class="login-area pb-90 pt-100">
                <div class="container">
                    <div class="flash-message">
                        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                            @if(session()->has('alert-' . $msg))
                                <p class="alert alert-{{ $msg }}">
                                    <i class="fas fa-check icon-check"></i>
                                    <span class="font-weight-bold">{{ session()->get('alert-' . $msg) }}</span>
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                </p>
                            @endif
                        @endforeach
                    </div>
                    <form method="post" action="" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-8 col-xs-12 register">
                                <div class="customer-login text-left">
                                    <h4 class="title-1 title-border text-uppercase mb-30">Đăng ký</h4>
                                    <div class="form-group">
                                        <label>Họ tên <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" placeholder="Nhập tên ..." name="name">
                                        @if($errors->has('name'))
                                            <span class="error-text">
                                            {{ $errors->first('name') }}
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" placeholder="Nhập email ..." name="email">
                                        @if($errors->has('email'))
                                            <span class="error-text">
                                            {{ $errors->first('email') }}
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>Mật khẩu <span class="text-danger">*</span></label>
                                        <input class="form-control" type="password" placeholder="Nhập mật khẩu ..." name="password">
                                        @if($errors->has('password'))
                                            <span class="error-text">
                                            {{ $errors->first('password') }}
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>Nhập lại mật khẩu <span class="text-danger">*</span></label>
                                        <input class="form-control" type="password" placeholder="Nhập lại mật khẩu ..." name="re_password">
                                        @if($errors->has('re_password'))
                                            <span class="error-text">
                                            {{ $errors->first('re_password') }}
                                            </span>
                                        @endif
                                    </div>

                                    <button type="submit" data-text="Đăng  ký" class="button-one submit-button mt-15">Đăng  ký</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
