<div class="main-slider-one slider-area">
    <div class="flash-message" style="position: relative; top: 130px;">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(session()->has('alert-' . $msg))
                <p class="alert alert-{{ $msg }} text-center"><i class="fas fa-check icon-check"></i>{{ session()->get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
        @endforeach
    </div>
    <div id="wrapper">
        <div class="slider-wrapper">
            <div id="mainSlider" class="nivoSlider">
                <img src="img/slider/slide1.png" alt="main slider" title="#htmlcaption"/>
                <img src="img/slider/slide2.png" alt="main slider" title="#htmlcaption2"/>
            </div>
{{--            <div id="htmlcaption" class="nivo-html-caption slider-caption">--}}
{{--                <div class="container">--}}
{{--                    <div class="slider-left slider-right">--}}
{{--                        <div class="slide-text animated fadeInDown">--}}
{{--                            <h3 class="bounceInDown">new collection</h3>--}}
{{--                            <h1>Men’s Fashion 2017</h1>--}}
{{--                        </div>--}}
{{--                        <div class="one-p animated bounceInLeft">--}}
{{--                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat Ut wisi enim.</p>--}}
{{--                        </div>--}}
{{--                        <div class="animated slider-btn fadeInUpBig">--}}
{{--                            <a class="shop-btn" href="shop.html">Shop now</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div id="htmlcaption2" class="nivo-html-caption slider-caption">--}}
{{--                <div class="container">--}}
{{--                    <div class="slider-left slider-right">--}}
{{--                        <div class="slide-text animated bounceInRight">--}}
{{--                            <h3>new collection</h3>--}}
{{--                            <h1>Wowen’s Fashion 2017</h1>--}}
{{--                        </div>--}}
{{--                        <div class="one-p animated bounceInLeft">--}}
{{--                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat Ut wisi enim.</p>--}}
{{--                        </div>--}}
{{--                        <div class="animated slider-btn fadeInUpBig">--}}
{{--                            <a class="shop-btn" href="shop.html">Shop now</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
</div>
