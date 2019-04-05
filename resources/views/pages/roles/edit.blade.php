@extends('layouts.app')
@section('title','User create')

@section('customCSS')
@endsection

@section('content')
    <div class="box box-block bg-white">
        <div class="mb-1">
            <a href="{{ route('roles.index') }}" class="btn btn-danger btn-rounded">Back roles list</a>
        </div>
        <form action="{{ route('roles.update', $role->id) }}" method="post">
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                    </div>
                    <div class="form-group">
                        <label for="name">Name (Display name)</label>
                        <input type="text" class="form-control" name="name" value="{{ $role->display_name }}" placeholder="Enter name...">
                        @if($errors->has('name'))
                            <p class="text-danger">{{ $errors->first('name') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="name">Slug name</label>
                        <input type="text" class="form-control" name="slug"  value="{{ $role->name }}" placeholder="Enter email address...">
                        @if($errors->has('slug'))
                            <p class="text-danger">{{ $errors->first('slug') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="name">Description</label>
                        <input type="text" class="form-control" name="desc"  value="{{ $role->description }}" placeholder="Enter email address...">
                        @if($errors->has('slug'))
                            <p class="text-danger">{{ $errors->first('slug') }}</p>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4">
                    @foreach($permissions as $permission)
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="{{ $permission->id }}" @if($role->permissions->contains($permission)) checked @endif class="checkbox" name="permissions[]"> {{ $permission->display_name }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-warning btn-rounded">Update Role</button>
            </div>
        </form>
    </div>
@endsection

@section('customJS')
@endsection