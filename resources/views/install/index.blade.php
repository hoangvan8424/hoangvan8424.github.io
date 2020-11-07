@extends('layouts.app')
@section('title', 'Cài đặt - ' . config('app.name'))
@section('content')
    <h2 class="text-center text-white text-uppercase pt-3 pb-3">Thiên đường wedding - Cài đặt</h2>
    <div class="container bg-white main-box-setup pt-4 pb-4">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('save.install') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @error('exception_errors')
                    <div class="inline-block">
                        <p class="text-danger">{{ $message }}</p>
                    </div>
                    @enderror
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-xl-6 col-sm-12 col-12">
                            <div>
                                <h4>Tài khoản admin</h4>
                                <div class="form-group">
                                    <label for="name">Họ tên</label>
                                    <input type="text" class="form-control" id="name" name="name" minlength="3" maxlength="160" required>
                                    @error('name')
                                    <div class="inline-block">
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"  minlength="6" maxlength="160" required>
                                    @error('email')
                                    <div class="inline-block">
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="pwd">Mật khẩu</label>
                                    <input type="password" class="form-control" id="pwd" name="password" minlength="6" maxlength="60" required>
                                    @error('password')
                                    <div class="inline-block">
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">Xác nhận mật khẩu</label>
                                    <input type="password" class="form-control" id="password_confirmation"
                                           name="password_confirmation" minlength="8" maxlength="60" required>
                                    @error('password_confirmation')
                                    <div class="inline-block">
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <h4>Site setting </h4>
                                <div class="form-group">
                                    <label for="site-name">Site name</label>
                                    <input name="site_name" type="text" id="site-name" class="form-control" value="{{env('APP_NAME')}}" minlength="6" maxlength="160" required>
                                    @error('site_name')
                                    <div class="inline-block">
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="site-slogan">Slogan</label>
                                    <input type="text" class="form-control" id="site-slogan" name="site_slogan" value="{{env('APP_SLOGAN')}}" maxlength="160" minlength="3" required>
                                    @error('sites_logan')
                                    <div class="inline-block">
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-6 col-sm-12 col-12">
                            <div class="">
                                <h4>Cơ sở dữ liệu
                                </h4>
                                <div class="form-group">
                                    <label for="database-host">Host</label>
                                    <input type="text" class="form-control" id="database-host" name="database_host" value="{{env('DB_HOST')}}" minlength="6" maxlength="100" required disabled>
                                    @error('database_host')
                                    <div class="inline-block">
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="database-port">Port</label>
                                    <input type="number" class="form-control" id="database-port" name="database_port" min="1001" value="{{env('DB_PORT')}}" maxlength="9999" required disabled>
                                    @error('database_port')
                                    <div class="inline-block">
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="database-username">Username</label>
                                    <input type="text" class="form-control" id="database-username" name="database_username" value="{{env('DB_USERNAME')}}"  minlength="3" maxlength="50" required disabled>
                                    @error('database_username')
                                    <div class="inline-block">
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="database-pass">Password</label>
                                    <input type="password" class="form-control" id="database-pass"
                                           name="database_pass" maxlength="50" value="{{env('DB_PASSWORD')}}" disabled>
                                    @error('database_pass')
                                    <div class="inline-block">
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="database-name">Database name</label>
                                    <input type="text" class="form-control" id="database-name" name="database_name" maxlength="50" value="{{ env('DB_DATABASE')}}" disabled>
                                    @error('database_name')
                                    <div class="inline-block">
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="">
                                <h4>Cài đặt mail</h4>
                                <div class="form-group">
                                    <label for="mail_username">Username</label>
                                    <input type="text" class="form-control"  id="mail_username"
                                           name="mail_username" maxlength="160" minlength="3" value="{{env('MAIL_USERNAME')}}" required disabled>
                                    @error('mail_username')
                                    <div class="inline-block">
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="mail_password">Password</label>
                                    <input type="password" class="form-control" id="mail_password"
                                           name="mail_password" minlength="3" maxlength="160" value="{{env('MAIL_PASSWORD')}}" required disabled>
                                    @error('mail_password')
                                    <div class="inline-block">
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="mail_host">Host</label>
                                    <input type="text" class="form-control" id="mail_host" name="mail_host"
                                           placeholder="smtp.gmail.com" minlength="3" maxlength="160"  value="{{env('MAIL_HOST')}}" required disabled>
                                    @error('mail_host')
                                    <div class="inline-block">
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group float-right">
                        <button type="submit" class="btn btn-default btn-lg btn-primary">Cài đặt</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
