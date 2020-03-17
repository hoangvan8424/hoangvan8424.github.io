@extends('admin.layouts.master')

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
                        <input type="text" name="name_search" id="" class="form-control" placeholder="Tên sản phẩm..." value="{{ \Request::get('name') }}">
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
                <th>Hình ảnh</th>
                <th width="30%">Mô tả</th>
                <th>Thương hiệu</th>
                <th>Danh mục</th>
                <th>Trạng thái</th>
                <th>Loại s/p</th>
                <th style="width: 11%;">Tùy chọn</th>
            </tr>
            </thead>
            <tbody>
                @if(isset($product))
                    @foreach($product as $products)
                        <tr>
                            <td>{{ $products->id }}</td>
                            <td class="tb-pro-name" style="width: 470px;">
                                <p>{{ $products->pro_name }}</p>
                                <ul>
                                    <li>
                                        {{ number_format($products->pro_price, 0, '', '.') }}đ
                                    </li>
                                    <li>
                                        {{ $products->pro_sale }}%
                                    </li>
                                </ul>
                            </td>
                            <td>
                                <img src="/img/product/{{ $products->pro_avatar }}" alt="{{ $products->pro_name }}" height="60" width="70">
                            </td>
                            <td>
                                {{ $products->pro_content }}
                            </td>
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
