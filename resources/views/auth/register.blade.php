@extends('layouts.app')
@section('title', 'Đăng ký - ' . config('app.name'))
@section('content')
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="flash-message">
                        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                            @if(session()->has('alert-' . $msg))
                                <p class="alert alert-{{ $msg }} font-weight-bold">{{ session()->get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Tạo tài khoản!</h1>
                            </div>
                            <form class="user" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" placeholder="Họ tên" value="{{ old('name') }}">
                                    @if($errors->has('name'))
                                        <span class="text-danger error-text font-weight-bold">
                                            {{$errors->first('name')}}
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
                                    @if($errors->has('email'))
                                        <span class="text-danger error-text font-weight-bold">
                                            {{$errors->first('email')}}
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
                                        @if($errors->has('password'))
                                            <span class="text-danger error-text font-weight-bold">
                                                {{$errors->first('password')}}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control" name="password_confirmation" placeholder="Xác nhận mật khẩu">
                                        @if($errors->has('password_confirmation'))
                                            <span class="text-danger error-text font-weight-bold">
                                                {{$errors->first('password_confirmation')}}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control" id="date-of-birth" name="date_of_birth" readonly placeholder="Ngày sinh">
                                        @if($errors->has('date_of_birth'))
                                            <span class="text-danger error-text font-weight-bold">
                                                {{$errors->first('date_of_birth')}}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-sm-6 mt-2">
                                        <input class="" type="radio" name="sex" id="male" value="Nam" checked> <label
                                            for="male" class="mr-4">Nam</label>
                                        <input class="" type="radio" name="sex" id="female" value="Nữ"> <label
                                            for="female">Nữ</label>
                                        @if($errors->has('sex'))
                                            <span class="text-danger error-text font-weight-bold">
                                                {{$errors->first('sex')}}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <select class="form-control" name="branch">
                                            <option class="" value="" selected>Chi nhánh</option>
                                            @foreach($branch as $key => $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('branch'))
                                            <span class="text-danger error-text font-weight-bold">
                                                {{$errors->first('branch')}}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="department">
                                            <option class="" value="" selected>Phòng ban</option>
                                            @foreach($department as $key => $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('department'))
                                            <span class="text-danger error-text font-weight-bold">
                                                {{$errors->first('department')}}
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
@push('scripts')
    <script>
        $(function() {
            $('#date-of-birth').datepicker({
                format: 'dd-mm-yyyy',
                orientation: 'bottom left',
                todayHighlight: true,
                autoclose: true,
            });
        });
    </script>
@endpush
