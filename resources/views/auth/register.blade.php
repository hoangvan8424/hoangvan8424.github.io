@extends('layouts.app')
@section('title', 'Đăng ký' . config('app.name'))
@section('content')
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="name" placeholder="Họ tên" value="{{ old('name') }}">
                                    @if($errors->has('name'))
                                        <span class="text-danger error-text font-weight-bold">
                                            {{$errors->first('name')}}
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" name="email" placeholder="Email" value="{{ old('email') }}">
                                    @if($errors->has('email'))
                                        <span class="text-danger error-text font-weight-bold">
                                            {{$errors->first('email')}}
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" name="password" placeholder="Mật khẩu">
                                        @if($errors->has('password'))
                                            <span class="text-danger error-text font-weight-bold">
                                                {{$errors->first('password')}}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" name="password_confirmation" placeholder="Xác nhận mật khẩu">
                                        @if($errors->has('password_confirmation'))
                                            <span class="text-danger error-text font-weight-bold">
                                                {{$errors->first('password_confirmation')}}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Tạo tài khoản
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Quên mật khẩu?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="{{ route('login') }}">Đã có tài khoản? Đăng nhập!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
