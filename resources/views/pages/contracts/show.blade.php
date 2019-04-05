@extends('layouts.app')
@section('title','Xem Hợp Đồng')

@section('customCSS')
@endsection

@section('content')
    <div class="box box-block bg-white clearfix">
        <a href="{{ route('contracts.index') }}" class="btn btn-info mb-2">Quay lại</a>
        <h4 class="mb-2">Thông tin hợp đồng {{ $result['contract_code'] }}</h4>
        <div class="row">
            <div class="col-sm-12">
                <ul class="list-unstyled mb-2">
                    <div class="row">
                        <div class="col-sm-6">
                            <li><i class="fa fa-angle-right text-warning mr-0-5"></i><strong>Mã HĐ: </strong> <span class="tag tag-primary">{{ $result['contract_code'] }}</span></li>
                            <li><i class="fa fa-angle-right text-warning mr-0-5"></i><strong>Khách Hàng: </strong> {{ $result['customer_name'] }}</li>
                        </div>
                        <div class="col-sm-6">
                            <li><i class="fa fa-angle-right text-warning mr-0-5"></i><strong>Người nhập: </strong>{{ $result['user'] }}</li>
                            <li><i class="fa fa-angle-right text-warning mr-0-5"></i><strong>Thời gian nhập: </strong> {{ $result['created_at'] }}</li>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <li><i class="fa fa-angle-right text-warning mr-0-5"></i><strong>Ghi chú: </strong> {{ $result['note'] }}</li>
                        </div>
                    </div>
                </ul>
                <table class="table table-hover mb-md-0">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh</th>
                        
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Tổng tiền</th>
                        <th>Lời</th>
                        <th>Tổng Lời</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $item)
                        <tr>
                            <td>{{ $item['stt'] }}</td>
                            <td>{{ $item['product_code'] }}</td>
                            <td>{{ $item['product_name'] }}</td>
                            <td width="200px"><img width="100%" height="auto" src="{{ asset($item['product_image']) }}" alt=""></td>
                            
                            <td>{{ number_format($item['quantity']) }}</td>
                            <td>{{ number_format($item['price']) }}</td>
                            <td>{{ number_format($item['quantity'] * $item['price']) }}</td>
                            <td>{{ number_format($item['income']) }}</td>
                            <td>{{ number_format($item['quantity'] * $item['income']) }}</td>
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