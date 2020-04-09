@extends('admin.layouts.master')
@section('title', 'Danh mục đánh giá')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active" aria-current="page">Danh sách đánh giá</li>
        </ol>
    </div>
    <h4>Danh sách đánh giá</h4>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr class="danger">
                <th>#</th>
                <th>Họ tên</th>
                <th style="width: 15%">Sản phẩm</th>
                <th>Đánh giá</th>
                <th>Spam</th>
                <th>Hiển thị</th>
                <th>Thời gian</th>
                <th>Tùy chọn</th>
            </tr>
            </thead>
            <tbody>
                @if(isset($review))
                    @foreach($review as $reviews)
                        <tr>
                            <td>{{ $reviews->id }}</td>
                            <td>{{ $reviews->user->name }}</td>
                            <td>
                                <a href="{{ route('get.detail.product', [$reviews->product->pro_slug, $reviews->product_id]) }}" target="_blank">
                                    {{ $reviews->product->pro_name }}
                                </a>
                            </td>
                            <td>
                                @for($i=1;$i<=5;$i++)
                                    <i class="fa fa-star {{ $i<= $reviews->re_rating ? 'active':'' }}"></i>
                                @endfor {{ $reviews->re_rating }}
                                <p>{{ $reviews->re_comment }}</p>
                            </td>
                            <td>
                                <a href="" class="label {{ $reviews->re_spam == 0?'label-success':'label-danger' }}">{{ $reviews->re_spam == 0 ? 'Không':'Có'  }}</a>
                            </td>
                            <td>
                                <a href="" class="label {{ $reviews->re_approved == 1?'label-success':'label-danger' }}">{{ $reviews->re_approved == 1 ? 'Có':'Không'  }}</a>
                            </td>
                            <td>{{ date_format($reviews->created_at, 'd-m-Y H:m:s') }}</td>
                            <td>
                                <a href="{{ route('admin.get.delete.review', $reviews->id) }}" class="icon" title="Xóa">
                                    <i class="fas fa-trash-alt delete"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif

            </tbody>
        </table>
    </div>

@stop
