<form method="POST" action="" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label>Họ tên</label>
                <input type="text" class="form-control" name="name" placeholder="Nhập họ tên" value="{{ isset($user->name)?old('name', $user->name):'' }}" disabled>
                @if($errors->has('name'))
                    <span class="error-text">
                        {{$errors->first('name')}}
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" placeholder="Nhập email" value="{{ isset($user->email)?old('email', $user->email):'' }}" disabled>
                @if($errors->has('email'))
                    <span class="error-text">
                        {{$errors->first('email')}}
                    </span>
                @endif
            </div>

        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label>Hình ảnh</label>
                <input type="file" class="form-control" name="avatar">
                <input type="hidden" name="avatar_old" value="{{ isset($user->avatar) ? $user->avatar : '' }}">
                @if($errors->has('avatar'))
                    <span class="error-text">
                        {{$errors->first('avatar')}}
                    </span>
                @endif
            </div>
            <div class="checkbox">
                <label><input type="checkbox" name="active" value="1" {{ old('active', isset($user->active) ? $user->active : '' == 1 ? 'checked' : '') }} >Hiển thị</label>
            </div>
        </div>

    </div>
    <button type="submit" class="btn btn-success btn-outline-dark">Lưu thay đổi</button>

</form>
