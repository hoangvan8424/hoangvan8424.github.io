<div class="footer-top-area pb-50 pt-50">
    <div class="container">
        <div class="row">
            <div class="footer-contact col-md-4 col-sm-6 col-xs-12">
                <img src="{{ asset('/img/logo-2.png') }}" alt="" />
                <div><span>Địa chỉ :</span> <p>Thanh Xuân, <br />Hà Nội</p></div>
                <div><span>Điện thoại :</span> <p>+4393724111</p></div>
                <div><span>Email :</span> <a href="#">hoangvan181198@gmail.com</a></div>
                <div class="footer-social fix">
                    <a href="" target="_blank"><i class="zmdi zmdi-facebook"></i></a>
                    <a href="" target="_blank"><i class="zmdi zmdi-instagram"></i></a>
                    <a href="#"><i class="zmdi zmdi-rss"></i></a>
                    <a href="" target="_blank"><i class="zmdi zmdi-twitter"></i></a>
                    <a href="" target="_blank"><i class="zmdi zmdi-pinterest"></i></a>
                </div>
            </div>
            <div class="footer-account col-md-2 col-sm-6 col-xs-12">
                <h4>Tài khoản</h4>
                <ul>
                    @if(Auth::check())
                        <li>
                            <a href="#">Tài khoản</a>
                        </li>
                        <li>
                            <a href="#">Thanh toán</a>
                        </li>
                        <li>
                            <a href="#">D/s yêu thích</a>
                        </li>
                        <li>
                            <a href="{{ route('get.logout') }}">Đăng xuất</a>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('get.login') }}">Đăng nhập</a>
                        </li>
                        <li>
                            <a href="{{ route('get.register') }}">Đăng ký</a>
                        </li>

                    @endif
                </ul>
            </div>
            <div class="footer-shipping col-md-2 col-sm-6 col-xs-12">
                <h4>Mua sắm</h4>
                <ul>
                    <li><a href="product-details-1.html">New Products</a></li>
                    <li><a href="product-details-1.html">Top Sellers</a></li>
                    <li><a href="product-details-1.html">Manufactirers</a></li>
                    <li><a href="product-details-1.html">Suppliers</a></li>
                    <li><a href="product-details-1.html">Specials</a></li>
                </ul>
            </div>
            <div class="footer-newsletter col-md-4 col-sm-6 col-xs-12">
                <h4>Nhận thông tin sản phẩm mới</h4>
                <p>Chúng tôi sẽ liên hệ với bạn khi có thông tin sản phẩm mới, hoặc có chương trình giảm giá.</p>
                <form id="mc-form" class="mc-form" enctype="multipart/form-data">
                    @csrf
                    <input id="mc-email" type="email" autocomplete="off" placeholder="Email..." />
                    <button class="btn btn-danger" id="mc-submit" type="submit">Đăng ký</button>
                </form>
                <!-- mailchimp-alerts Start -->
                <div class="mailchimp-alerts text-centre">
                    <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                    <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                    <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                </div><!-- mailchimp-alerts end -->
            </div>
        </div>

        <div class="row pt-50">
            <div class="copyright text-left col-sm-6 col-xs-12">
                <p>Copyright &copy; 2020 <a href="https://devitems.com/" target="_blank">Prioryshop</a>.</p>
            </div>
            <div class="payment-method text-right col-sm-6 col-xs-12">
                <img src="{{ asset('/img/payment/1.png')}}" alt="payment" />
                <img src="{{ asset('/img/payment/2.png') }}" alt="payment" />
                <img src="{{ asset('/img/payment/3.png') }}" alt="payment" />
                <img src="{{ asset('/img/payment/4.png') }}" alt="payment" />
                <img src="{{ asset('/img/payment/5.png') }}" alt="payment" />
            </div>
        </div>
    </div>
</div>
