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
            <tr class="success">
                <th>#</th>
                <th>Tên khách hàng</th>
                <th>SĐT</th>
                <th>Email</th>
                <th>Địa chỉ</th>
                <th>Tổng tiền</th>
                <th>Ghi chú</th>
                <th>Thời gian</th>
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
                            <td>{{ date_format($transactions->created_at, 'd-m-Y H:i:s')  }}</td>
                            <td>
                                @if($transactions->tr_status==0)
                                <a href="{{ route('admin.change.status.transaction', $transactions->id) }}" class="label label-danger" title="Thanh toán đơn hàng">
                                    Đang chờ xử lý
                                </a>
                                @elseif($transactions->tr_status==1)
                                    <span class="label label-success">Đã xử lý</span>
                                @endif

                            </td>
                            <td>
                                <a data-toggle="modal" data-target="#myModal" data-id="{{ $transactions->id }}" data-href="{{ route('admin.get.view.order', $transactions->id) }}" class="quick-view-order" type="button">
                                    <i class="far fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif

            </tbody>
        </table>
    </div>

    <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title transaction-id">Modal Heading</h4>
                </div>
                <!-- Modal body -->
                <div class="modal-body" id="modal-content">

                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                </div>

            </div>
        </div>
    </div>

@stop
@section('scripts')
    <script>
        $('.quick-view-order').click(function (event) {
            event.preventDefault();
            let ele = $(this);
            let url = ele.attr('data-href');
            let transactionId = ele.attr('data-id');
            $('#modal-content').html('');
            $('.transaction-id').text('Chi tiết đơn hàng #'+transactionId);
            $.ajax({
                url: url,
                cache: false,
                success: function(result) {
                    if(result) {
                        $('#modal-content').append(result);
                    }
                }
            });
        });
    </script>
@endsection
