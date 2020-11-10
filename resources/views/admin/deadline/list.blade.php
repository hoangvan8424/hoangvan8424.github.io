@extends('admin.layouts.app')
@section('title', 'Danh sách deadline')
@push('css')
    <!-- Custom styles for this page -->
    <link href="{{ asset('public/template/databases/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            @if(count($data) > 0)
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Danh sách deadline</h6>
            </div>
                <div class="card-body">
                    @if(count($data) > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Chi nhánh</th>
                                    <th>Thời gian</th>
                                    <th>Công việc</th>
                                    <th>Trạng thái</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Chi nhánh</th>
                                    <th>Thời gian</th>
                                    <th>Công việc</th>
                                    <th>Trạng thái</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($data as $key => $value)
                                    <tr style="
                                        @if($value->branch_id == 3)
                                    {{ 'background: #36b9cc; color: #fff;' }}
                                    @elseif($value->branch_id == 4)
                                    {{ 'background: #858796; color: #fff;' }}
                                    @elseif($value->branch_id == 5)
                                    {{ 'background: #4e73df; color: #fff;' }}
                                    @else {{''}}
                                    @endif">
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            {{ $value->branch->name }}
                                        </td>
                                        <td>
                                            <p>{{ date('d-m-Y', strtotime($value->date)) }}</p>
                                        </td>
                                        <td>
                                            {{ $value->work }}
                                        </td>
                                        <td>
                                            @if($value->status === 0)
                                                <a href="{{ route('deadline.change.status', $value->id) }}" class="btn btn-danger ml-2">
                                                    Chưa hoàn thành
                                                </a>
                                            @else
                                                <a href="" class="btn btn-success">
                                                    Đã hoàn thành
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <h4 class="text-center">Không có công việc</h4>
                    @endif
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
