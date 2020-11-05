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
                            <th>Tên</th>
                            <th>Thợ shop</th>
                            <th>Khách gửi m/c</th>
                            <th>Ngày duyệt</th>
                            <th>Chốt in</th>
                            <th>Ngày sp c/n</th>
                            <th>Khách nhận sp</th>
                            <th>Ghi chú</th>
                            <th>Lựa chọn</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Tên</th>
                            <th>Thợ shop</th>
                            <th>Khách gửi m/c</th>
                            <th>Ngày duyệt</th>
                            <th>Chốt in</th>
                            <th>Ngày sp c/n</th>
                            <th>Khách nhận sp</th>
                            <th>Ghi chú</th>
                            <th>Lựa chọn</th>
                        </tr>
                        </tfoot>
                        <tbody>

                            @foreach($data as $key => $value)
                            <tr>
                                <td>{{ $value->id }}</td>
                                <td>{{ $value->product->name }}</td>
                                <td>{{ $value->user->name }}</td>
                                <td>
                                    {{ date('d-m-y', strtotime($value->date_send_selected_code)) }}
                                </td>
                                <td>
                                    <p><strong class="text-primary">Lần 1: </strong> {{ date('d-m-y', strtotime($value->review_date_1))  }}</p>
                                    <p><strong class="text-success">Lần 2: </strong> {{ date('d-m-y', strtotime($value->review_date_2))  }}</p>
                                    <p><strong class="text-warning">Lần 3: </strong> {{ date('d-m-y', strtotime($value->review_date_3))  }}</p>
                                </td>
                                <td>
                                    {{ date('d-m-y', strtotime($value->closing_date))  }}
                                </td>
                                <td>
                                    {{ date('d-m-y', strtotime($value->delivery_date_in_branch))  }}
                                </td>
                                <td>
                                    {{ date('d-m-y', strtotime($value->customer_receive_date))  }}
                                </td>
                                <td>{{ $value->note }}</td>
                                <td>
                                    <a href="{{ route('product.print.edit', $value->id) }}" class="btn btn-warning btn-circle">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <a href="{{ route('product.print.delete', $value->id) }}" class="btn btn-danger btn-circle ml-2">
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
