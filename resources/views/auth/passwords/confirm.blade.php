@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-2">Confirm code to reset password</h1>
                                    <p class="mb-4">We sent a code to your mail , only just past to here to get new password into inbox your email</p>
                                </div>
                                <form class="user" method="POST" action="{{ route('ActionConfirmCodeReset') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" name="code" class="form-control form-control-user" id="code" placeholder="Insert code to here ...">
                                    </div>
                                    <button class="btn btn-primary btn-user btn-block">
                                        Get new password
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="{{route('register')}}">Create an Account!</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="{{route('login')}}">Already have an account? Login!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
