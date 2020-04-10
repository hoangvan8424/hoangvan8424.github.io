@extends('admin.layouts.master')
@section('title', 'Sản phẩm')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Admin</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.get.list.product') }}">Sản phẩm</a></li>
            <li class="breadcrumb-item active" aria-current="page">Danh sách sản phẩm</li>
        </ol>
    </div>

{{-- Tìm kiếm --}}
    <div class="row">
        <div class="col-sm-12">
            <form action="">
                    <div class="form-group col-sm-8">
                        <input type="text" name="name_search" class="form-control" placeholder="Tên sản phẩm..." value="{{ \Request::get('name') }}">
                    </div>
                    <div class="form-group col-sm-2">
                        <select name="category_search" id="" class="form-control">
                            <option value="">Danh mục</option>
                            @if(isset($category))
                                @foreach($category as $categories)
                                    <option value="{{ $categories->id }}" {{ \Request::get('category_search') == $categories->id ? "selected":"" }}>
                                        {{ $categories->c_name }}
                                    </option>
                                @endforeach
                             @endif
                        </select>
                    </div>


                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
            </form>
        </div>
    </div>
{{--Kết thúc tìm kiếm--}}

{{-- Bảng sản phẩm --}}
    <h4>Danh sách sản phẩm
        <a href="{{ route('admin.get.create.product') }}" class="pull-right" title="Thêm mới">
            <i class="fas fa-plus-circle"></i>
        </a>
    </h4>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr class="success">
                <th>#</th>
                <th style="width: 15%">Sản phẩm</th>
                <th>Ảnh</th>
                <th>Mô tả</th>
                <th>Hiệu</th>
                <th>D/m</th>
                <th>Trạng thái</th>
                <th>Loại</th>
                <th style="width: 11%;">Tùy chọn</th>
            </tr>
            </thead>
            <tbody>
                @if(isset($product))
                    @php
                        $count = 0;
                        $rating = 0;
                    @endphp
                    @foreach($product as $products)
                        @php
                            if($products->pro_rating_count>0) {
                                $count = $products->pro_rating_count;
                                $rating = round($products->pro_rating_total/$count, 1);
                            }
                        @endphp
                        <tr>
                            <td>{{ $products->id }}</td>
                            <td class="tb-pro-name" style="width: 30%;">
                                <p>{{ $products->pro_name }}</p>
                                <ul style="position: relative; left: -22px; font-weight: 500;">
                                    <li>
                                        Giá: {{ number_format($products->pro_price, 0, '', '.') }}đ
                                    </li>
                                    <li>
                                        Sale: {{ $products->pro_sale }}%
                                    </li>
                                    <li>
                                        Đánh giá:
                                        @for($i=1;$i<=5;$i++)
                                            <i class="fa fa-star {{ $i<= $rating ? 'active':'' }}"></i>
                                        @endfor
                                        @if($rating>0)
                                            {{ $rating }}
                                        @endif
                                    </li>
                                </ul>
                            </td>
                            <td>
                                <img src="{{ asset('/img/product').'/'.$products->pro_avatar }}" alt="{{ $products->pro_name }}" height="60" width="65">
                            </td>
                            <td>{!! $products->pro_description !!}</td>

                            <td>
                                {{ $products->getBrandName->brand_name }}
                            </td>
                            <td>{{ isset($products->category->c_name) ? $products->category->c_name : '[N\A]' }}</td>
                            <td>
                                <a href="{{ route('admin.get.active.product', $products->id) }}" class="label label-{{ $products->getStatus()['label'] }}" title="Thay đổi trạng thái">
                                    {{ $products->getStatus()['name'] }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.get.type.product', $products->id) }}" class="label label-{{ $products->getType()['label'] }}" title="Thay đổi loại">
                                    {{ $products->getType()['name'] }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.get.update.product', $products->id)}}" class="icon" title="Sửa">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <a href="{{ route('admin.get.delete.product', $products->id) }}" class="icon" title="Xóa">
                                    <i class="fas fa-trash-alt delete"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif

            </tbody>
        </table>
    </div>
{{--Kết thúc bảng sản phẩm--}}

@stop
