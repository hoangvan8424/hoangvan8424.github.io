@extends('layouts.app')

@section('product')
    <div class="account-area">
        <div class="container">
            <div class="login-area pb-90 pt-200">
                <div class="container">
                    <form action="#">
                        <div class="row">
                            <div class="col-md-8 col-xs-12 login">
                                <div class="customer-login text-left">
                                    <h4 class="title-1 title-border text-uppercase mb-30">Đăng nhập</h4>
                                    <input type="text" placeholder="Email..." name="email">
                                    <input type="password" placeholder="Mật khẩu...">
                                    <p><a href="#" class="text-gray">Quên mật khẩu?</a></p>
                                    <button type="submit" data-text="Đăng nhập" class="button-one submit-button mt-15">Đăng nhập</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
