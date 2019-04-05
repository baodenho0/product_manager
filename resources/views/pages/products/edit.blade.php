@extends('layouts.app')
@section('title','Chỉnh Sửa Sản Phẩm')

@section('customCSS')
    <link rel="stylesheet" href="{{ asset('assets/vendor/dropify/dist/css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">

@endsection

@section('content')
    <div class="box box-block bg-white">
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                {{ method_field('PUT') }}
                {{ csrf_field() }}
            </div>
            <div class="form-group">
                <label for="code">Product code</label>
                <input type="text" class="form-control" name="code" value="@if(old('code')) {{ old('code') }}@else{{ $product->code }}@endif">
            </div>
            <div class="form-group">
                <label for="name">Product name</label>
                <input type="text" class="form-control" name="name" value="@if(old('name')) {{ old('name') }}@else{{ $product->name }}@endif">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" rows="3">@if(old('description')) {{ old('description') }} @else {{ $product->description }} @endif</textarea>
            </div>
            <div class="form-group">
                <label for="">Product image</label>
                <input type="file" name="image" class="dropify" @if( old('image') ) data-default-file="{{ asset(old('image')) }}" @else data-default-file="{{ asset($product->image) }}@endif">
            </div>
           
            <div class="form-group">
                <label for="product_type">Product type</label>
                <select name="product_type" class="form-control">
                    <option value=""></option>
                    @foreach($productTypes as $productType)
                        @if(old('product_type'))
                            @if(old('product_type') == $productType->id)
                                <option selected value="{{ $productType->id }}">{{ $productType->name }}</option>
                            @else
                                <option value="{{ $productType->id }}">{{ $productType->name }}</option>
                            @endif
                        @else
                            @if($product->product_type_id == $productType->id)
                                <option selected value="{{ $productType->id }}">{{ $productType->name }}</option>
                            @else
                                <option value="{{ $productType->id }}">{{ $productType->name }}</option>
                            @endif
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" name="price" value="@if(old('price')) {{ old('price') }}@else{{ $product->price }}@endif">
            </div>
            <div class="form-group" style="text-align: right;">
                <button name="btn-add" type="button" onclick="$('form')[0].submit()" class="btn btn-warning btn-rounded">Update</button>
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