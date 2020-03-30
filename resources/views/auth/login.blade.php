@extends('layouts.app')

@section('content')
    <div class="account-area">
        <div class="container">
            <div class="login-area pb-90">
                <div class="container">
                    <form method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-8 col-xs-12 login">
                                <div class="customer-login text-left">
                                    <h4 class="title-1 title-border text-uppercase mb-30">Đăng nhập</h4>
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

                                    <p>
                                        <a href="#" class="text-gray">Quên mật khẩu?</a>
                                    </p>
                                    <button type="submit" data-text="Đăng  nhập" class="button-one submit-button mt-15">Đăng  nhập</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
