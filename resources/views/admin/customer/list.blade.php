@extends('admin.layouts.app')
@section('title', 'Khách hàng')
@push('css')
    <!-- Custom styles for this page -->
    <link href="{{ asset('public/template/databases/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            @if(count($data) > 0)
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Danh sách khách hàng</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên</th>
                            <th>Mã HĐ</th>
                            <th>Thợ</th>
                            <th>Sản phẩm</th>
                            <th>Ngày chụp</th>
                            <th>Ghi chú</th>
                            <th>Lựa chọn</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Tên</th>
                            <th>Mã HĐ</th>
                            <th>Thợ</th>
                            <th>Sản phẩm</th>
                            <th>Ngày chụp</th>
                            <th>Ghi chú</th>
                            <th>Lựa chọn</th>
                        </tr>
                        </tfoot>
                        <tbody>

                            @foreach($data as $key => $value)
                            <tr>
                                <td>{{ $value->id }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->contract_code }}</td>
                                <td>
                                    <p><strong class="text-primary">Chụp: </strong> {{ $value->photographer->name }}</p>
                                    <p><strong class="text-success">Makeup: </strong> {{ $value->makeup->name }}</p>
                                    <p><strong class="text-warning">Shop: </strong> {{ $value->shopper->name }}</p>
                                </td>
                                <td>
                                    @foreach(json_decode($value->product_id, true) as $product_id)
                                        @foreach($product as $products)
                                            @if($product_id == $products->id)
                                                <p>{{ $products->name }}</p>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </td>
                                <td>
                                    {{ date('d-m-y', strtotime($value->photography_date)) }}
                                </td>
                                <td>{{ $value->note }}</td>
                                <td>
                                    <a href="{{ route('customer.edit', $value->id) }}" class="btn btn-warning btn-circle">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <a href="{{ route('customer.delete', $value->id) }}" class="btn btn-danger btn-circle ml-2">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            @else
                <div class="card-header py-3">
                    <h3 class="m-0 font-weight-bold text-primary text-center pt-5 pb-5">
                        <i class="fas fa-box-open fa-2x"></i>
                        <span> Không có dữ liệu</span>
                    </h3>
                </div>
            @endif
        </div>
    </div>
@endsection
@push('scripts')
    <!-- Page level plugins -->
    <script src="{{ asset('public/template/databases/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('public/template/databases/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('public/template/js/demo/datatables-demo.js') }}"></script>
@endpush
