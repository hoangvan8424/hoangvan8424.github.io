<div class="footer-top-area pb-50 pt-50">
    <div class="container">
        <div class="row">
            <div class="footer-contact col-md-4 col-sm-6 col-xs-12">
                <img src="{{ asset('/img/logo-2.png') }}" alt="" />
                <div><span>Địa chỉ :</span> <p>Thanh Xuân, <br />Hà Nội</p></div>
                <div><span>Điện thoại :</span> <p>+84393724111</p></div>
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
                <h4>Sản phẩm</h4>
                <ul>
                    <li><a href="{{ route('get.list.product', ['may-tinh', '1']) }}">Máy tính</a></li>
                    <li><a href="{{ route('get.list.product', ['dien-thoai', '2']) }}">Điện thoại</a></li>
                </ul>
            </div>
            <div class="footer-newsletter col-md-4 col-sm-6 col-xs-12">
                <h4>Nhận thông tin sản phẩm mới</h4>
                <p>Chúng tôi sẽ liên hệ với bạn khi có thông tin sản phẩm mới, hoặc có chương trình giảm giá.</p>
                <div>
                    <div class="form-group">
                        <input class="form-control re-email" type="email" placeholder="Email..." required oninvalid="this.setCustomValidity('Vui lòng nhập đúng định dạng email!')" oninput="this.setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-danger re-button">Đăng ký</button>
                    </div>
                </div>
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

