@extends('layouts.app')
@section('product')
    <!-- Cart Area
    ============================================ -->
    <div class="cart-area pb-90 pt-90">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="cart-table table-responsive mb-50">
                        <table class="table text-center">
                            <thead>
                            <tr>
                                <th class="product">product</th>
                                <th class="price">price</th>
                                <th class="stock">stock status</th>
                                <th class="qty">quantity</th>
                                <th class="remove">remove</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><div class="cart-product text-left fix">
                                        <img src="img/product/2.jpg" alt="" />
                                        <div class="details fix">
                                            <a href="#">men’s black t-shirt</a>
                                            <p>Color :  Black</p>
                                            <p>Size :  SL</p>
                                        </div>
                                    </div></td>
                                <td><p class="cart-price">$56.00</p></td>
                                <td><p class="cart-stock">in stock</p></td>
                                <td><div class="cart-pro-qunantuty">
                                        <div class="pro-qty-2 fix">
                                            <input value="0" name="qtybutton" type="text">
                                        </div>
                                    </div></td>
                                <td><button class="cart-pro-remove"><i class="zmdi zmdi-close"></i></button></td>
                            </tr>
                            <tr>
                                <td><div class="cart-product text-left fix">
                                        <img src="img/product/6.jpg" alt="" />
                                        <div class="details fix">
                                            <a href="#">men’s black t-shirt</a>
                                            <p>Color :  Black</p>
                                            <p>Size :  SL</p>
                                        </div>
                                    </div></td>
                                <td><p class="cart-price">$56.00</p></td>
                                <td><p class="cart-stock">in stock</p></td>
                                <td><div class="cart-pro-qunantuty">
                                        <div class="pro-qty-2 fix">
                                            <input value="0" name="qtybutton" type="text">
                                        </div>
                                    </div></td>
                                <td><button class="cart-pro-remove"><i class="zmdi zmdi-close"></i></button></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="shipping-tax col-md-4 col-xs-12">
                    <h4>ESTIMATE SHIPPING AND TAX</h4>
                    <form action="#">
                        <div class="input-box">
                            <select>
                                <option>Country</option>
                                <option>Bangladesh</option>
                                <option>Morocco</option>
                                <option>South Africa</option>
                            </select>
                        </div>
                        <div class="input-box">
                            <select>
                                <option>City</option>
                                <option>Dhaka</option>
                                <option>Rabat</option>
                                <option>Cape Town</option>
                            </select>
                        </div>
                        <div class="input-box"><input type="text" placeholder="State/Province" /></div>
                        <div class="input-box"><input type="text" placeholder="Zip/Postal Code" /></div>
                        <div class="input-box submit-box"><input type="submit" value="Get a Quote" /></div>
                    </form>
                </div>
                <div class="product-coupon col-md-4 col-xs-12">
                    <h4>COUPON DISCOUNT</h4>
                    <p>Enter Your Coupon Code Here</p>
                    <form action="#">
                        <div class="input-box"><input type="text" /></div>
                        <div class="input-box submit-box"><input type="submit" value="Apply Coupon" /></div>
                    </form>
                </div>
                <div class="procced-checkout col-md-4 col-xs-12">
                    <h4>CART TOTAL</h4>
                    <ul>
                        <li><span class="name">Subtotal</span><span class="price">$ 415.00</span></li>
                        <li><span class="name">Shipping</span><span class="price">$ 415.00</span></li>
                        <li><span class="name">Grand Total</span><span class="price">$ 415.00</span></li>
                    </ul>
                    <a href="#" class="checkout-link">Procced to checkout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Brand Area
    ============================================ -->
    <div class="brand-area pb-90">
        <div class="container">
            <div class="row">
                <div class="brand-slider owl-carousel">
                    <div class="col-md-12"><div class="sin-brand"><img src="img/brands/1.png" alt="" /></div></div>
                    <div class="col-md-12"><div class="sin-brand"><img src="img/brands/2.png" alt="" /></div></div>
                    <div class="col-md-12"><div class="sin-brand"><img src="img/brands/3.png" alt="" /></div></div>
                    <div class="col-md-12"><div class="sin-brand"><img src="img/brands/4.png" alt="" /></div></div>
                    <div class="col-md-12"><div class="sin-brand"><img src="img/brands/5.png" alt="" /></div></div>
                    <div class="col-md-12"><div class="sin-brand"><img src="img/brands/1.png" alt="" /></div></div>
                    <div class="col-md-12"><div class="sin-brand"><img src="img/brands/4.png" alt="" /></div></div>
                    <div class="col-md-12"><div class="sin-brand"><img src="img/brands/3.png" alt="" /></div></div>
                    <div class="col-md-12"><div class="sin-brand"><img src="img/brands/2.png" alt="" /></div></div>
                    <div class="col-md-12"><div class="sin-brand"><img src="img/brands/5.png" alt="" /></div></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Top Area
    ============================================ -->
    <div class="footer-top-area pb-70 pt-70">
        <div class="container">
            <div class="row">
                <div class="footer-contact col-md-4 col-sm-6 col-xs-12">
                    <img src="img/logo-2.png" alt="" />
                    <div><span>Address :</span> <p>28 Green Tower, Street Name, <br />New York City, USA</p></div>
                    <div><span>Cell-Phone :</span> <p>+8880 44338899</p></div>
                    <div><span>Email :</span> <a href="#">yourmail@outlook.com</a></div>
                    <div class="footer-social fix">
                        <a href="https://www.facebook.com/devitems/?ref=bookmarks" target="_blank"><i class="zmdi zmdi-facebook"></i></a>
                        <a href="https://www.instagram.com/devitems/" target="_blank"><i class="zmdi zmdi-instagram"></i></a>
                        <a href="#"><i class="zmdi zmdi-rss"></i></a>
                        <a href="https://twitter.com/devitemsllc" target="_blank"><i class="zmdi zmdi-twitter"></i></a>
                        <a href="https://www.pinterest.com/devitemsllc/" target="_blank"><i class="zmdi zmdi-pinterest"></i></a>
                    </div>
                </div>
                <div class="footer-account col-md-2 col-sm-6 col-xs-12">
                    <h4>accounts</h4>
                    <ul>
                        <li><a href="account.html">My Account</a></li>
                        <li><a href="wishlist.html">My Wishlist</a></li>
                        <li><a href="cart.html">My Cart</a></li>
                        <li><a href="login.html">Sign In</a></li>
                        <li><a href="checkout.html">Check out</a></li>
                    </ul>
                </div>
                <div class="footer-shipping col-md-2 col-sm-6 col-xs-12">
                    <h4>shipping</h4>
                    <ul>
                        <li><a href="product-details-1.html">New Products</a></li>
                        <li><a href="product-details-1.html">Top Sellers</a></li>
                        <li><a href="product-details-1.html">Manufactirers</a></li>
                        <li><a href="product-details-1.html">Suppliers</a></li>
                        <li><a href="product-details-1.html">Specials</a></li>
                    </ul>
                </div>
                <div class="footer-newsletter col-md-4 col-sm-6 col-xs-12">
                    <h4>Email Newsletters</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adip isicing elit, sed do eiusmod tempor incididunt.</p>
                    <form id="mc-form" class="mc-form" >
                        <input id="mc-email" type="email" autocomplete="off" placeholder="Enter Address..." />
                        <input id="mc-submit" type="submit" value="subscribe" />
                    </form>
                    <!-- mailchimp-alerts Start -->
                    <div class="mailchimp-alerts text-centre">
                        <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                        <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                        <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                    </div><!-- mailchimp-alerts end -->
                </div>
            </div>
        </div>
    </div>

@endsection


