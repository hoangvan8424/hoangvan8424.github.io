@extends('admin.layouts.app')
@section('title', 'Thêm chi nhánh')
@section('content')
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Thêm chi nhánh</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('branch.save') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Tên <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="name" value="{{ old('name') }}">
                                    @if($errors->has('name'))
                                        <span class="text-danger error-text">
                                        {{$errors->first('name')}}
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address" class="col-sm-2 col-form-label">Địa chỉ <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="address" id="address" rows="3">{{ old('address') }}</textarea>
                                    @if($errors->has('address'))
                                        <span class="text-danger error-text">
                                        {{$errors->first('address')}}
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="note" class="col-sm-2 col-form-label">Ghi chú</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="note" id="note" rows="3">{{ old('note') }}</textarea>
                                    @if($errors->has('note'))
                                        <span class="text-danger error-text">
                                        {{$errors->first('note')}}
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="active" class="col-sm-2 col-form-label">Hiển thị <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10 form-tags">
                                    <select class="form-control" name="active" id="active">
                                        <option value="true">Có</option>
                                        <option value="false">Không</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <a class="btn btn-warning float-left" href="{{ route('branch.list') }}">
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
