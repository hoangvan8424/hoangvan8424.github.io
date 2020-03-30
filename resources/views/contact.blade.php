@extends('layouts.app')
@section('content')
<!-- Contact Page -->
<div class="page-area pb-90">
	<div class="container">
		<div class="row">
			<div class="contact-form col-xs-12">
				<h3 class="text-center">Để lại tin nhắn</h3>
				<form method="POST" action="" enctype="multipart/form-data">
                    @csrf
					<div class="input-box-2 fix">
						<div class="input-box float-left">
							<input name="name" placeholder="Họ tên*" type="text" value="{{ old('name') }}">

                            @if($errors->has('name'))
                                <span class="error-text">
                                    {{ $errors->first('name') }}
                                 </span>
                            @endif
						</div>
						<div class="input-box float-left">
							<input name="subject" placeholder="Tiêu đề" type="text" value="{{ old('subject') }}">
						</div>
					</div>
					<div class="input-box-2 fix">
						<div class="input-box float-left">
							<input name="email" placeholder="Email*" type="text" value="{{ old('email') }}">

                            @if($errors->has('email'))
                                <span class="error-text">
                                    {{ $errors->first('email') }}
                                </span>
                            @endif
						</div>
						<div class="input-box float-left">
							<input name="phone" placeholder="Số điện thoại" type="text" value="{{ old('phone') }}">
						</div>
					</div>
					<div class="input-box review-box fix">
						<textarea name="message" placeholder="Tin nhắn*">{{ old('message') }}</textarea>

                        @if($errors->has('message'))
                            <span class="error-text">
                                {{ $errors->first('message') }}
                            </span>
                        @endif
					</div>
					<div class="input-box submit-box fix">
                        <button type="submit" class="btn btn-success btn-block">Gửi</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="map-wrapper">
    <div id="contact-map"></div>
</div>

@stop

@section('scripts')

<!-- Particles Active JS -->
<script src="js/app.js"></script>

<!-- Google Map APi -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAdWLY_Y6FL7QGW5vcO3zajUEsrKfQPNzI"></script>

<script src="js/map.js"></script>

@endsection
