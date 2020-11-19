@extends('admin.layouts.app')
@section('title', 'Danh sách sản phẩm')
@push('css')
    <!-- Custom styles for this page -->
    <link href="{{ asset('public/template/databases/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            @if(count($data) > 0)
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Danh sách sản phẩm</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên</th>
                            <th>Hình ảnh</th>
                            <th>Mô tả</th>
                            <th>Thông tin</th>
                            <th>Lựa chọn</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Thông tin</th>
                            <th>Hình ảnh</th>
                            <th>Mô tả</th>
                            <th>Thông tin</th>
                            <th>Lựa chọn</th>
                        </tr>
                        </tfoot>
                        <tbody>

                            @foreach($data as $key => $value)
                            <tr>
                                <td>{{ $value->id }}</td>
                                <td>
                                    <ul>
                                        <li><strong>Tên: </strong>{{ $value->name }}</li>
                                        <li><strong>Danh mục: </strong>{{ $value->category->name }}</li>
                                        <li><strong>Số lượng: </strong>{{ $value->total_number }}</li>
                                        <li><strong>Giá: </strong>{{ number_format($value->price, 0, '', '.') }}đ</li>
                                        <li><strong>Sale: </strong>{{ $value->sale }}%</li>
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                        <li>
                                            <img src="{{ asset($value->image_1) }}" alt="Ảnh 1" width="100" height="70">
                                        </li>
                                        <li>
                                            <img src="{{ asset($value->image_2) }}" alt="Ảnh 2" width="100" height="70">
                                        </li>
                                        <li>
                                            <img src="{{ asset($value->image_3) }}" alt="Ảnh 3" width="100" height="70">
                                        </li>
                                        <li>
                                            <img src="{{ asset($value->image_4) }}" alt="Ảnh 4" width="100" height="70">
                                        </li>
                                        <li>
                                            <img src="{{ asset($value->image_5) }}" alt="Ảnh 5" width="100" height="70">
                                        </li>
                                    </ul>

                                </td>
                                <td>{!! $value->description !!}</td>
                                <td>{!! $value->information !!}</td>
                                <td>
                                    @if($value->active === 1)
                                        <a class="btn btn-sm btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                          <i class="fas fa-check"></i>
                                        </span>
                                        </a>
                                    @else
                                        <a class="btn btn-sm btn-danger btn-icon-split">
                                        <span class="icon text-white-50">
                                          <i class="fas fa-times"></i>
                                        </span>
                                        </a>
                                    @endif
                                    <a href="{{ route('product.edit', $value->id) }}" class="btn btn-warning btn-circle">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <a href="{{ route('product.delete', $value->id) }}" class="btn btn-danger btn-circle ml-2">
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
