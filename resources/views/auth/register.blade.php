@extends('layouts.app')

@section('product')
    <div class="account-area">
        <div class="container">
            <div class="login-area pb-90 pt-200">
                <div class="container">
                    <form method="post" action="" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-8 col-xs-12 register">
                                <div class="customer-login text-left">
                                    <h4 class="title-1 title-border text-uppercase mb-30">Đăng ký</h4>
                                    <div class="form-group">
                                        <label>Họ tên</label>
                                        <input class="form-control" type="text" placeholder="Nhập tên ..." name="name">
                                        @if($errors->has('name'))
                                            <span class="error-text">
                                            {{ $errors->first('name') }}
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control" type="text" placeholder="Nhập email ..." name="email">
                                        @if($errors->has('email'))
                                            <span class="error-text">
                                            {{ $errors->first('email') }}
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>Mật khẩu</label>
                                        <input class="form-control" type="password" placeholder="Nhập mật khẩu ..." name="password">
                                        @if($errors->has('password'))
                                            <span class="error-text">
                                            {{ $errors->first('password') }}
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>Nhập lại mật khẩu</label>
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
