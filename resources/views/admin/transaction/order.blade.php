@if(isset($orderDetail))
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr class="success">
                <th>#</th>
                <th>Sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Tổng tiền</th>
                <th>Tùy chọn</th>
            </tr>
            </thead>
            <tbody>
                @php $i=1 @endphp
                @foreach($orderDetail as $orderDetails)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td style="width: 40%">
                            <div style="text-align: left; overflow: hidden">
                                <a href="{{ route('get.detail.product', [$orderDetails->product->pro_slug, $orderDetails->product_id]) }}" target="_blank">
                                    <img src="{{ isset($orderDetails->product->pro_avatar)?asset('/img/product').'/'. $orderDetails->product->pro_avatar:''}}" alt="{{ $orderDetails->product->pro_name }}" height="70" width="70" style="float: left; margin-right: 8px;" />

                                    <div class="order-detail" style="overflow: hidden">
                                        <p style="font-weight: 500">{{ isset($orderDetails->product->pro_name)?$orderDetails->product->pro_name:'' }}</p>
                                        <p style="line-height: 15px;">Sale: {{ $orderDetails->or_quantity }}%</p>
                                    </div>
                                </a>
                            </div>
                        </td>
                        <td>{{ number_format($orderDetails->or_price, 0, '', '.') }}đ</td>
                        <td>{{ $orderDetails->or_quantity }}</td>
                        <td>
                            {{ number_format($orderDetails->or_price*$orderDetails->or_quantity,0,'','.') }}đ
                        </td>
                        <td>
                            <a href="" class="icon" title="Xóa">
                                <i class="fas fa-trash-alt delete"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif
