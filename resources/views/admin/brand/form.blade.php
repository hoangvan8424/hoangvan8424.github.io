<form method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label>Tên thương hiệu</label>
        <input type="text" class="form-control" name="brand_name" aria-describedby="brand-name" value="{{ old('brand_name', isset($brand)?$brand->brand_name:'') }}" placeholder="Tên thương hiệu">
        @if($errors->has('brand_name'))
            <span class="error-text">
                {{ $errors->first('brand_name') }}
            </span>
        @endif
    </div>

    <div class="form-group">
        <label for="category-id">Danh mục sản phẩm</label>
        <select name="category_id" class="form-control">
            <option value="">---Chọn---</option>
            @if(isset($category))
                @foreach($category as $categories)
                    <option value="{{ $categories->id }}" @if(isset($brand->c_id) && $categories->id==$brand->c_id) {{'selected'}} @else{{''}} @endif>
                        {{ $categories->c_name }}
                    </option>
                @endforeach
            @endif
        </select>
        @if($errors->has('category_id'))
            <span class="error-text">
                {{ $errors->first('category_id') }}
            </span>
        @endif

    </div>
    <div class="checkbox">
        <label for="brand_display">
            <input type="checkbox" name="brand_display" value="1" {{ old('brand_display', isset($brand->brand_status)?$brand->brand_status:''==1?'checked':'') }}> Hiển thị
        </label>
    </div>

    <button type="submit" class="btn btn-success btn-outline-dark">Lưu thay đổi</button>
</form>
