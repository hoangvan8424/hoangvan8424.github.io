<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="description" content="{{ config('add.name') }}">
    <meta name="author" content="Hoang Van">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="shortcut icon" href="{{ asset('public/images/favicon.png') }}" />

    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">


    {{-- Font --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('public/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css') }}">
    <link href="{{ asset('public/template/fontawesome/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('public/template/bootstrap/css/bootstrap.min.css') }}"/>

    <!-- Main Style Css -->
    <link rel="stylesheet" href="{{ asset('public/template/css/style.css') }}"/>
    <link rel="stylesheet" href="{{ asset('public/css/custom.css') }}"/>

</head>
<body class="404-page">
<!-- Images Loader -->
<div class="images-preloader">
    <div id="preloader_1" class="rectangle-bounce">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>
<div class="page-content">
    <section class="page-not-found">
        <div class="page-detail">
            <div class="page-inner">
                <h2>:((</h2>
                <h2>Trang không tồn tại!</h2>
                <p>Trang bạn tìm kiếm không tồn tại.</p>
                <a href="{{ route('home') }}" class="au-btn-white btn-small">Trở về trang chủ<i class="zmdi zmdi-arrow-right"></i></a>
            </div>
        </div>
    </section>
</div>


<!--  JS  -->
<!-- Jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="{{ asset('public/template/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- Waypoints Library -->
<!-- Main Js -->
<script src="{{ asset('public/template/js/custom.js') }}"></script>
</body>
</html>
