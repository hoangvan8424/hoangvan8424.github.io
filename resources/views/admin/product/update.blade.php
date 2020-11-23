@extends('admin.layouts.app')
@section('title', 'Sửa sản phẩm')
@section('content')
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Sửa sản phẩm</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-xl-6 col-sm-12 col-12">
                            <div class="form-group row">
                                <label for="name" class="col-form-label col-sm-3">Tên sản phẩm<span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="name" id="name" cols="30" rows="4">{{ $product->name }}</textarea>
                                    @if($errors->has('name'))
                                        <span class="text-danger error-text">
                                            {{$errors->first('name')}}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="category" class="col-sm-3 col-form-label">Danh mục<span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="category" id="category">
                                        <option value="">Chọn...</option>
                                        @if(count($category) > 0)
                                            @foreach($category as $categories)
                                                <option value="{{ $categories->id }}" {{ $product->category_id == $categories->id ? 'selected' : ''}}>{{ $categories->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @if($errors->has('category'))
                                        <span class="text-danger error-text">
                                            {{$errors->first('category')}}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="type" class="col-sm-3 col-form-label">Loại</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="type" id="type">
                                        <option value="">Chọn...</option>
                                        <option value="1">Nổi bật</option>
                                        <option value="2">Mới</option>
                                        <option value="3">Sale</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="price" class="col-sm-3 col-form-label">Giá</label>
                                <div class="col-sm-7 col-9">
                                    <input class="form-control" type="number" name="price" id="price" value="{{ $product->price  }}" min="10000" placeholder="">
                                    @if($errors->has('price'))
                                        <span class="text-danger error-text">
                                            {{$errors->first('price')}}
                                        </span>
                                    @endif
                                </div>
                                <span class="col-sm-2 col-3 mt-2">
                                    VND
                                </span>
                            </div>

                            <div class="form-group row">
                                <label for="total-number" class="col-sm-3 col-form-label">Tổng số lượng</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="number" name="total_number" id="total-number" value="{{ $product->total_number }}" min="1" placeholder="">
                                    @if($errors->has('total_number'))
                                        <span class="text-danger error-text">
                                            {{$errors->first('total_number')}}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="sale" class="col-sm-3 col-form-label">Sale</label>
                                <div class="col-sm-3 col-6">
                                    <input class="form-control" type="number" name="sale" id="sale" value="{{ $product->sale }}" min="0" placeholder="">
                                    @if($errors->has('sale'))
                                        <span class="text-danger error-text">
                                            {{$errors->first('sale')}}
                                        </span>
                                    @endif
                                </div>
                                <span class="col-6 col-sm-6 align-left mt-2">
                                    %
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-6 col-sm-12 col-12">
                            <div class="form-group row">
                                <label for="img-1" class="col-sm-2 col-form-label">Ảnh 1</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" name="img_1" id="img-1">
                                    @if($errors->has('img_1'))
                                        <span class="text-danger error-text">
                                            {{$errors->first('img_1')}}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="img-2" class="col-sm-2 col-form-label">Ảnh 2</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" name="img_2" id="img-2">
                                    @if($errors->has('img_2'))
                                        <span class="text-danger error-text">
                                            {{$errors->first('img_2')}}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="img-3" class="col-sm-2 col-form-label">Ảnh 3</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" name="img_3" id="img-3">
                                    @if($errors->has('img_3'))
                                        <span class="text-danger error-text">
                                            {{$errors->first('img_3')}}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="img-4" class="col-sm-2 col-form-label">Ảnh 4</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" name="img_4" id="img-4">
                                    @if($errors->has('img_4'))
                                        <span class="text-danger error-text">
                                            {{$errors->first('img_4')}}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="img-5" class="col-sm-2 col-form-label">Ảnh 5</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" name="img_5" id="img-5">
                                    @if($errors->has('img_5'))
                                        <span class="text-danger error-text">
                                            {{$errors->first('img_5')}}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row">
                                <label for="editor" class="col-sm-2 col-form-label">Mô tả <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10 form-tags">
                                    <textarea class="form-control" name="description" id="editor" cols="30" rows="5">{{ $product->description }}</textarea>
                                    @if($errors->has('description'))
                                        <span class="text-danger error-text">
                                            {{$errors->first('description')}}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="editor-2" class="col-sm-2 col-form-label">Thông tin <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10 form-tags">
                                    <textarea class="form-control" name="information" id="editor-2" cols="30" rows="5">{{ $product->information }}</textarea>
                                    @if($errors->has('information'))
                                        <span class="text-danger error-text">
                                            {{$errors->first('information')}}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="active" class="col-sm-2 col-form-label">Hiển thị <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10 form-tags">
                                    <select class="form-control" name="active" id="active">
                                        <option value="1" {{ $product->active == 1 ? 'selected':'' }}>Cho phép</option>
                                        <option value="0" {{ $product->active == 0 ? 'selected':'' }}>Không cho phép</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nổi bật <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10 form-tags mt-2">
                                    <input type="checkbox" name="hot" id="hot" value="1" {{ $product->hot == 1 ? 'checked':'' }}><label for="hot" class="ml-3 font-weight-bold">Sản phẩm nổi bật</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <a class="btn btn-warning float-left" href="{{ route('product.list') }}">
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
    <script src="{{ asset('public/template/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('public/template/js/tinymce.js') }}"></script>
@endpush
