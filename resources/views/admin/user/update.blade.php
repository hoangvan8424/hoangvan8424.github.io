@extends('admin.layouts.app')
@section('title', 'Sửa nhân viên')
@section('content')
    <?php
        if(session('update_status') === true) {
        session()->forget('update_status');
        ?>
        <div class="alert alert-success">
            Cập nhật thành công.
        </div>
        <?php
        } else if(session('update_status') === false){
        session()->forget('update_status');
        ?>
        <div class="alert alert-danger">
            Cập nhật thất bại
        </div>
        <?php
    } ?>
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Sửa nhân viên</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <h4 class="user-title">Thông tin</h4>
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label">Tên nhân viên<span
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
                                <label for="date-of-birthday" class="col-sm-3 col-form-label">Ngày sinh<span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input class="form-control date" type="text" name="date_of_birth" id="date-of-birthday" value="{{ date('d-m-Y', strtotime($user->date_of_birth)) }}" placeholder="dd/mm/yyyy" readonly>
                                    @if($errors->has('date_of_birth'))
                                        <span class="text-danger error-text">
                                            {{$errors->first('date_of_birth')}}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="sex" class="col-sm-3 col-form-label">Giới tính<span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input class="" type="radio" name="sex" id="male" value="Nam" {{ $user->sex === 'Nam'?'checked':'' }}> <label
                                        for="male" class="mr-4">Nam</label>
                                    <input class="" type="radio" name="sex" id="female" value="Nữ" {{ $user->sex === 'Nữ'?'checked':'' }}> <label
                                        for="female">Nữ</label>
                                    @if($errors->has('sex'))
                                        <span class="text-danger error-text">
                                            {{$errors->first('sex')}}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="branch" class="col-sm-3 col-form-label">Chi nhánh<span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="branch" id="branch">
                                        <option value="">Chọn...</option>
                                        @if(count($branch))
                                            @foreach($branch as $key => $value)
                                                <option value="{{ $value->id }}" {{ $user->branch_id == $value->id ? 'selected':'' }}>{{ $value->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @if($errors->has('branch'))
                                        <span class="text-danger error-text">
                                            {{$errors->first('branch')}}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="department" class="col-sm-3 col-form-label">Phòng ban <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="department" id="department">
                                        <option value="">Chọn...</option>
                                        @if(count($department))
                                            @foreach($department as $key => $value)
                                                <option value="{{ $value->id }}" {{ $user->department_id == $value->id ? 'selected':'' }}>{{ $value->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @if($errors->has('department'))
                                        <span class="text-danger error-text">
                                            {{$errors->first('department')}}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="position" class="col-sm-3 col-form-label">Chức vụ <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="position" id="position">
                                        <option value="">Chọn...</option>
                                        <option value="0" {{ $user->role == 0?'selected':'' }}>Tổng giám đốc</option>
                                        <option value="1" {{ $user->role == 1?'selected':'' }}>Giám đốc chi nhánh</option>
                                        <option value="2" {{ $user->role == 2?'selected':'' }}>Trưởng phòng</option>
                                        <option value="3" {{ $user->role == 3?'selected':'' }}>Nhân viên</option>
                                    </select>
                                    @if($errors->has('position'))
                                        <span class="text-danger error-text">
                                            {{$errors->first('position')}}
                                        </span>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h4 class="user-title">Quyền</h4>
                        </div>

                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label for="role_add_branch">Thêm chi nhánh<span class="text-danger"> *</span></label>
                                <select class="form-control" name="role_add_branch" id="role_add_branch">
                                    <option value="0">Không cho phép</option>
                                    <option value="1" {{ $role->role_add_branch === 1 ? 'selected':'' }}>Cho phép</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="role_update_branch">Sửa chi nhánh<span class="text-danger"> *</span></label>
                                <select class="form-control" name="role_update_branch" id="role_update_branch">
                                    <option value="0">Không cho phép</option>
                                    <option value="1" {{ $role->role_update_branch === 1 ? 'selected':'' }}>Cho phép</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="role_delete_branch">Xóa chi nhánh<span class="text-danger"> *</span></label>
                                <select class="form-control" name="role_delete_branch" id="role_delete_branch">
                                    <option value="0">Không cho phép</option>
                                    <option value="1" {{ $role->role_update_branch === 1 ? 'selected':'' }}>Cho phép</option>
                                </select>
                            </div>

                            <!-- Phòng ban -->
                            <div class="form-group">
                                <label for="role_add_department">Thêm phòng ban<span class="text-danger"> *</span></label>
                                <select class="form-control" name="role_add_department" id="role_add_department">
                                    <option value="0">Không cho phép</option>
                                    <option value="1" {{ $role->role_add_department === 1 ? 'selected':'' }}>Cho phép</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="role_update_department">Sửa phòng ban<span class="text-danger"> *</span></label>
                                <select class="form-control" name="role_update_department" id="role_update_department">
                                    <option value="0">Không cho phép</option>
                                    <option value="1" {{ $role->role_update_department === 1 ? 'selected':'' }}>Cho phép</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="role_delete_department">Xóa phòng ban<span class="text-danger"> *</span></label>
                                <select class="form-control" name="role_delete_department" id="role_delete_department">
                                    <option value="0">Không cho phép</option>
                                    <option value="1" {{ $role->role_update_department === 1 ? 'selected':'' }}>Cho phép</option>
                                </select>
                            </div>

                            <!-- Sản phẩm -->
                            <div class="form-group">
                                <label for="role_add_product">Thêm sản phẩm<span class="text-danger"> *</span></label>
                                <select class="form-control" name="role_add_product" id="role_add_product">
                                    <option value="0">Không cho phép</option>
                                    <option value="1" {{ $role->role_add_product === 1 ? 'selected':'' }}>Cho phép</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="role_update_product">Sửa sản phẩm<span class="text-danger"> *</span></label>
                                <select class="form-control" name="role_update_product" id="role_update_product">
                                    <option value="0">Không cho phép</option>
                                    <option value="1" {{ $role->role_update_product === 1 ? 'selected':'' }}>Cho phép</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="role_delete_product">Xóa sản phẩm<span class="text-danger"> *</span></label>
                                <select class="form-control" name="role_delete_product" id="role_delete_product">
                                    <option value="0">Không cho phép</option>
                                    <option value="1" {{ $role->role_update_product === 1 ? 'selected':'' }}>Cho phép</option>
                                </select>
                            </div>

                            <!-- Sản phẩm demo -->
                            <div class="form-group">
                                <label for="role_add_product_demo">Thêm sản phẩm demo<span class="text-danger"> *</span></label>
                                <select class="form-control" name="role_add_product_demo" id="role_add_product_demo">
                                    <option value="0">Không cho phép</option>
                                    <option value="1" {{ $role->role_add_product_demo === 1 ? 'selected':'' }}>Cho phép</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="role_update_product_demo">Sửa sản phẩm demo<span class="text-danger"> *</span></label>
                                <select class="form-control" name="role_update_product_demo" id="role_update_product_demo">
                                    <option value="0">Không cho phép</option>
                                    <option value="1" {{ $role->role_update_product_demo === 1 ? 'selected':'' }}>Cho phép</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="role_delete_product_demo">Xóa sản phẩm demo<span class="text-danger"> *</span></label>
                                <select class="form-control" name="role_delete_product_demo" id="role_delete_product_demo">
                                    <option value="0">Không cho phép</option>
                                    <option value="1" {{ $role->role_update_product_demo === 1 ? 'selected':'' }}>Cho phép</option>
                                </select>
                            </div>

                        </div>

                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <!-- Sản phẩm in -->
                            <div class="form-group">
                                <label for="role_add_product_print">Thêm sản phẩm in<span class="text-danger"> *</span></label>
                                <select class="form-control" name="role_add_product_print" id="role_add_product_print">
                                    <option value="0">Không cho phép</option>
                                    <option value="1" {{ $role->role_add_product_print === 1 ? 'selected':'' }}>Cho phép</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="role_update_product_print">Sửa sản phẩm in<span class="text-danger"> *</span></label>
                                <select class="form-control" name="role_update_product_print" id="role_update_product_print">
                                    <option value="0">Không cho phép</option>
                                    <option value="1" {{ $role->role_update_product_print === 1 ? 'selected':'' }}>Cho phép</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="role_delete_product_print">Xóa sản phẩm in<span class="text-danger"> *</span></label>
                                <select class="form-control" name="role_delete_product_print" id="role_delete_product_print">
                                    <option value="0">Không cho phép</option>
                                    <option value="1" {{ $role->role_update_product_print === 1 ? 'selected':'' }}>Cho phép</option>
                                </select>
                            </div>
                            <!-- Khách hàng -->
                            <div class="form-group">
                                <label for="role_add_customer">Thêm khách hàng<span class="text-danger"> *</span></label>
                                <select class="form-control" name="role_add_customer" id="role_add_customer">
                                    <option value="0">Không cho phép</option>
                                    <option value="1" {{ $role->role_add_customer === 1 ? 'selected':'' }}>Cho phép</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="role_update_customer">Sửa khách hàng<span class="text-danger"> *</span></label>
                                <select class="form-control" name="role_update_customer" id="role_update_customer">
                                    <option value="0">Không cho phép</option>
                                    <option value="1" {{ $role->role_update_customer === 1 ? 'selected':'' }}>Cho phép</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="role_delete_customer">Xóa khách hàng<span class="text-danger"> *</span></label>
                                <select class="form-control" name="role_delete_customer" id="role_delete_customer">
                                    <option value="0">Không cho phép</option>
                                    <option value="1" {{ $role->role_update_customer === 1 ? 'selected':'' }}>Cho phép</option>
                                </select>
                            </div>

                            <!-- Quản lý nhân viên -->
                            <div class="form-group">
                                <label for="role_manage_user">Quản lý nhân viên<span class="text-danger"> *</span></label>
                                <select class="form-control" name="role_manage_user" id="role_manage_user">
                                    <option value="0">Không cho phép</option>
                                    <option value="1" {{ $role->role_manage_user === 1 ? 'selected':'' }}>Cho phép</option>
                                </select>
                            </div>

                            <!-- Active user -->
                            @if($user->role != 0)
                            <div class="form-group">
                                <label for="role_active">Kích hoạt tài khoản<span class="text-danger"> *</span></label>
                                <select class="form-control" name="role_active" id="role_active">
                                    <option value="0">Không cho phép</option>
                                    <option value="1" {{ $role->role_active === 1 ? 'selected':'' }}>Cho phép</option>
                                </select>
                            </div>
                            @endif

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
