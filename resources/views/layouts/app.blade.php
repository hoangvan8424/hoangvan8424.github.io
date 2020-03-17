<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Priyoshop</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}">

    <!-- CSS -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{ asset('css/material-design-iconic-font.min.css') }}">
    <!-- Plugins Import CSS -->

    <link rel="stylesheet" href="{{ asset('css/import.css') }}">

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Responsive CSS -->

    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

    <!-- Modernizer JS -->
    <script src="{{ asset('js/vendor/modernizr-2.8.3.min.js') }}"></script>

</head>
<body>
<!-- Body main wrapper start -->
<div class="wrapper bg-white fix">

    <!-- Header 1 -->
    @include('components.header')

    <!-- Home Slider -->
    @yield('slide')

    <!-- Products Area -->
    @yield('product')

    <!-- Footer Bottom Area -->
    @include('components.footer')


</div>
<!-- Body main wrapper end -->

<!-- JS -->

<!-- jQuery JS -->
<script src="{{ asset('js/vendor/jquery-1.12.0.min.js') }}"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<!-- Plugins JS -->
<script src="{{ asset('js/plugins.js') }}"></script>
<!-- Main JS -->
<script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
