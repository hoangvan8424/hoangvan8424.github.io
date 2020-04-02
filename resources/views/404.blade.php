@extends('layouts.app')
@section('title', '404')
@section('content')
<div class="page-area pb-90 pt-90">
	<div class="container">
		<div class="row">
			<div class="page-404 text-center col-xs-12">
				<div class="image-404 mb-20">
                    <img src="{{ asset('/img/404.png') }}" alt="Không tìm thấy trang!" /></div>
				<h3>Không tìm thấy trang!</h3>
				<a href="{{ route('home') }}"><i class="fas fa-chevron-left"></i>Về trang chủ</a>
			</div>
		</div>
	</div>
</div>
@endsection
