@extends('layouts.app')
@section('title','Roles Detail')

@section('customCSS')
@endsection

@section('content')
    <div class="box box-block bg-white">
        <div class="row">
            <div class="col-md-12">
                <h4>{{ $role->display_name }}</h4>
                <ul class="list-unstyled mb-1">
                    @foreach($role->permissions as $permission)
                        <li><i class="fa fa-angle-right text-warning mr-0-5"></i> <strong>{{ $permission->display_name }}</strong>  (<i>{{ $permission->description }}</i>)</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('customJS')
@endsection