@extends('layouts.app')

@section('product')
    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(session()->has('alert-' . $msg))
                <p class="alert alert-{{ $msg }}"><i class="fas fa-check icon-check"></i>{{ session()->get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
        @endforeach
    </div>
    <div class="account-area">
        <div class="container">
            <div class="login-area pb-90 pt-100">
                <div class="container">
                    <div class="flash-message">
                        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                            @if(session()->has('alert-' . $msg))
                                <p class="alert alert-{{ $msg }}"><i class="fas fa-check icon-check"></i>{{ session()->get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                            @endif
                        @endforeach
                    </div>
                    <form action="#">
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
                                        <input class="form-control" type="password" placeholder="Nhập mật khẩu ...">
                                        @if($errors->has('password'))
                                            <span class="error-text">
                                            {{ $errors->first('password') }}
                                            </span>
                                        @endif
                                    </div>

                                    <p><a href="#" class="text-gray">Quên mật khẩu?</a></p>
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
