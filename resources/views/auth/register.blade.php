@extends('layouts.app')

@section('product')
    <div class="account-area">
        <div class="container">
            <div class="login-area pb-90 pt-200">
                <div class="container">
                    <form action="#">
                        <div class="row">
                            <div class="col-md-8 col-xs-12 register">
                                <div class="customer-login text-left">
                                    <h4 class="title-1 title-border text-uppercase mb-30">Đăng ký</h4>
                                    <input type="text" placeholder="Tên..." name="name">
                                    <input type="text" placeholder="Email..." name="email">
                                    <input type="password" placeholder="Mật khẩu...">
                                    <input type="password" placeholder="Nhập lại mật khẩu...">
                                    <button type="submit" data-text="Đăng ký" class="button-one submit-button mt-15">Đăng ký</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
