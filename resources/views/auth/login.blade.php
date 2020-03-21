@extends('layouts.app')

@section('product')
    <div class="account-area">
        <div class="container">
            <div class="login-area pb-90 pt-90">
                <div class="container">
                    <form action="#">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="customer-login text-left">
                                    <h4 class="title-1 title-border text-uppercase mb-30">Registered customers</h4>
                                    <p class="text-gray">If you have an account with us, Please login!</p>
                                    <input type="text" placeholder="Email here..." name="email">
                                    <input type="password" placeholder="Password">
                                    <p><a href="#" class="text-gray">Forget your password?</a></p>
                                    <button type="submit" data-text="login" class="button-one submit-button mt-15">login</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
