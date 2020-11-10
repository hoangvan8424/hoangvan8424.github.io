@extends('admin.layouts.app')
@section('title', 'Dashboard')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tổng quan</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Hôm nay</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ count($today) }} deadline</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Ngày mai</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ count($tomorrow) }} deadline</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Ngày kia</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ count($next_tomorrow) }} deadline</div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Content Row -->

        <div class="row">
            <!-- Area Chart -->
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Hôm nay</h6>
                    </div>

                    <div class="card-body">
                        @if(count($today) > 0)
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

                                @foreach($today as $key => $value)
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
                                                <a href="{{ route('deadline.change.status', [$value->id, $value->customer_id]) }}" class="btn btn-danger ml-2">
                                                    Chưa hoàn thành
                                                </a>
                                            @else
                                                <a href="#" class="btn btn-success btn-circle">
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
                            <h4 class="m-0 font-weight-bold text-primary text-center pt-5 pb-5">
                                <i class="fas fa-box-open fa-2x"></i>
                                <span> Không có dữ liệu</span>
                            </h4>
                        @endif
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Ngày mai</h6>
                    </div>
                    <div class="card-body">
                        @if(count($tomorrow) > 0)
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
                                    @foreach($tomorrow as $key => $value)
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
                                                    <a href="{{ route('deadline.change.status', [$value->id, $value->customer_id]) }}" class="btn btn-danger ml-2">
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
                            <h4 class="m-0 font-weight-bold text-primary text-center pt-5 pb-5">
                                <i class="fas fa-box-open fa-2x"></i>
                                <span> Không có dữ liệu</span>
                            </h4>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Ngày kia</h6>
                    </div>
                    <div class="card-body">
                        @if(count($next_tomorrow) > 0)
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
                                    @foreach($next_tomorrow as $key => $value)
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
                                                    <a href="{{ route('deadline.change.status', [$value->id, $value->customer_id]) }}" class="btn btn-danger ml-2">
                                                        Chưa hoàn thành
                                                    </a>
                                                @else
                                                    <a href="#" class="btn btn-success btn-circle">
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
                            <h4 class="m-0 font-weight-bold text-primary text-center pt-5 pb-5">
                                <i class="fas fa-box-open fa-2x"></i>
                                <span> Không có dữ liệu</span>
                            </h4>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

@endsection

