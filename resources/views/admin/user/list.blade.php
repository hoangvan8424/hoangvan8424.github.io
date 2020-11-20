@extends('admin.layouts.app')
@section('title', 'Danh sách người dùng')
@push('css')
    <!-- Custom styles for this page -->
    <link href="{{ asset('public/template/databases/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            @if(count($data) > 0)
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Danh sách người dùng</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Thông tin</th>
                            <th>Chức vụ</th>
                            <th>Lựa chọn</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Thông tin</th>
                            <th>Chức vụ</th>
                            <th>Lựa chọn</th>
                        </tr>
                        </tfoot>
                        <tbody>

                            @foreach($data as $key => $value)
                            <tr>
                                <td>{{ $value->id }}</td>
                                <td>
                                    <ul>
                                        <li><strong>Tên: </strong> {{ $value->name }}</li>
                                        <li><img class="rounded-circle mr-2" width="50" height="50" src="{{ asset('public/images/avatar/'.$value->avatar) }} "/></li>
                                        <li><strong>Email: </strong> {{ $value->email }}</li>
                                        <li><strong>Ngày đăng ký: </strong> {{ date('d-m-Y H:i:s', strtotime($value->created_at)) }}</li>
                                    </ul>
                                </td>
                                <td>
                                    @if($value->role == 0)
                                        <p class="btn btn-success btn-icon-split btn-sm">
                                            <span class="text text-white">Người dùng</span>
                                        </p>
                                    @elseif($value->role == 1)
                                        <p class="btn btn-primary btn-icon-split btn-sm">
                                            <span class="text text-white">Admin</span>
                                        </p>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('user.edit', $value->id) }}" class="btn btn-warning btn-circle">
                                        <i class="fas fa-pen"></i>
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
