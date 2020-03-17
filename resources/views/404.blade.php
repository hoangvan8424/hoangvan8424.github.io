@extends('layouts.app')
@section('product')
<div class="page-area pb-90 pt-90">
	<div class="container">
		<div class="row">
			<div class="page-404 text-center col-xs-12">
				<div class="image-404 mb-20">
                    <img src="/img/404.png" alt="" /></div>
				<h3>Không tìm thấy trang!</h3>
				<a href="{{ route('home') }}"><i class="fas fa-chevron-left"></i>Về trang chủ</a>
			</div>
		</div>
	</div>
</div>
@endsection