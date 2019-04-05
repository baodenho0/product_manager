@extends('auth.layouts.app')
@section('title','Login')
@section('content')
    <div class="sign-form">
        <div class="row">
            <div class="col-md-4 offset-md-4 px-3">
                <div class="box b-a-0">
                    <div class="p-2 text-xs-center">
                        <h5>Welcome to <br />Product Manager System</h5>
                        <img src="{{ asset('favicon.png') }}">
                    </div>
                    <form class="form-material mb-1" action="" method="POST">
                        @if($errors->any())
                            <p style="text-align: center;" class="text-danger">{{ $errors->first() }}</p>
                        @endif
                        <div class="form-group">
                            {!! csrf_field() !!}
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">

                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control"name="password" placeholder="Password">
                        </div>
                        <div class="px-2 form-group pb-2">
                            <button type="submit" class="btn btn-purple btn-block text-uppercase">Sign in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row" style="position:absolute; bottom:0; text-align: center;width: 100%; height: 25px; vertical-align: middle; background-color: #5cccf5a3 " >
                <div style="vertical-align: middle;">Copyright <a href="https://likegroup.vn">LikeGroup.vn</a></div>
        </div>
    </div>
@endsection