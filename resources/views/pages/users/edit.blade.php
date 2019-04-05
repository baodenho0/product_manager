@extends('layouts.app')
@section('title','User create')

@section('customCSS')
    <link rel="stylesheet" href="{{ asset('assets/vendor/DataTables/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/DataTables/Responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/DataTables/Buttons/css/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/DataTables/Buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')
    <div class="box box-block bg-white clearfix">
        <div class="mb-1">
            <a href="{{ route('users.index') }}" class="btn btn-danger">Quay lại</a>
        </div>
        <form action="{{ route('users.update',$user->id) }}" method="POST">
            <div class="form-group">
                {{ method_field('PUT') }}
                {{ csrf_field() }}
            </div>
            <div class="form-group">
                <label for="name">Tên</label>
                <input type="text" class="form-control" name="name" value="{{ $user->name }}" placeholder="Enter name...">
                @if($errors->has('name'))
                    <p class="text-danger">{{ $errors->first('name') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="name">Email</label>
                <input type="text" class="form-control" name="email"  value="{{ $user->email }}" placeholder="Enter email address...">
                @if($errors->has('email'))
                    <p class="text-danger">{{ $errors->first('email') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="">Vai trò</label>
                <select class="form-control" name="role">
                    <option value=""></option>
                    @foreach($roles as $role)
                        @if($user->roles[0]->id == $role->id)
                            <option selected value="{{ $role->id }}">{{ $role->display_name }}</option>
                        @else
                            <option value="{{ $role->id }}">{{ $role->display_name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group checkbox">
                <label>
                    <input type="checkbox" id="changePassword" {{ old('changePassword') }} name="changePassword"> Thay đổi mật khẩu
                </label>
            </div>
            <div class="form-group password" style="display: none;">
                <label for="name">Mật khẩu</label>
                <input type="password" class="form-control" name="password" placeholder="Enter password...">
                @if($errors->has('name'))
                    <p class="text-danger">{{ $errors->first('password') }}</p>
                @endif
            </div>
            <div class="form-group password" style="display: none;">
                <label for="name">Nhập lại mật khẩu</label>
                <input type="password" class="form-control" name="password_confirmation" placeholder="Enter confirm password...">
            </div>
            <div class="form-group pull-right">
                <button type="submit" class="btn btn-warning">Cập nhật</button>
            </div>
        </form>
    </div>
@endsection
@section('customJS')
    <script type="text/javascript">
        $('#changePassword').change(function(){
            if($(this).attr('checked') === 'checked'){
                $('.password').slideUp();
                $(this).attr('checked',false);
            }else{
                $(this).attr('checked',true);
                $('.password').slideDown();
            }
        });
    </script>
@endsection