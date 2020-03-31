@extends('layouts.app')
@section('title', $id==1?'Máy tính':'Điện thoại')
<!-- Body main wrapper start -->
@section('content')
<div class="page-area">
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-xs-12 float-right">
				<div class="row">
					<!-- Shop Top Bar -->
					<div class="shop-top-bar text-center mb-50 col-xs-12">
						<!-- Product View Mode -->
                        <ol class="breadcrumb float-left">
                            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                @if(isset($id))
                                    @if($id==1) {{ "Máy tính" }}
                                    @elseif($id==2) {{ "Điện thoại" }}
                                    @endif
                                @endif
                            </li>
                        </ol>
						<!-- Product Short By -->
						<div class="pro-short-by text-left pull-right">
							<p>Sắp xếp theo</p>
							<select>
								<option value="1">Mặc định</option>
								<option value="4">Từ A-Z</option>
								<option value="5">Từ Z-A</option>
								<option value="6">Giá từ thấy đến cao</option>
								<option value="7">Giá từ cao xuống thấp</option>
							</select>
						</div>
					</div>

					<div class="product-tab-content tab-content">
						<div class="product-tab tab-pane active" id="grid-view">
                            @if(isset($product))
                                @foreach($product as $products)
                                    <div class="col-md-3 col-sm-6 col-xs-12" style="padding: 0!important;">
                                        <a href="{{ route('get.detail.product', [$products->pro_slug, $products->id]) }}">
                                            <div class="sin-product">
                                                <span class="pro-label">sale</span>
                                                <div class="pro-image">
                                                    <img src="{{ asset('/img/product').'/'.$products->pro_avatar }}" alt="" class="img"/>
                                                </div>
                                                <div class="pro-details">
                                                    <p class="pro-title">{{ $products->pro_name }}</p>
                                                    <p class="pro-price">
                                                        <span class="new">{{ number_format($products->pro_price, 0, '', '.') }}đ</span>
                                                        <span class="price-sale">-{{ $products->pro_sale }}%</span>
                                                        <span class="original">{{ number_format($products->pro_price/(1-$products->pro_sale/100),0,'','.') }}đ</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                             @endif
						</div>
					</div>
					<!-- Shop Bottom Bar - Page -->
					<div class="shop-top-bar text-center col-xs-12 pt-20">
						<!-- Product Pagination -->
						<div class="pagination -align-center">
                            {!! $product->links() !!}
						</div>
					</div>
				</div>
			</div>

            <!-- Filter -->
			<div class="sidebar-wrapper col-md-3 col-xs-12">
				@include('components.filter')
			</div>
		</div>
	</div>
</div>

@endsection
