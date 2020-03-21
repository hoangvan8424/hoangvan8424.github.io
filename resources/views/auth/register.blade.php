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
                                    <label>Họ tên</label><input type="text" placeholder="Nhập tên ..." name="name">
                                    <label>Email</label><input type="text" placeholder="Nhập email ..." name="email">
                                    <label>Mật khẩu</label><input type="password" placeholder="Nhập mật khẩu ..." name="password">
                                    <label>Nhập lại mật khẩu</label><input type="password" placeholder="Nhập lại mật khẩu ..." name="re_password">
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
