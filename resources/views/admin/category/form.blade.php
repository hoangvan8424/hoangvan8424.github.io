<form method="POST" action="" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label>Tên danh mục</label>
        <input type="text" class="form-control" name="c_name" id="c-name" aria-describedby="c-name" value="{{ isset($category->c_name)?old('c_name', $category->c_name):'' }}" placeholder="Tên danh mục">
        @if($errors->has('c_name'))
            <span class="error-text">
                {{ $errors->first('c_name') }}
            </span>
        @endif
    </div>
    <div class="form-group">
        <label>Icon</label>
        <input type="text" class="form-control" name="c_icon" id="c-icon" aria-describedby="icon" value="{{ isset($category->c_icon)?old('c_icon', $category->c_icon):'' }}" placeholder="fa fa-home">
        @if($errors->has('c_icon'))
            <span class="error-text">
                {{ $errors->first('c_icon') }}
            </span>
        @endif
    </div>
    <div class="form-group">
        <label for="">Từ khóa seo</label>
        <input type="text" name="c_keyword_seo" class="form-control" id="" placeholder="Nhập từ khóa seo" value="{{ isset($category->c_keyword_seo)?old('c_keyword_seo', $category->c_keyword_seo):'' }}">
    </div>
    <div class="form-group">
        <label for="">Mô tả seo</label>
        <input type="text" name="c_description_seo" class="form-control" id="" placeholder="Nhập mô tả seo" value="{{ isset($category->c_description_seo)?old('c_description_seo', $category->c_description_seo):'' }}">
    </div>

    <button type="submit" class="btn btn-success btn-outline-dark">Lưu thay đổi</button>
</form>