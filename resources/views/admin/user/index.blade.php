@extends('admin.layouts.master')

@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Admin</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.get.list.user') }}">Người dùng</a></li>
            <li class="breadcrumb-item active" aria-current="page">Danh sách người dùng</li>
        </ol>
    </div>

    <h4>Danh sách người dùng</h4>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr class="success">
                <th>#</th>
                <th>Họ tên</th>
                <th>Hình ảnh</th>
                <th>Email</th>
                <th>Trạng thái</th>
                <th>Tùy chọn</th>
            </tr>
            </thead>
            <tbody>
                @if(isset($user))
                    @foreach($user as $users)
                        <tr>
                            <td>{{ $users->id }}</td>
                            <td>
                               {{ $users->name }}
                            </td>
                            <td>
                                <img src="/img/product/{{ $users->avatar }}" alt="{{ $users->name }}" height="60" width="55">
                            </td>
                            <td>
                                {{ $users->email }}
                            </td>
                            <td>
                                <a href="{{ route('admin.get.status.user', $users->id) }}" class="label label-{{ $users->getStatus()['label'] }}" title="Thay đổi trạng thái người dùng">
                                    {{ $users->getStatus()['name'] }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.get.update.user', $users->id) }}" class="icon" title="Sửa">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <a href="{{ route('admin.get.delete.user', $users->id) }}" class="icon" title="Xóa">
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
