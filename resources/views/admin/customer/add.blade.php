@extends('admin.layouts.app')
@section('title', 'Thêm khách hàng')
@section('content')
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Thêm khách hàng</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('customer.save') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="customer-name" class="col-sm-3 col-form-label">Tên khách hàng<span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="customer_name" id="customer-name" value="{{ old('customer_name') }}">
                                    @if($errors->has('customer_name'))
                                        <span class="text-danger error-text">
                                            {{$errors->first('customer_name')}}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="contract-code" class="col-sm-3 col-form-label">Mã hợp đồng<span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="contract_code" id="contract-code" value="{{ old('contract_code') }}">
                                    @if($errors->has('contract_code'))
                                        <span class="text-danger error-text">
                                            {{$errors->first('contract_code')}}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">Sản phẩm<span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    @if(count($product))
                                        @foreach($product as $key => $value)
                                            <input type="checkbox" name="product_name[]" id="product-name-{{ $value->id }}"
                                                   value="{{ $value->id }}"> <label class="mr-4" for="product-name-{{ $value->id }}">{{ $value->name }}</label>
                                        @endforeach
                                    @endif
                                    <br>
                                    @if($errors->has('product_name'))
                                        <span class="text-danger error-text">
                                            {{$errors->first('product_name')}}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="photographer" class="col-sm-3 col-form-label">Thợ chụp <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="photographer" id="photographer">
                                        <option value="">Chọn...</option>
                                        @if(count($photographer))
                                            @foreach($photographer as $key => $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @if($errors->has('photographer'))
                                        <span class="text-danger error-text">
                                        {{$errors->first('photographer')}}
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="makeup" class="col-sm-3 col-form-label">Thợ makeup <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="makeup" id="makeup">
                                        <option value="">Chọn...</option>
                                        @if(count($makeup))
                                            @foreach($makeup as $key => $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @if($errors->has('makeup'))
                                        <span class="text-danger error-text">
                                        {{$errors->first('makeup')}}
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="shopper" class="col-sm-3 col-form-label">Thợ shop <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="shopper" id="shopper">
                                        <option value="">Chọn...</option>
                                        @if(count($shopper))
                                            @foreach($shopper as $key => $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @if($errors->has('shopper'))
                                        <span class="text-danger error-text">
                                        {{$errors->first('shopper')}}
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="photography-date" class="col-sm-3 col-form-label">Ngày chụp <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control date" readonly name="photography_date" id="photography-date" value="{{ old('photography_date') }}" placeholder="dd/mm/yyyy">
                                    @if($errors->has('photography_date'))
                                        <span class="text-danger error-text">
                                            {{$errors->first('photography_date')}}
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
                                <a class="btn btn-warning float-left" href="{{ route('customer.list') }}">
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
    </script>
@endpush