@extends('admin.layouts.app')
@section('title', 'Thêm sản phẩm demo')
@section('content')
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Thêm sản phẩm demo</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('product.demo.save') }}" enctype="multipart/form-data">
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
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
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
                                        <option value="">Không có dữ liệu</option>
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
                                        <option value="">Không có dữ liệu</option>
                                    </select>
                                    @if($errors->has('shopper'))
                                        <span class="text-danger error-text">
                                        {{$errors->first('shopper')}}
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="receive-demo-date" class="col-sm-3 col-form-label">Ngày nhận file demo <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control date" readonly name="receive_demo_date" id="receive-demo-date" value="{{ old('receive_demo_date') }}" placeholder="dd/mm/yyyy">
                                    @if($errors->has('receive_demo_date'))
                                        <span class="text-danger error-text">
                                            {{$errors->first('receive_demo_date')}}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="delivery-date-1" class="col-sm-3 col-form-label">Ngày giao file lần 1 <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control date" readonly name="delivery_date_1" id="delivery-date-1" value="{{ old('delivery_date_1') }}" placeholder="dd/mm/yyyy">
                                    @if($errors->has('delivery_date_1'))
                                        <span class="text-danger error-text">
                                            {{$errors->first('delivery_date_1')}}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="delivery-date-2" class="col-sm-3 col-form-label">Ngày giao file lần 2 <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control date" readonly name="delivery_date_2" id="delivery-date-2" value="{{ old('delivery_date_2') }}" placeholder="dd/mm/yyyy">
                                    @if($errors->has('delivery_date_2'))
                                        <span class="text-danger error-text">
                                            {{$errors->first('delivery_date_2')}}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="delivery-date-3" class="col-sm-3 col-form-label">Ngày giao file lần 3 <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control date" readonly name="delivery_date_3" id="delivery-date-3" value="{{ old('delivery_date_3') }}" placeholder="dd/mm/yyyy">
                                    @if($errors->has('delivery_date_3'))
                                        <span class="text-danger error-text">
                                            {{$errors->first('delivery_date_3')}}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="delivery-date" class="col-sm-3 col-form-label">Ngày giao khách <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control date" readonly name="delivery_date" id="delivery-date" value="{{ old('delivery_date') }}" placeholder="dd/mm/yyyy">
                                    @if($errors->has('delivery_date'))
                                        <span class="text-danger error-text">
                                            {{$errors->first('delivery_date')}}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="note" class="col-sm-3 col-form-label">Ghi chú</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="note" rows="3" id="note">{{ old('note') }}</textarea>
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
            $('#branch').change(function () {
                let branch_id = $(this).val();
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
            });

            $('#customer').change(function () {
                let customer_id = $(this).val();
                if(customer_id !== 0) {
                    $.ajax({
                        url: '{{ route('get.customer.from.branch') }}',
                        method: 'GET',
                        data: {
                            id: customer_id,
                        },
                        success: function (result) {
                            if((result['product'].length +'') > 0) {
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
            });

        });



    </script>
@endpush
