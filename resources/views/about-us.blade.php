@extends('layouts.app')

@section('content')
    <div class="page-content">
        <!-- Our Story Section -->
        <section class="story-about-section section-box">
            <div class="story-content">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">
                            <div class="images">
                                <img src="{{ asset('public/images/about-us-1.jpg') }}" alt="story">
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12">
                            <div class="story-detail">
                                <h2 class="special-heading">Câu chuyện của chúng tôi</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud commodo consequat sit voluptatem accusantium doloremque laudantium.</p>
                                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                <div class="info">
                                    <div class="images">
                                        <img src="{{ asset('public/images/right-sidebar-member-signature.png') }}" alt="signatures">
                                    </div>
                                    <div class="author">
                                        <span class="name">Catherine Shaw</span>
                                        <span class="job">-  Director  -</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Our Story Section -->

        <!-- Gallery Section -->
        <section class="gallery-about-section section-box">
            <div class="container-fluid">
                <div class="gallery-content">
                    <div class="row">
                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                    <div class="images">
                                        <img src="{{ asset('public/images/about-us-gallery-1.jpg') }}" alt="gallery-images">
                                        <div class="overlay"></div>
                                        <div class="gallery-zoom">
                                            <a href="{{ asset('public/images/about-us-gallery-1.jpg') }}" data-fancybox="gallery" class="gallery-elements">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
                                    <div class="images">
                                        <img src="{{ asset('public/images/about-us-gallery-2.jpg') }}" alt="gallery-images">
                                        <div class="overlay"></div>
                                        <div class="gallery-zoom">
                                            <a href="{{ asset('public/images/about-us-gallery-2.jpg') }}" data-fancybox="gallery" class="gallery-elements">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
                                    <div class="images">
                                        <img src="{{ asset('public/images/about-us-gallery-3.jpg') }}" alt="gallery-images">
                                        <div class="overlay"></div>
                                        <div class="gallery-zoom">
                                            <a href="{{ asset('public/images/about-us-gallery-3.jpg') }}" data-fancybox="gallery" class="gallery-elements">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                    <div class="images">
                                        <img src="{{ asset('public/images/about-us-gallery-4.jpg') }}" alt="gallery-images">
                                        <div class="overlay"></div>
                                        <div class="gallery-zoom">
                                            <a href="{{ asset('public/images/about-us-gallery-4.jpg') }}" data-fancybox="gallery" class="gallery-elements">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                            <div class="images">
                                <img src="{{ asset('public/images/about-us-gallery-5.jpg') }}" alt="gallery-images">
                                <div class="overlay"></div>
                                <div class="gallery-zoom">
                                    <a href="{{ asset('public/images/about-us-gallery-5.jpg') }}" data-fancybox="gallery" class="gallery-elements">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Gallery Section -->

        <!-- Our Team Section -->
        <section class="our-team-page our-team-about section-box">
            <div class="container">
                <div class="our-team-content">
                    <h2 class="special-heading">Thành viên trong team</h2>
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="our-team-detail">
                                <div class="member-images">
                                    <img src="{{ asset('public/images/our-team-page-1.jpg') }}" alt="our-team">
                                </div>
                                <div class="member-info">
                                    <h4 class="name">Margaret Bell</h4>
                                    <span class="job">-  Producer  -</span>
                                    <div class="socials">
                                        <a href="#"><i class="zmdi zmdi-facebook"></i></a>
                                        <a href="#"><i class="zmdi zmdi-twitter"></i></a>
                                        <a href="#"><i class="zmdi zmdi-tumblr"></i></a>
                                        <a href="#"><i class="zmdi zmdi-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="our-team-detail">
                                <div class="member-images">
                                    <img src="{{ asset('public/images/our-team-page-2.jpg') }}" alt="our-team">
                                </div>
                                <div class="member-info">
                                    <h4 class="name">Carol Stephens</h4>
                                    <span class="job">-  Lead Designer  -</span>
                                    <div class="socials">
                                        <a href="#"><i class="zmdi zmdi-facebook"></i></a>
                                        <a href="#"><i class="zmdi zmdi-twitter"></i></a>
                                        <a href="#"><i class="zmdi zmdi-tumblr"></i></a>
                                        <a href="#"><i class="zmdi zmdi-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="our-team-detail">
                                <div class="member-images">
                                    <img src="{{ asset('public/images/our-team-page-3.jpg') }}" alt="our-team">
                                </div>
                                <div class="member-info">
                                    <h4 class="name">Stephen Walker</h4>
                                    <span class="job">-  Copywriter  -</span>
                                    <div class="socials">
                                        <a href="#"><i class="zmdi zmdi-facebook"></i></a>
                                        <a href="#"><i class="zmdi zmdi-twitter"></i></a>
                                        <a href="#"><i class="zmdi zmdi-tumblr"></i></a>
                                        <a href="#"><i class="zmdi zmdi-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="our-team-detail">
                                <div class="member-images">
                                    <img src="{{ asset('public/images/our-team-page-4.jpg') }}" alt="our-team">
                                </div>
                                <div class="member-info">
                                    <h4 class="name">Carolyn Estrada</h4>
                                    <span class="job">-  Sales Manager  -</span>
                                    <div class="socials">
                                        <a href="#"><i class="zmdi zmdi-facebook"></i></a>
                                        <a href="#"><i class="zmdi zmdi-twitter"></i></a>
                                        <a href="#"><i class="zmdi zmdi-tumblr"></i></a>
                                        <a href="#"><i class="zmdi zmdi-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Our Team Section -->

        <!-- Testimonials Section -->
        <section class="testimonials-hp-1 testimonials-about-us">
            <div class="container-fluid">
                <div class="testimonials-content">
                    <div id="testimonials-hp-1" class="owl-carousel owl-theme">
                        <!-- Item 1 -->
                        <div class="item">
                            <div class="row">
                                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 left-block">
                                    <div class="images">
                                        <img src="{{ asset('public/images/hp-1-testimonials-1.png') }}" alt="testimonials">
                                    </div>
                                </div>
                                <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 right-block">
                                    <div class="testimonials-detail">
                                        <i class="zmdi zmdi-quote"></i>
                                        <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness.</p>
                                        <h5>Mary Morrison</h5>
                                        <span>- Photography -</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Item 2 -->
                        <div class="item">
                            <div class="row">
                                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 left-block left-block-2">
                                    <div class="images">
                                        <img src="{{ asset('public/images/hp-1-testimonials-2.png') }}" alt="testimonials">
                                    </div>
                                </div>
                                <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 right-block">
                                    <div class="testimonials-detail">
                                        <i class="zmdi zmdi-quote"></i>
                                        <p>I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born.</p>
                                        <h5>Anna Taylor</h5>
                                        <span>- Designer -</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Testimonials Section -->
    </div>
@endsection
