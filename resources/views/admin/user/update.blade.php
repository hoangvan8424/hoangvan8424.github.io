@extends('admin.layouts.app')
@section('title', 'Sửa người dùng')
@section('content')
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Sửa người dùng</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label">Tên<span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="name" id="name" value="{{ $user->name }}">
                                    @if($errors->has('name'))
                                        <span class="text-danger error-text">
                                        {{$errors->first('name')}}
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Email<span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <p>{{ $user->email }}</p>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="avatar" class="col-sm-3 col-form-label">Avatar<span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input class="form-control date" type="file" name="avatar" id="avatar">
                                    @if($errors->has('avatar'))
                                        <span class="text-danger error-text">
                                            {{$errors->first('avatar')}}
                                        </span>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <a class="btn btn-warning float-left" href="{{ route('user.list') }}">
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
