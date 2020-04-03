@extends('admin.layouts.master')
@section('title', 'Đơn hàng')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.get.list.category')}}">Đơn hàng</a></li>
            <li class="breadcrumb-item active" aria-current="page">Danh sách đơn hàng</li>
        </ol>
    </div>
    <h4>Danh sách danh mục
        <a href="{{ route('admin.get.create.category') }}" class="pull-right icon" title="Thêm mới">
            <i class="fas fa-plus-circle"></i>
        </a>
    </h4>
    <div class="table-responsive">
        <table class="table table-striped table-admin text-center">
            <thead>
            <tr class="danger">
                <th>#</th>
                <th>Tên khách hàng</th>
                <th>SĐT</th>
                <th>Email</th>
                <th>Địa chỉ</th>
                <th>Tổng tiền</th>
                <th>Ghi chú</th>
                <th>Trạng thái</th>
                <th>Tùy chọn</th>
            </tr>
            </thead>
            <tbody>
                @if(isset($transaction))
                    @foreach($transaction as $transactions)
                        <tr>
                            <td>{{ $transactions->id }}</td>
                            <td>{{ $transactions->tr_user_name }}</td>
                            <td>{{ $transactions->tr_user_phone }}</td>
                            <td>{{ $transactions->tr_user_phone }}</td>
                            <td>{{ $transactions->tr_address }}</td>
                            <td>{{ number_format($transactions->tr_total, 0, '', '.') }}đ</td>
                            <td>{{ $transactions->tr_note?$transactions->tr_note:'Không' }}</td>
                            <td>
                                <a href="" class="" title="Thay đổi trạng thái">
                                    {{ $transactions->tr_status }}
                                </a>
                            </td>
                            <td>
                                <a href="#">
                                    <i class="far fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif

            </tbody>
        </table>
    </div>

@stop
