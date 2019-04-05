@extends('layouts.app')
@section('title','Edit Menu')

@section('customCSS')
    <link rel="stylesheet" href="{{ asset('assets/vendor/nestable/nestable.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/dropify/dist/css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">

    <style>
        .dd {
            max-width: 100%;
        }

        .dd-button {
            position: absolute;
            top: 0;
            right: 0;
            height: 100%;
            padding: 5px 20px 5px 0px;
        }
    </style>
@endsection

@section('content')
    <form id="form-menu-item"
          data-action-add="{{ route('menu-item.submitUpdateItemAction', ['itemId' =>request()->route('menuId')]) }}"
          enctype="multipart/form-data" method="post" style="width: 800px">
        <div class="form-group">
            {{ csrf_field() }}
        </div>
        <div class="form-group">
            <label for="title">Title of the Menu Item</label>
            <input type="text" class="form-control" name="title" placeholder="Title..."
                   value="@if(old('code')) {{ old('code') }}@else{{ $menuItems->title }}@endif">
        </div>
        <div class="form-group">
            <label for="class-icon">Font Icon class for the Menu Item</label>
            <input type="text" class="form-control" name="class-icon"
                   placeholder="Icon Class (optional)"
                   value="@if(old('code')) {{ old('code') }}@else{{ $menuItems->icon_class }}@endif">
        </div>
        <div class="form-group">
            <label for="link-type">Link type</label>
            <select name="link-type" class="form-control">
                <option value="url">Static URL</option>
                <option value="route">Dynamic Route</option>
            </select>
        </div>


            <div class="form-group" id="link_url">
                <label for="url">URL</label>
                <input type="text" class="form-control" name="url" placeholder="URL"
                       value="@if(old('code')) {{ old('code') }}@else{{ $menuItems->url }}@endif">
            </div>
            <div class="form-group" id="link_route">
                <label for="route">Route name</label>
                <input type="text" class="form-control" name="route" placeholder="Route"
                       value="@if(old('code')) {{ old('code') }}@else{{ $menuItems->route }}@endif">
                <br>
                <label for="parameters">Route parameters (if any)</label>
                <textarea rows=2" class="form-control" name="parameters"
                          placeholder="{&quot;key&quot;: &quot;value&quot;}"></textarea>
            </div>

        <div class="form-group">
            <label for="target">Open In</label>
            <select name="target" class="form-control">
                <option value="">Same Tab/Window</option>
                <option value="_blank">New Tab/Window</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">Icon image</label>
            <input type="file" name="image" id="image" class="dropify"
                   @if( old('image_path') ) data-default-file="{{ asset(old('image_path')) }}"
                   @else data-default-file="{{ asset($menuItems->image_path) }}@endif"/>
        </div>
        <div class="form-group" style="text-align: right;">
            <button name="btn-add" type="submit" class="btn btn-warning btn-rounded">Update</button>
            <a name="btn-cancel" href="{{route('menu-builder.index', 1)}}"
               class="btn btn-secondary btn-rounded">Cancel</a>
        </div>
    </form>
@endsection

@section('customJS')
    <script type="text/javascript" src="{{ asset('assets/vendor/nestable/jquery.nestable.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendor/dropify/dist/js/dropify.min.js') }}"></script>
    <script type="text/javascript">
        $('.dropify').dropify();
    </script>
@endsection