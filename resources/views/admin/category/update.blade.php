@extends('admin.layouts.app')
@section('title', 'Sửa danh mục')
@section('content')
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Sửa danh mục</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('category.update', $category->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Tên danh mục<span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="name" id="name" value="{{ $category->name }}">
                                    @if($errors->has('name'))
                                        <span class="text-danger error-text">
                                        {{$errors->first('name')}}
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="slug" class="col-sm-2 col-form-label">Slug</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="slug" id="slug" value="{{ $category->slug }}" placeholder="bo-ban-ghe">
                                    @if($errors->has('slug'))
                                        <span class="text-danger error-text">
                                        {{$errors->first('slug')}}
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="icon" class="col-sm-2 col-form-label">Icon</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="icon" id="icon" value="{{ $category->icon }}" placeholder="">
                                    @if($errors->has('icon'))
                                        <span class="text-danger error-text">
                                        {{$errors->first('icon')}}
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="active" class="col-sm-2 col-form-label">Hiển thị <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10 form-tags">
                                    <select class="form-control" name="active" id="active">
                                        <option value="true" {{ $category->active == 1 ? 'selected':'' }}>Cho phép</option>
                                        <option value="false" {{ $category->active == 0 ? 'selected':'' }}>Không cho phép</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <a class="btn btn-warning float-left" href="{{ route('category.list') }}">
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