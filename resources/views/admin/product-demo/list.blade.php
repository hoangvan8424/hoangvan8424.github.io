@extends('admin.layouts.app')
@section('title', 'Sản phẩm in')
@push('css')
    <!-- Custom styles for this page -->
    <link href="{{ asset('public/template/databases/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            @if(count($data) > 0)
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Danh sách sản phẩm in</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Thông tin</th>
                            <th>Ngày nhận file</th>
                            <th>Ngày giao file</th>
                            <th>Ngày giao khách</th>
                            <th>Ghi chú</th>
                            <th>Lựa chọn</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Thông tin</th>
                            <th>Ngày nhận file</th>
                            <th>Ngày giao file</th>
                            <th>Ngày giao khách</th>
                            <th>Ghi chú</th>
                            <th>Lựa chọn</th>
                        </tr>
                        </tfoot>
                        <tbody>

                            @foreach($data as $key => $value)
                            <tr>
                                <td>{{ $value->id }}</td>
                                <td>
                                    <ul>
                                        <li><strong class="text-dark">Tên: </strong>{{ $value->product_name }}</li>
                                        <li><strong class="text-dark">Chi nhánh: </strong>{{ $value->branch_name }}</li>
                                        <li><strong class="text-dark">Thợ shop: </strong>{{ $value->username }}</li>
                                    </ul>
                                </td>
                                <td>
                                    {{ date('d-m-y', strtotime($value->receive_demo_date)) }}
                                </td>
                                <td>
                                    <p><strong class="text-primary">Lần 1: </strong> {{ date('d-m-y', strtotime($value->expected_delivery_date_1))  }}</p>
                                    <p><strong class="text-success">Lần 2: </strong> {{ date('d-m-y', strtotime($value->expected_delivery_date_2))  }}</p>
                                    <p><strong class="text-warning">Lần 3: </strong> {{ date('d-m-y', strtotime($value->expected_delivery_date_3))  }}</p>
                                </td>
                                <td>
                                    {{ date('d-m-y', strtotime($value->delivery_date))  }}
                                </td>
                                <td>{{ $value->note }}</td>
                                <td>
                                    <a href="{{ route('product.demo.edit', $value->id) }}" class="btn btn-warning btn-circle">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <a href="{{ route('product.demo.delete', $value->id) }}" class="btn btn-danger btn-circle ml-2">
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
