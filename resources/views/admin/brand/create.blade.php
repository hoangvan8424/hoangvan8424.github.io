@extends('admin.layouts.master')

@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Admin</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.get.list.brand') }}">Thương hiệu</a></li>
            <li class="breadcrumb-item active" aria-current="page">Thêm mới</li>
        </ol>
    </div>
    <div class="form-create">
        @include('admin.brand.form')
    </div>
@stop
