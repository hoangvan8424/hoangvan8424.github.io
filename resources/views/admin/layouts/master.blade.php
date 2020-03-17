<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('img/admin/logo-admin.png') }}">
    <title>Admin</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('theme_admin/css/style.css') }}">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="{{ asset('theme_admin/fontawesome/css/all.css') }}">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('theme_admin/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="{{ asset('theme_admin/css/ie10-viewport-bug-workaround.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('theme_admin/css/dashboard.css') }}" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->

    <script src="{{ asset('theme_admin/js/ie-emulation-modes-warning.js') }}"></script>

</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('admin.home') }}">HTN Shop - Admin</a>
        </div>
{{--        <div id="navbar" class="navbar-collapse collapse">--}}
{{--            <ul class="nav navbar-nav navbar-right">--}}
{{--                <li><a href="#">Dashboard</a></li>--}}
{{--                <li><a href="#">Settings</a></li>--}}
{{--                <li><a href="#">Profile</a></li>--}}
{{--                <li><a href="#">Help</a></li>--}}
{{--            </ul>--}}
{{--            <form class="navbar-form navbar-right">--}}
{{--                <input type="text" class="form-control" placeholder="Search...">--}}
{{--            </form>--}}
{{--        </div>--}}
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li class="{{ Route::current()->getName() == 'admin.home' ? 'active' : '' }}">
                    <a href="{{ route('admin.home') }}">Trang tổng quan <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="{{ Request::is('admin/category') || Request::is('admin/category/*') ? 'active':'' }}">
                    <a href="{{route('admin.get.list.category')}}">Danh mục</a>
                </li>
                <li class="{{ Request::is('admin/brand') || Request::is('admin/brand/*') ? 'active':'' }}">
                    <a href="{{ route('admin.get.list.brand') }}">Thương hiệu</a>
                </li>
                <li class="{{ Request::is('admin/product') || Request::is('admin/product/*') ? 'active' : '' }}">
                    <a href="{{ route('admin.get.list.product') }}">Sản phẩm</a>
                </li>

                <li>
                    <a href="#">Đơn hàng</a>
                </li>
                <li>
                    <a href="#">Người dùng</a>
                </li>
            </ul>

        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if(session()->has('alert-' . $msg))
                        <p class="alert alert-{{ $msg }}"><i class="fas fa-check icon-check"></i>{{ session()->get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                    @endif
                @endforeach
            </div> <!-- end .flash-message -->
            @yield('content')

        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{asset('theme_admin/js/jquery.min.js')}}"></script>
<script src="{{asset('theme_admin/js/bootstrap.min.js')}}"></script>
<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
<script src="{{asset('theme_admin/js/holder.min.js')}}"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="{{asset('theme_admin/js/ie10-viewport-bug-workaround.js')}}"></script>
</body>
</html>