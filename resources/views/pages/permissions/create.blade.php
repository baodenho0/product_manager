@extends('layouts.app')
@section('title','Users')

@section('customCSS')
@endsection

@section('content')
    <div class="box box-block bg-white">
        <div class="mb-1">
            <a href="{{ route('permissions.index') }}" class="btn btn-danger btn-rounded">Back user list</a>
        </div>
        <form action="{{ route('permissions.store') }}" method="post">
            <div class="form-group">
                {{ csrf_field() }}
            </div>
            <div class="form-group">
                <label for="">Name (Display name)</label>
                <input type="text" class="form-control" value="{{ old('name') }}" name="name" placeholder="Enter permission name">
                @if($errors->has('name'))
                    <p class="text-danger">{{ $errors->first('name') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="">Slug name</label>
                <input type="text" class="form-control" value="{{ old('slug') }}" name="slug" placeholder="Enter slug permission name">
                @if($errors->has('slug'))
                    <p class="text-danger">{{ $errors->first('name') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <input type="text" class="form-control" value="{{ old('desc') }}" name="desc" placeholder="Enter description for permission.">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-rounded">Create Permission</button>
            </div>
        </form>
    </div>
@endsection

@section('customJS')
@endsection