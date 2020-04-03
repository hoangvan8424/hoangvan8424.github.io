@extends('admin.layouts.master')
@section('title', 'Danh mục sản phẩm')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.get.list.category')}}">Danh mục</a></li>
            <li class="breadcrumb-item active" aria-current="page">Danh sách danh mục</li>
        </ol>
    </div>
    <h4>Danh sách danh mục
        <a href="{{ route('admin.get.create.category') }}" class="pull-right icon" title="Thêm mới">
            <i class="fas fa-plus-circle"></i>
        </a>
    </h4>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr class="danger">
                <th>#</th>
                <th>Tên danh mục</th>
                <th>Trạng thái</th>
                <th>Icon</th>
                <th>Tùy chọn</th>
            </tr>
            </thead>
            <tbody>
                @if(isset($category))
                    @foreach($category as $categories)
                        <tr>
                            <td>{{ $categories->id }}</td>
                            <td>{{ $categories->c_name }}</td>
                            <td>
                                <a href="{{ route('admin.get.status.category', $categories->id) }}" class="label label-{{ $categories->getStatus()['label'] }}" title="Thay đổi trạng thái">
                                    {{ $categories->getStatus()['name'] }}
                                </a>
                            </td>
                            <td>
                                <i class="fa {{ $categories->c_icon }}"></i>
                            </td>
                            <td>
                                <a href="{{ route('admin.get.update.category', $categories->id) }}" class="icon" title="Sửa">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <a href="{{ route('admin.get.delete.category', $categories->id) }}" class="icon" title="Xóa">
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
