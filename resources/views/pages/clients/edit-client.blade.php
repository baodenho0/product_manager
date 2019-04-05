@extends('layouts.app')
@section('title','Khách hàng')

@section('customCSS')
@endsection

@section('content')
<form id="form-menu-item"
      action="{{route('client.submitEdit',$client->id)}}" method="POST">
    <div class="form-group">
        {{ csrf_field() }}
    </div>
    <div class="form-group">
        <label for="title">Họ tên khách hàng</label>
        <input value="{{$client->name}}"  type="text" class="form-control" id="name" name="name" placeholder="Họ tên khách hàng">
    </div>
    <div class="form-group">
        <label for="class-icon">Biển số xe</label>
        <input type="text" class="form-control" name="band"
               placeholder="Biển số xe" id="band" value="{{$client->band}}">
    </div>
    <div class="form-group">
        <label for="link-type">Phân khối</label>
        <input value="{{$client->cubic}}" type="number" class="form-control" id="cubic" name="cubic" placeholder="Phân khối">
    </div>
    <div class="form-group" id="link_url">
        <label for="url">SĐT</label>
        <input type="text" value="{{$client->phone}}" class="form-control" id="phone" name="phone" placeholder="Số điện thoại">
    </div>
    <div class="modal-footer">
        <a class="btn btn-secondary btn-rounded" href="{{route('client.index')}}">Hủy</a>
        <button type="submit" class="btn btn-success btn-rounded">Sửa</button>
    </div>
</form>
@stop