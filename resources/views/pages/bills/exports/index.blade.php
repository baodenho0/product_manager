@extends('layouts.app')
@section('title','Dashboard')

@section('customCSS')
@endsection

@section('content')
    <div class="box box-block bg-white clearfix">
        <div class="mb-1">
            <a class="btn btn-success btn-rounded" href="{{ route('bill.export.create') }}" >Thêm mới hóa đơn xuất</a>
        </div>
        <table class="table table-striped table-bordered" id="bills">
            <thead>
            <tr>
                <th>ID</th>
                <th>Mã hóa đơn</th>
                <th>Ngày xuất</th>
                <th>Người xuất</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($bills as $bill)
                <tr>
                    <td>{{ $bill['id'] }}</td>
                    <td>{{ $bill['code'] }}</td>
                    <td>{{ $bill['created_at'] }}</td>
                    <td>{{ $bill['user'] }}</td>
                    <td>
                        <a href="{{ route('bill.export.show', $bill['id']) }}" class="btn btn-success btn-sm"><i class="ti-eye"></i> Xem</a>
                        <button data-href="" data-name="" data-toggle="modal" data-target="#delete" class="btn btn-danger btn-sm"><i class="ti-trash"></i> Xóa</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection

@section('customJS')
@endsection