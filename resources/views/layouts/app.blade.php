<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/img/favicon.ico') }}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/theme_admin/fontawesome/css/all.css') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">

    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{ asset('/css/material-design-iconic-font.min.css') }}">
    <!-- Plugins Import CSS -->

    <link rel="stylesheet" href="{{ asset('/css/import.css') }}">

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">

    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('/css/responsive.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="@yield('style')">

    <!-- Modernizer JS -->
    <script src="{{ asset('/js/vendor/modernizr-2.8.3.min.js') }}"></script>

</head>
<body>
<!-- Body main wrapper start -->
<div class="wrapper bg-white fix">

    <!-- Header 1 -->
    @include('components.header')

    <!-- Message -->
    @include('components.message-alert')

    <!-- Home Slider -->
    @yield('slide')

    <!-- Products Area -->
    @yield('content')

    <!-- Footer Bottom Area -->
    @include('components.footer')


</div>
<!-- Body main wrapper end -->

<!-- JS -->

<!-- jQuery JS -->
<script src="{{ asset('/js/vendor/jquery-1.12.0.min.js') }}"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('/js/bootstrap.min.js') }}"></script>

<!-- Plugins JS -->
<script src="{{ asset('/js/plugins.js') }}"></script>
<!-- Main JS -->
<script src="{{ asset('/js/main.js') }}"></script>

{{-- Xóa sản phẩm khỏi giỏ hàng trên icon giỏ --}}
<script>
    $(".mini-cart-remove").click(function (e) {
        e.preventDefault();
        var ele = $(this);

            $.ajax({
                url: '{{ route('remove.cart') }}',
                method: "DELETE",
                cache: false,
                data: {
                    _token: '{{  csrf_token() }}',
                    product_id: ele.attr("data-product-id")
                },
                success: function (data) {
                    window.location.reload();
                }
            });
    });
</script>

@yield('scripts')

</body>

</html>
