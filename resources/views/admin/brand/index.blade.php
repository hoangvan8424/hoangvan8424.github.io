@extends('admin.layouts.master')

@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.get.list.brand')}}">Danh mục</a></li>
            <li class="breadcrumb-item active" aria-current="page">Thương hiệu</li>
        </ol>
    </div>
    <h4>Danh sách thương hiệu
        <a href="{{ route('admin.get.create.brand') }}" class="pull-right icon" title="Thêm mới">
            <i class="fas fa-plus-circle"></i>
        </a>
    </h4>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr class="warning">
                <th>#</th>
                <th>Tên thương hiệu</th>
                <th>Trạng thái</th>
                <th>Danh mục</th>
                <th>Tùy chọn</th>
            </tr>
            </thead>
            <tbody>
                @if(isset($brand))
                    @foreach($brand as $brands)
                        <tr>
                            <td>{{ $brands->id }}</td>
                            <td>{{ $brands->brand_name}}</td>
                            <td>
                                <a href="" class="label label-{{ $brands->getStatus()['label'] }}" title="Thay đổi trạng thái">
                                    {{ $brands->getStatus()['name'] }}
                                </a>
                            </td>
                            <td>
                                {{ $brands->getNameCategory->c_name }}
                            </td>
                            <td>
                                <a href="{{ route('admin.get.update.brand', $brands->id) }}" class="icon" title="Sửa">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <a href="{{ route('admin.get.delete.brand', $brands->id) }}" class="icon" title="Xóa">
                                    <i class="fas fa-trash-alt delete"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif

            </tbody>
        </table>
    </div>

@stop
