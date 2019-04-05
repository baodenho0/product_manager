@extends('layouts.app')
@section('title','Dashboard')

@section('customCSS')
@endsection

@section('content')
    <div class="box box-block bg-white clearfix">
        <a href="{{ route('bill.import.index') }}" class="btn btn-info mb-2">Quay lại</a>
        <h4 class="mb-2">Thôn tin hóa đơn {{ $bill['code'] }}</h4>
        <div class="row">
            <div class="col-sm-12">
                <ul class="list-unstyled mb-2">
                    <div class="row">
                        <div class="col-sm-6">
                            <li><i class="fa fa-angle-right text-warning mr-0-5"></i><strong>Mã hóa đơn:</strong> <span class="tag tag-primary">{{ $bill['code'] }}</span></li>
                            <li><i class="fa fa-angle-right text-warning mr-0-5"></i><strong>Ghi chú:</strong> {{ $bill['note'] }}</li>
                        </div>
                        <div class="col-sm-6">
                            <li><i class="fa fa-angle-right text-warning mr-0-5"></i><strong>Người nhập:</strong> {{ $bill['user'] }}</li>
                            <li><i class="fa fa-angle-right text-warning mr-0-5"></i><strong>Thời gian nhập:</strong> {{ $bill['created_at'] }}</li>
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
                        <th>Loại sản phẩm</th>
                        <th>Chưa xi xuất</th>
                        {{--<th>Đã xi xuất</th>--}}
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($details as $item)
                        <tr>
                            <td>{{ $item['stt'] }}</td>
                            <td>{{ $item['code'] }}</td>
                            <td>{{ $item['name'] }}</td>
                            <td width="200px"><img width="100%" height="auto" src="{{ asset($item['image']) }}" alt=""></td>
                            <td>{{ $item['product_type'] }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            {{--<td>{{ $item['quantity_si'] }}</td>--}}
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