<form method="POST" action="" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-sm-7">
            <div class="form-group">
                <label for="pro_name">Tên sản phẩm</label>
                <input type="text" class="form-control" name="pro_name" placeholder="Nhập tên sản phẩm" value="{{ isset($product->pro_name)?old('pro_name', $product->pro_name):'' }}">
                @if($errors->has('pro_name'))
                    <span class="error-text">
                        {{$errors->first('pro_name')}}
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label>Mô tả</label>
                <textarea class="form-control" name="pro_description" cols="30" rows="5" placeholder="Nhập mô tả ngắn gọn về sản phẩm">{{ isset($product->pro_description)?old('pro_description', $product->pro_description):'' }}</textarea>
                @if($errors->has('pro_description'))
                    <span class="error-text">
                        {{$errors->first('pro_description')}}
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label>Đặc điểm nổi bật</label>
                <textarea class="form-control" id="editor" name="pro_content" cols="100" rows="20" placeholder="Nhập đặc điểm nổi bật">{{ isset($product->pro_content)?old('pro_content', $product->pro_content):'' }}</textarea>
                @if($errors->has('pro_content'))
                    <span class="error-text">
                        {{$errors->first('pro_content')}}
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="pro_category_id">Loại sản phẩm</label>
                <select name="pro_category_id" class="form-control" id="">
                    <option value="">---Chọn---</option>
                    @if(isset($category))
                        @foreach($category as $categories)
                            <option value="{{ $categories->id }}" @if(isset($product->pro_category_id) && $product->pro_category_id==$categories->id){{'selected'}}@else{{''}}@endif>
                                {{ $categories->c_name }}
                            </option>
                        @endforeach
                    @endif
                </select>
                @if($errors->has('pro_category_id'))
                    <span class="error-text">
                        {{$errors->first('pro_category_id')}}
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="brand_id">Thương hiệu</label>
                <select name="brand_id" class="form-control" id="">
                    <option value="">---Chọn---</option>
                    @foreach($brand as $brands)
                        <option value="{{ $brands->id }}" @if(isset($product->brand_id) && $product->brand_id==$brands->id) {{'selected'}} @else {{''}} @endif>
                            {{ $brands->brand_name }}
                        </option>
                    @endforeach
                </select>
                @if($errors->has('brand_id'))
                    <span class="error-text">
                        {{$errors->first('brand_id')}}
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="pro_price">Giá</label>
                <input type="number" class="form-control" name="pro_price" placeholder="0" value="{{ isset($product->pro_price)?old('pro_price', $product->pro_price):'' }}">
                @if($errors->has('pro_price'))
                    <span class="error-text">
                        {{$errors->first('pro_price')}}
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="pro_sale">Khuyến mại</label>
                <input type="number" class="form-control" name="pro_sale" placeholder="0" value="{{ isset($product->pro_sale)?old('pro_sale', $product->pro_sale):'' }}">
            </div>
            <div class="checkbox">
                <label><input type="checkbox" name="hot" value="1" {{ old('hot', isset($product->hot) ? $product->hot : '' == 1 ? 'checked' : '') }} >Nổi bật</label>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="form-group">
                <label>Thông số cấu hình</label>
                <textarea class="form-control" id="editor2" name="pro_configuration" cols="100" rows="20" placeholder="Nhập thông số cấu hình">{{ isset($product->pro_cofiguration)?old('pro_configuration', $product->pro_configuration):'' }}</textarea>
                @if($errors->has('pro_configuration'))
                    <span class="error-text">
                        {{$errors->first('pro_configuration')}}
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="">Từ khóa seo</label>
                <input type="text" name="pro_keyword_seo" class="form-control" id="" placeholder="Nhập từ khóa seo" value="{{ isset($product->pro_keyword_seo)?old('pro_keyword_seo', $product->pro_keyword_seo):'' }}">
            </div>
            <div class="form-group">
                <label for="">Mô tả seo</label>
                <input type="text" name="pro_description_seo" class="form-control" id="" placeholder="Nhập mô tả seo" value="{{ isset($product->pro_description_seo)?old('pro_description_seo', $product->pro_description_seo):'' }}">
            </div>
            <div class="form-group">
                <label for="pro_avatar">Hình ảnh</label>
                <input type="file" class="form-control" name="pro_avatar">
                <input type="hidden" name="pro_avatar_update" value="{{ isset($product->pro_avatar) ? $product->pro_avatar : '' }}">
                @if($errors->has('pro_avatar'))
                    <span class="error-text">
                        {{$errors->first('pro_avatar')}}
                    </span>
                @endif
            </div>
        </div>

    </div>
    <button type="submit" class="btn btn-success btn-outline-dark">Lưu thay đổi</button>

</form>
