@extends('layouts.app')
@section('title','User create')

@section('customCSS')
    <link rel="stylesheet" href="{{ asset('assets/vendor/DataTables/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/DataTables/Responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/DataTables/Buttons/css/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/DataTables/Buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')
    <div class="box box-block bg-white">
        <div class="mb-1">
            <a href="{{ route('users.index') }}" class="btn btn-danger btn-rounded">Quay lại</a>
        </div>
        <form action="{{ route('users.store') }}" method="post">
            <div class="form-group">
                {{ csrf_field() }}
            </div>
            <div class="form-group">
                <label for="name">Tên</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                @if($errors->has('name'))
                    <p class="text-danger">{{ $errors->first('name') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="name">Email</label>
                <input type="text" class="form-control" name="email"  value="{{ old('email') }}">
                @if($errors->has('email'))
                    <p class="text-danger">{{ $errors->first('email') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="">Vai trò</label>
                <select class="form-control" name="role">
                    <option value=""></option>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->display_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="name">Mật khẩu</label>
                <input type="password" class="form-control" name="password">
                @if($errors->has('password'))
                    <p class="text-danger">{{ $errors->first('password') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="name">Nhập lại mật khẩu</label>
                <input type="password" class="form-control" name="password_confirmation">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-rounded">Thêm</button>
            </div>
        </form>
    </div>
@endsection

@section('customJS')
@endsection