@extends('layouts.app')
@section('title','Profile')

@section('customCSS')
    <link rel="stylesheet" href="{{ asset('assets/vendor/DataTables/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/DataTables/Responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/DataTables/Buttons/css/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/DataTables/Buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-datetimepicker.min.css')}}">

    <link rel="stylesheet" href="{{ asset('assets/vendor/dropify/dist/css/dropify.min.css') }}">
@endsection

@section('content')
    <div class="box box-block bg-white clearfix">
        <div class="mb-1">
            <a href="{{ route('dashboard') }}" class="btn btn-danger">Quay lại</a>
        </div>
        <form class="col-sm-12" action="{{ route('user.submit-update-profile',$user->id) }}" method="POST"
              enctype="multipart/form-data">
            <div class="form-group">
                {{ csrf_field() }}
            </div>
            <div class="row form-group">
                <div class="col-sm-3">
                    <label for="name">Tên</label>
                    <input type="text" class="form-control" name="name" value="{{ $user->name }}"
                           placeholder="Enter name...">
                    @if($errors->has('name'))
                        <p class="text-danger">{{ $errors->first('name') }}</p>
                    @endif
                </div>
                <div class="col-sm-3">
                    <label for="name">Email</label>
                    <input type="text" readonly class="form-control" name="email" value="{{ $user->email }}"
                           placeholder="Enter email address...">
                    @if($errors->has('email'))
                        <p class="text-danger">{{ $errors->first('email') }}</p>
                    @endif
                </div>
                <div class="col-sm-3">
                    <label for="name" id="end">Ngày Sinh</label>
                    <div class='input-group date' id='datetimepicker1' style="width: 250px">
                        <input class="form-control" value="@if($user->birthday !='') {{ $user->birthday }}@endif"
                               name="birthday" id="birthday"
                               type='text' class="form-control"/>
                        <span class="input-group-addon">
                            <i class="fa fa-calendar-o"></i>
                     <span class="glyphicon glyphicon-calendar">
                         </span>
                     </span>
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-sm-3">
                    <label for="">Hình Ảnh</label>
                    <input type="file" name="image" class="dropify"
                           @if( old('image_path') ) data-default-file="{{ asset(old('image_path')) }}"
                           @else data-default-file="{{ asset($user->image_path) }}@endif">
                </div>
            </div>
            <div class="row form-group">
                <div class="form-group checkbox">
                    <label>
                        <input type="checkbox" id="changePassword" {{ old('changePassword') }} name="changePassword">
                        Thay
                        đổi mật khẩu
                    </label>
                </div>
                <div class="form-group password" style="display: none;width: 400px">
                    <label for="name">Mật khẩu</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter password...">
                    @if($errors->has('name'))
                        <p class="text-danger">{{ $errors->first('password') }}</p>
                    @endif
                </div>
                <div class="form-group password" style="display: none;">
                    <label for="name">Nhập lại mật khẩu</label>
                    <input type="password" class="form-control" name="password_confirmation"
                           placeholder="Enter confirm password...">
                </div>
            </div>


            <div class="form-group col-sm-3">
                <button type="submit" class="btn btn-warning">Cập nhật</button>
            </div>
        </form>
    </div>
@endsection
@section('customJS')
    <script type="text/javascript">
        $('#changePassword').change(function () {
            if ($(this).attr('checked') === 'checked') {
                $('.password').slideUp();
                $(this).attr('checked', false);
            } else {
                $(this).attr('checked', true);
                $('.password').slideDown();
            }
        });

    </script>

    <script src="{{asset('assets/js/moment.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendor/dropify/dist/js/dropify.min.js') }}"></script>
    <script type="text/javascript">
        $('.dropify').dropify();
        $('#datetimepicker1').datetimepicker({
            // dateFormat: 'dd-mm-yy',
            format: 'YYYY-MM-DD HH:mm:ss'
        });
    </script>
@endsection