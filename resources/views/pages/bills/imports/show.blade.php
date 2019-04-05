@extends('layouts.app')
@section('title','Dashboard')

@section('customCSS')
@endsection

@section('content')
    <div class="box box-block bg-white clearfix">
        <a href="{{ route('bill.import.index') }}" class="btn btn-info mb-2">Quay lại</a>
        <h4 class="mb-2">Thông tin hóa đơn {{ $bill['code'] }}</h4>
        <div class="row">
            <div class="col-sm-12">
                <ul class="list-unstyled mb-2">
                    <div class="row">
                        <div class="col-sm-6">
                            <li><i class="fa fa-angle-right text-warning mr-0-5"></i>Mã hóa đơn: <strong>{{ $bill['code'] }}</strong></li>
                            <li><i class="fa fa-angle-right text-warning mr-0-5"></i>Công ty: <strong>{{ $bill['company'] }}</strong></li>
                        </div>
                        <div class="col-sm-6">
                            <li><i class="fa fa-angle-right text-warning mr-0-5"></i>Người nhập: <strong>{{ $bill['user'] }}</strong></li>
                            <li><i class="fa fa-angle-right text-warning mr-0-5"></i>Thời gian nhập: <strong>{{ $bill['created_at'] }}</strong></li>
                        </div>
                    </div>
                    </ul>
                <table class="table table-hover mb-md-0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá nhập</th>
                            <th>Loại sản phẩm</th>
                            <th>Số lượng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($details as $item)
                        <tr>
                            <td>{{ $item['stt'] }}</td>
                            <td>{{ $item['code'] }}</td>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ number_format($item['price']) }} VNĐ</td>
                            <td>{{ $item['product_type'] }}</td>
                            <td>{{ $item['quantity'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection

@section('customJS')
@endsection