<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
    <link rel="stylesheet" type="text/css" href="{{ asset('public/fonts/linearicons/style.css') }}">
    <link href="{{ asset('public/template/fontawesome/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('public/template/bootstrap/css/bootstrap.min.css') }}"/>

    <!-- Owl Carousel 2 -->
    <link rel="stylesheet" href="{{ asset('public/template/owl/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/template/owl/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/template/owl/css/animate.css') }}">
    <!-- Slider Revolution CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/template/revolution/css/settings.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/template/revolution/css/layers.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/template/revolution/css/navigation.css') }}">

    <!-- fancybox-master Library -->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/template/fancybox-master/css/jquery.fancybox.min.css') }}">
    <!-- Audio Library-->
    <link rel="stylesheet" href="{{ asset('public/template/mejs/mediaelementplayer.css') }}">
    <!-- noUiSlider Library -->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/template/nouislider/css/nouislider.css') }}">
    <!-- Main Style Css -->
    <link rel="stylesheet" href="{{ asset('public/template/css/style.css') }}"/>
    <link rel="stylesheet" href="{{ asset('public/css/custom.css') }}"/>
    @stack('css')

</head>
<body>
    <div class="images-preloader">
        <div id="preloader_1" class="rectangle-bounce">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    {{--  Start header  --}}
    @include('components.header')
    {{-- End Header  --}}

    {{--  Content  --}}
    @yield('content')
    {{--  End content  --}}

    {{--  Footer  --}}
    @include('components.footer')
    {{--  End footer  --}}
    <a href="#" id="back-to-top"></a>


    <!--  JS  -->
    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('public/template/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- Waypoints Library -->
    <script src="{{ asset('public/template/js/jquery.waypoints.min.js') }}"></script>
    <!-- Owl Carousel 2 -->
    <script src="{{ asset('public/template/owl/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('public/template/owl/js/OwlCarousel2Thumbs.min.js') }}"></script>
    <!-- Slider Revolution core JavaScript files -->
    <script src="{{ asset('public/template/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('public/template/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
    <!-- Isotope Library-->
    <script type="text/javascript" src="{{ asset('public/template/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('public/template/js/imagesloaded.pkgd.min.js') }}"></script>
    <!-- Masonry Library -->
    <script type="text/javascript" src="{{ asset('public/template/js/jquery.masonry.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/template/js/masonry.pkgd.min.js') }}"></script>
    <!-- fancybox-master Library -->
    <script type="text/javascript" src="{{ asset('public/template/fancybox-master/js/jquery.fancybox.min.js') }}"></script>
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEmXgQ65zpsjsEAfNPP9mBAz-5zjnIZBw"></script>
    <script src="{{ asset('public/template/js/theme-map.js') }}"></script>
    <!-- Countdown Library -->
    <script src="{{ asset('public/template/countdown/jquery.countdown.min.js') }}"></script>
    <!-- Audio Library-->
    <script src="{{ asset('public/template/mejs/mediaelement-and-player.min.js') }}"></script>
    <!-- noUiSlider Library -->
    <script type="text/javascript" src="{{ asset('public/template/nouislider/js/nouislider.js') }}"></script>
    <!-- Form -->
    <script src="{{ asset('public/template/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('public/template/js/config-contact.js') }}"></script>
    <!-- Main Js -->
    <script src="{{ asset('public/template/js/custom.js') }}"></script>

    @stack('scripts')

</body>
</html>
