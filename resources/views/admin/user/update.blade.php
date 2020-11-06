@extends('admin.layouts.app')
@section('title', 'Sửa nhân viên')
@section('content')
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Sửa nhân viên</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
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
                                    <input class="form-control date" type="text" name="date_of_birth" id="date-of-birthday" value="{{ date('d-m-Y', strtotime($user->date_of_birth)) }}" placeholder="dd/mm/yyyy">
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
