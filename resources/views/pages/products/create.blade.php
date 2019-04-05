@extends('layouts.app')
@section('title','Thêm Sản Phẩm')

@section('customCSS')
    <link rel="stylesheet" href="{{ asset('assets/vendor/dropify/dist/css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endsection

@section('content')
    <div class="box box-block bg-white">
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                {{ csrf_field() }}
            </div>
            <div class="form-group">
                <label for="name">Product code</label>
                <input type="text" class="form-control" name="code" value="{{ old('code') }}">
            </div>
            <div class="form-group">
                <label for="name">Product name</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
            </div>
            <div class="form-group">
                <label for="">Product image</label>
                <input type="file" name="image" class="dropify" />
            </div>
            <!-- <div class="form-group">
                <label for="color">Colors</label>
                <select name="colors[]" multiple data-role="tagsinput">
                </select>
            </div> -->
            <div class="form-group">
                <label for="product_type">Product type</label>
                <select name="product_type" class="form-control">
                    <option value=""></option>
                    @foreach($productTypes as $productType)
                        <option value="{{ $productType->id }}">{{ $productType->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" name="price" value="{{ old('price') }}">
            </div>
            <div class="form-group" style="text-align: right;">
                <button name="btn-add" type="button" onclick="$('form')[0].submit()" class="btn btn-success btn-rounded">Add</button>
            </div>
        </form>
    </div>

@endsection

@section('customJS')
    <script type="text/javascript" src="{{ asset('assets/vendor/dropify/dist/js/dropify.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script type="text/javascript">
        $('.dropify').dropify();
    </script>
@endsection