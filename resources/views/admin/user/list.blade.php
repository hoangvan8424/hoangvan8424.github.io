{{--@extends('admin.layouts.app')--}}
{{--@section('title', 'Danh sách người dùng')--}}
{{--@push('css')--}}
{{--    <!-- Custom styles for this page -->--}}
{{--    <link href="{{ asset('public/template/databases/dataTables.bootstrap4.min.css') }}" rel="stylesheet">--}}
{{--@endpush--}}

{{--@section('content')--}}
{{--    <div class="container-fluid">--}}
{{--        <div class="card shadow mb-4">--}}
{{--            @if(count($data) > 0)--}}
{{--            <div class="card-header py-3">--}}
{{--                <h6 class="m-0 font-weight-bold text-primary">Danh sách người dùng</h6>--}}
{{--            </div>--}}
{{--            <div class="card-body">--}}
{{--                <div class="table-responsive">--}}
{{--                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">--}}
{{--                        <thead>--}}
{{--                        <tr>--}}
{{--                            <th>#</th>--}}
{{--                            <th>Tên</th>--}}
{{--                            <th>Thông tin</th>--}}
{{--                            <th>Email</th>--}}
{{--                            <th>Chức vụ</th>--}}
{{--                            <th>Lựa chọn</th>--}}
{{--                        </tr>--}}
{{--                        </thead>--}}
{{--                        <tfoot>--}}
{{--                        <tr>--}}
{{--                            <th>#</th>--}}
{{--                            <th>Tên</th>--}}
{{--                            <th>Thông tin</th>--}}
{{--                            <th>Email</th>--}}
{{--                            <th>Chức vụ</th>--}}
{{--                            <th>Lựa chọn</th>--}}
{{--                        </tr>--}}
{{--                        </tfoot>--}}
{{--                        <tbody>--}}

{{--                            @foreach($data as $key => $value)--}}
{{--                            <tr>--}}
{{--                                <td>{{ $value->id }}</td>--}}
{{--                                <td>--}}
{{--                                    <ul>--}}
{{--                                        <li><img class="rounded-circle mr-2" width="25" height="25" src="{{ asset($value->avatar) }} "/>{{ $value->name }}</li>--}}
{{--                                        <li><strong>Ngày sinh: </strong>{{ date('d-m-Y', strtotime($value->date_of_birth)) }}</li>--}}
{{--                                        <li><strong>Giới tính: </strong> {{ $value->sex }}</li>--}}
{{--                                    </ul>--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    <ul>--}}
{{--                                        <li><strong>Chi nhánh: </strong>{{ $value->branch->name }}</li>--}}
{{--                                        <li><strong>Phòng: </strong>{{ $value->department->name }}</li>--}}
{{--                                    </ul>--}}
{{--                                </td>--}}
{{--                                <td>{{ $value->email }}</td>--}}
{{--                                <td>--}}
{{--                                    @if($value->role == 0)--}}
{{--                                        <p class="btn btn-success btn-icon-split btn-sm">--}}
{{--                                            <span class="text text-white">Giám đốc</span>--}}
{{--                                        </p>--}}
{{--                                    @elseif($value->role == 1)--}}
{{--                                        <p class="btn btn-primary btn-icon-split btn-sm">--}}
{{--                                            <span class="text text-white">Giám đốc chi nhánh</span>--}}
{{--                                        </p>--}}
{{--                                    @elseif($value->role == 2)--}}
{{--                                        <p class="btn btn-dark btn-icon-split btn-sm">--}}
{{--                                            <span class="text text-white">Trưởng phòng</span>--}}
{{--                                        </p>--}}
{{--                                    @elseif($value->role == 3)--}}
{{--                                        <p class="btn btn-warning btn-icon-split btn-sm">--}}
{{--                                            <span class="text text-white">Nhân viên</span>--}}
{{--                                        </p>--}}
{{--                                    @endif--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    <a href="{{ route('user.edit', $value->id) }}" class="btn btn-warning btn-circle">--}}
{{--                                        <i class="fas fa-pen"></i>--}}
{{--                                    </a>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                            @endforeach--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            @else--}}
{{--                <div class="card-header py-3">--}}
{{--                    <h3 class="m-0 font-weight-bold text-primary text-center pt-5 pb-5">--}}
{{--                        <i class="fas fa-box-open fa-2x"></i>--}}
{{--                        <span> Không có dữ liệu</span>--}}
{{--                    </h3>--}}
{{--                </div>--}}
{{--            @endif--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}
{{--@push('scripts')--}}
{{--    <!-- Page level plugins -->--}}
{{--    <script src="{{ asset('public/template/databases/jquery.dataTables.min.js') }}"></script>--}}
{{--    <script src="{{ asset('public/template/databases/dataTables.bootstrap4.min.js') }}"></script>--}}

{{--    <!-- Page level custom scripts -->--}}
{{--    <script src="{{ asset('public/template/js/demo/datatables-demo.js') }}"></script>--}}
{{--@endpush--}}
