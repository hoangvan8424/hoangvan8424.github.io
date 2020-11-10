@extends('admin.layouts.app')
@section('title', 'Sửa sản phẩm in')
@section('content')
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Sửa sản phẩm in</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('product.print.update', $print->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="branch" class="col-sm-3 col-form-label">Chi nhánh<span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="branch" id="branch">
                                        <option value="">Chọn...</option>
                                        @if(count($branch))
                                            @foreach($branch as $key => $value)
                                                <option value="{{ $value->id }}" {{ $print->product->branch->id == $value->id?'selected':'' }}>{{ $value->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @if($errors->has('branch'))
                                        <span class="text-danger error-text">
                                        {{$errors->first('branch')}}
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="customer" class="col-sm-3 col-form-label">Khách hàng<span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="customer" id="customer">
                                        <option value="">Chọn...</option>
                                        @if(count($customer) >0 )
                                            @foreach($customer as $customers)
                                                <option value="{{ $customers->id }}" {{ $print->customer_id == $customers->id ?'selected' :'' }}>{{ $customers->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @if($errors->has('customer'))
                                        <span class="text-danger error-text">
                                        {{$errors->first('customer')}}
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="product-name" class="col-sm-3 col-form-label">Tên sản phẩm<span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="name" id="product-name" disabled>
                                        <option value="{{ $print->product->id }}">{{ $print->product->name }}</option>
                                    </select>
                                    @if($errors->has('name'))
                                        <span class="text-danger error-text">
                                        {{$errors->first('name')}}
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="shopper" class="col-sm-3 col-form-label">Thợ shop <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="shopper" id="shopper" disabled>
                                        <option value="{{ $print->user->id }}">{{ $print->user->name }}</option>
                                    </select>
                                    @if($errors->has('shopper'))
                                        <span class="text-danger error-text">
                                        {{$errors->first('shopper')}}
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="date-selected-code" class="col-sm-3 col-form-label">Ngày khách gửi mã chọn <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control date" readonly name="date_selected_code" id="date-selected-code" value="{{ date('d-m-Y', strtotime($print->date_send_selected_code)) }}" placeholder="dd/mm/yyyy">
                                    @if($errors->has('date_selected_code'))
                                        <span class="text-danger error-text">
                                        {{$errors->first('date_selected_code')}}
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="review-date-1" class="col-sm-3 col-form-label">Ngày gửi duyệt lần 1 <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control date" readonly name="review_date_1" id="review-date-1" value="{{ date('d-m-Y', strtotime($print->review_date_1)) }}" placeholder="dd/mm/yyyy">
                                    @if($errors->has('review_date_1'))
                                        <span class="text-danger error-text">
                                        {{$errors->first('review_date_1')}}
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="review-date-2" class="col-sm-3 col-form-label">Ngày gửi duyệt lần 2 <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control date" readonly name="review_date_2" id=review-date-2" value="{{ date('d-m-Y', strtotime($print->review_date_2)) }}" placeholder="dd/mm/yyyy">
                                    @if($errors->has('review_date_2'))
                                        <span class="text-danger error-text">
                                            {{$errors->first('review_date_2')}}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="review-date-3" class="col-sm-3 col-form-label">Ngày gửi duyệt lần 3 <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control date" readonly name="review_date_3" id="review-date-3" value="{{ date('d-m-Y', strtotime($print->review_date_3)) }}" placeholder="dd/mm/yyyy">
                                    @if($errors->has('review_date_3'))
                                        <span class="text-danger error-text">
                                            {{$errors->first('review_date_3')}}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="closing-date" class="col-sm-3 col-form-label">Ngày chốt in <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control date" readonly name="closing_date" id="closing-date" value="{{ date('d-m-Y', strtotime($print->closing_date)) }}" placeholder="dd/mm/yyyy">
                                    @if($errors->has('closing_date'))
                                        <span class="text-danger error-text">
                                            {{$errors->first('closing_date')}}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="date-in-branch" class="col-sm-3 col-form-label">Ngày sản phẩm ở chi nhánh <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control date" readonly name="date_in_branch" id="date-in-branch" value="{{ date('d-m-Y', strtotime($print->delivery_date_in_branch)) }}" placeholder="dd/mm/yyyy">
                                    @if($errors->has('date_in_branch'))
                                        <span class="text-danger error-text">
                                        {{$errors->first('date_in_branch')}}
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="receive-date" class="col-sm-3 col-form-label">Ngày khách nhận sản phẩm <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control date" readonly name="receive_date" id="receive-date" value="{{ date('d-m-Y', strtotime($print->customer_receive_date)) }}" placeholder="dd/mm/yyyy">
                                    @if($errors->has('receive_date'))
                                        <span class="text-danger error-text">
                                        {{$errors->first('receive_date')}}
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="note" class="col-sm-3 col-form-label">Ghi chú</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="note" rows="3" id="note">{{ $print->note }}</textarea>
                                    @if($errors->has('note'))
                                        <span class="text-danger error-text">
                                        {{$errors->first('note')}}
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <a class="btn btn-warning float-left" href="{{ route('product.print.list') }}">
                                    <i class="fas fa-exclamation-triangle"></i> Hủy
                                </a>
                                <button id="content-submit" class="btn btn-primary float-right">
                                    <i class="far fa-save"></i> Lưu lại
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(function() {
            $('.date').datepicker({
                format: 'dd-mm-yyyy',
                orientation: 'bottom left',
                todayHighlight: true,
                autoclose: true,
            });
        });

        $(document).ready(function () {
            $('#customer').attr('disabled', true);
            $('#product-name').attr('disabled', true);
            $('#shopper').attr('disabled', true);

            $('#content-submit').click(function () {
                $('#customer').attr('disabled', false);
                $('#product-name').attr('disabled', false);
                $('#shopper').attr('disabled', false);
            });


            let branch_id = $('#branch').val();

            $('#branch').click(function () {
                let branch_id = $(this).val();
                if(branch_id !== 0) {
                    $('#content-submit').click(function () {
                        $('#customer').attr('disabled', false);
                        $('#product-name').attr('disabled', false);
                        $('#shopper').attr('disabled', false);
                    });
                    getDataFromBranch(branch_id);
                }
            });

            $('#customer').click(function () {
                let customer_id = $(this).val();
                if(customer_id !== "") {
                    getProductFromBranch(customer_id);
                }

            })

        });

        function getDataFromBranch(branch_id) {
            if(branch_id !== 0) {
                $.ajax({
                    url: '{{ route('get.product.from.branch') }}',
                    method: 'GET',
                    data: {
                        id: branch_id,
                    },
                    success: function (result) {

                        if((result['shopper'].length +'') > 0) {
                            $('#shopper').html("").append(result['shopper']);
                            $('#shopper').attr('disabled', false);
                        } else {
                            let html = "<option value=''>Không có dữ liệu</option>";
                            $('#shopper').html("").append(html);
                            $('#shopper').attr('disabled', true);
                        }

                        if((result['customer'].length +'') > 0) {
                            $('#customer').html("").append(result['customer']);
                            $('#customer').attr('disabled', false);
                        } else {
                            let html = "<option value=''>Không có dữ liệu</option>";
                            $('#customer').html("").append(html);
                            $('#customer').attr('disabled', true);
                        }
                    }
                });
            }
        }

        function getProductFromBranch(customer_id) {

            if(customer_id !== "") {
                $.ajax({
                    url: '{{ route('get.customer.from.branch') }}',
                    method: 'GET',
                    data: {
                        id: customer_id,
                    },
                    success: function (result) {
                        if ((result['product'].length + '') > 0) {
                            $('#product-name').html("").append(result['product']);
                            $('#product-name').attr('disabled', false);
                        } else {
                            let html = "<option value=''>Không có dữ liệu</option>";
                            $('#product-name').html("").append(html);
                            $('#product-name').attr('disabled', true);
                        }

                    }
                });
            }
        }
    </script>
@endpush
