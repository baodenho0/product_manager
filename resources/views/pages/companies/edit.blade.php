@extends('layouts.app')
@section('title','Công ty')

@section('customCSS')
@endsection

@section('content')
    <div class="modal-dialog" style="margin-left: -15px;margin-top: 5px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update công ty</h4>
            </div>
            <form id="form-companies" action="{{route('companies.submitEditAction',$companies->id)}}" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        {{ csrf_field() }}
                    </div>
                    <div class="form-group">
                        <label for="c-name">Tên công ty</label>
                        <input type="text" class="form-control" name="name" value="{{$companies->name}}">
                    </div>
                    <div class="form-group">
                        <label for="c-address">Địa chỉ</label>
                        <input type="text" class="form-control" name="address" value="{{$companies->address}}">
                    </div>
                    <div class="form-group">
                        <label for="c-phone">Số điện thoại</label>
                        <input type="text" class="form-control" name="phone" value="{{$companies->phone}}">
                    </div>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-secondary btn-rounded" href="{{route('companies.index')}}">Hủy</a>
                    <button type="submit" class="btn btn-success btn-rounded">Sửa</button>
                </div>
            </form>
        </div>
    </div>
@stop