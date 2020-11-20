@extends('admin.layouts.app')
@section('title', 'Sửa slide')
@section('content')
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Sửa slide</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('slide.update', $slide->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Tên<span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="name" id="name" value="{{ $slide->name }}">
                                    @if($errors->has('name'))
                                        <span class="text-danger error-text">
                                        {{$errors->first('name')}}
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-sm-2 col-form-label">Tiêu đề<span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="title" id="title" value="{{ $slide->title }}">
                                    @if($errors->has('title'))
                                        <span class="text-danger error-text">
                                            {{$errors->first('title')}}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-sm-2 col-form-label">Ảnh<span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" name="image" id="image">
                                    @if($errors->has('image'))
                                        <span class="text-danger error-text">
                                            {{$errors->first('image')}}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="active" class="col-sm-2 col-form-label">Hiển thị <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10 form-tags">
                                    <select class="form-control" name="active" id="active">
                                        <option value="1" {{ $slide->active == 1 ? 'selected':'' }}>Cho phép</option>
                                        <option value="0" {{ $slide->active == 0 ? 'selected':'' }}>Không cho phép</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <a class="btn btn-warning float-left" href="{{ route('slide.list') }}">
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
